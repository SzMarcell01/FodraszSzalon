import axios from 'axios'

export const http = axios.create({
    baseURL: "http://192.168.56.1:8000/api",
    headers:{
        "Accept": "application/json",
        "Content-Type": "application/json" 
    }
})
