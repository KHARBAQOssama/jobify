import { createApp } from 'vue'
import './index.css'
import './style.css'
import store from "./store";
import routes from './routes'
import App from './App.vue'

createApp(App).use(routes).use(store).mount('#app')
