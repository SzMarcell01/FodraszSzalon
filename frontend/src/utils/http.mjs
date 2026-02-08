import axios from 'axios'

export const http = axios.create({
    baseURL: import.meta.env.VITE_API_BASE_URL, 
    headers:{
        "Accept": "application/json",
        "Content-Type": "application/json" 
    }
})
// http://127.0.0.1:8000/api
// http://192.168.56.1:8000/api