import axios from 'axios';
import { isServer } from '../../../src/utilities/isServer';

const baseURL = isServer
    ? 'https://ya-praktikum.tech/api/v2'
    : 'http://localhost:5000/api';

const axiosInstance = axios.create({
    baseURL,
    withCredentials: true,
});

// baseURL: 'https://ya-praktikum.tech/api/v2',
//baseURL: 'http://localhost:3000/api',
export default axiosInstance;
