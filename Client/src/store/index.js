import { createStore } from "vuex";
import userStore from './modules/user'

let modules = {
  userStore,
};

export default createStore({
  modules,
});
