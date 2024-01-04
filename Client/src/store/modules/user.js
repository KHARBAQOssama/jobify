import api from "../../config/api";

let state = {
  token: localStorage.getItem("token") || null,
  user: JSON.parse(localStorage.getItem("user")) || null,
  isAuthenticated: localStorage.getItem("token") !== null,
  message: {},
};

let mutations = {
  setUser(state, user) {
    state.user = user;
    localStorage.setItem("user", JSON.stringify(user));
  },
  setToken(state, token) {
    state.token = token;
    state.isAuthenticated = true;
    localStorage.setItem("token", JSON.stringify(token));
  },
  clearAuth(state) {
    state.token = null;
    state.user = null;
    state.isAuthenticated = false;
    localStorage.removeItem("token");
    localStorage.removeItem("user");
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
  async login({ state, dispatch, commit },credentials) {
    console.log(credentials);
    try {
      const response = await api.post("/auth/login", credentials);
      if (response.status === 200) {
        commit("setToken", response.data.token);
        dispatch("getAuthUser");
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
  removeLocalStorageItems() {
    localStorage.removeItem("token");
    localStorage.removeItem("user");
  },
  async logout({ commit, dispatch }) {
    try {
      const response = await api.post("/auth/logout");
      if (response.status === 200) {
        dispatch("removeLocalStorageItems");
        commit("setUser", {
          email: null,
          password: null,
          password_confirmation: null,
        });
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
  async getAuthUser({ commit, dispatch }) {
    try {
      const response = await api.post("/auth/me");
      if (response.status === 200) {
        commit("setUser", response.data.user);
      }
      return response;
    } catch (error) {
      dispatch("removeLocalStorageItems");
      commit("setUser", {
        email: null,
        password: null,
        password_confirmation: null,
      });
      return error.response;
    }
  },
  async register({ commit, state }, credentials) {
    try {
      const response = await api.post("/auth/register", credentials);
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
        content: error.response.data.message.split(".")[0],
      });
      return error.response;
    }
  },
  async initializeRole({ commit, state }, role) {
    try {
      const response = await api.put("/auth/initialize-role", {
        role
      });
      console.log(response);
      if (response.status === 200) {
        commit("setUser", response.data.user);
        commit("setMessage", {});
        console.log(state.user);
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
  async completeProfile({ commit, state }, credentials) {
    console.log(state.profile);
    try {
      if (credentials.new_industry) credentials.industry_id = null;
      const response = await api.post("/auth/complete-profile", credentials);
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
