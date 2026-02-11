import axios from 'axios'

export const http = axios.create({
    baseURL: import.meta.env.VITE_API_BASE_URL + '/api', 
    headers:{
        "Accept": "application/json",
        "Content-Type": "application/json" 
    }
})

// EZ A RÉSZ HIÁNYZIK NÁLAD:
// Minden kérés előtt lefut, és ha van token, beteszi a fejlécbe
http.interceptors.request.use(
    (config) => {
        const token = localStorage.getItem('auth_token');
        if (token) {
            config.headers.Authorization = `Bearer ${token}`;
        }
        return config;
    },
    (error) => {
        return Promise.reject(error);
    }
);

// Opcionális: Ha 401-et kapunk (lejárt token), dobjon ki a loginra
http.interceptors.response.use(
    (response) => response,
    (error) => {
        if (error.response && error.response.status === 401) {
            localStorage.removeItem('auth_token');
            // Itt nehéz routert hívni, de a window.location elvisz
            // window.location.href = '/login'; 
        }
        return Promise.reject(error);
    }
);