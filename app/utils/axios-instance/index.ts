import axios from 'axios';

const axiosInstance = axios.create({
    baseURL: 'http://localhost:5000/api',
    withCredentials: true,
});

// baseURL: 'https://ya-praktikum.tech/api/v2',
//baseURL: 'http://localhost:3000/api',
export default axiosInstance;
