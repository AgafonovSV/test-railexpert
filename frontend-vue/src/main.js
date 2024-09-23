import { createApp } from 'vue'
import './style.css'
import App from './App.vue'

const app = createApp(App)

app.config.globalProperties.$url = import.meta.env.VITE_BASE_URL

app.mount('#app')
