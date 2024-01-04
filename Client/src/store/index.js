import { createStore } from "vuex";
import userStore from './modules/user'
import companyStore from './modules/company'

let modules = {
  userStore,
  companyStore,
  
};

export default createStore({
  modules,
});
