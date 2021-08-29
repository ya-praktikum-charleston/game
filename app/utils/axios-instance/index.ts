import axios from 'axios';

const axiosInstance = axios.create({
    baseURL: 'https://ya-praktikum.tech/api/v2',
    withCredentials: true,
});

export default axiosInstance;
