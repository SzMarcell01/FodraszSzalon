import axios from 'axios';

export const http = axios.create({
    baseURL: import.meta.env.VITE_API_BASE_URL + '/api', 
    headers:{
        "Accept": "application/json",
        "Content-Type": "application/json" 
    }
});

// Ez automatikusan hozzáadja a tokent minden kéréshez, ha van elmentve
http.interceptors.request.use((config) => {
    const token = localStorage.getItem('auth_token');
    if (token) {
        config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
});