import { createApp } from 'vue'
import './index.css'
import './style.css'
import routes from './routes'
import App from './App.vue'

createApp(App).use(routes).mount('#app')
