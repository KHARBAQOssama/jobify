import api from "../../config/api";

let state = {
  user: localStorage.getItem("user")
    ? JSON.parse(localStorage.getItem("user"))
    : {
        email: null,
        password: null,
        password_confirmation: null,
      },
  profile: {},
  message: {},
};
let mutations = {
  setUser(state, user) {
    state.user = user;
    localStorage.setItem("user", JSON.stringify(user));
  },
  setToken(state, token) {
    localStorage.setItem("token", JSON.stringify(token));
  },
  setMessage(state, message) {
    state.message = message;
    setTimeout(() => {
      state.message = {};
    }, 5000);
  },
  setProfile(state, profile) {
    state.profile = profile;
  },
};
let actions = {
  async getAuthUser({ commit }) {
    try {
      const response = await api.get("/auth/me");
      if (response.status === 200) {
        commit("setUser", response.data.user);
      }
      return response;
    } catch (error) {
      return error.response;
    }
  },
  async register({ commit, state }) {
    try {
      const response = await api.post("/auth/register", state.user);
      if (response.status === 200) {
        commit("setUser", response.data.user);
        commit("setToken", response.data.token);
        commit("setMessage", {
          type: "success",
          content: "you have created an account successfully",
        });
      }
      return response;
    } catch (error) {
      console.log(error.response);
      commit("setMessage", {
        type: "danger",
        content: error.response.data.message.split('.')[0]
      });
      return error.response;
    }
  },
  async initializeRole({ commit, state }) {
    try {
      const response = await api.put("/auth/initialize-role", {
        role: state.user.role_id,
      });
      console.log(response);
      if (response.status === 200) {
        commit("setUser", response.data.user);
        commit("setMessage", {});
        commit(
          "setProfile",
          state.user.role_id == 2
            ? {
                first_name: null,
                last_name: null,
                birthday: null,
                occupation: null,
              }
            : {
                name: null,
                foundation_date: null,
                industry_id: null,
                new_industry: null,
              }
        );
      }
      return response;
    } catch (error) {
      commit("setMessage", {
        type: "danger",
        content: error.response.data.message.split(".")[0],
      });
      return error.response;
    }
  },
  async completeProfile({ commit, state }) {
    console.log(state.profile);
    try {
      if (state.profile.new_industry) state.profile.industry_id = null;
      const response = await api.post("/auth/complete-profile", state.profile);
      console.log(response);
      if (response.status === 200) {
        commit("setUser", response.data.user);
        commit("setMessage", {});
      }
      return response;
    } catch (error) {
      console.log(error);
      return error.response;
    }
  },
};
let getters = {
  getUser(state) {
    return state.user;
  },
  getMessage(state) {
    return state.message;
  },
  getProfile(state) {
    return state.profile;
  },
};

let store = {
  namespaced: true,
  state,
  mutations,
  actions,
  getters,
};

export default store;
