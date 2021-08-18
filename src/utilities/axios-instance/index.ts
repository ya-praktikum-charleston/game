import axios from 'axios';

const axiosInstance = axios.create({
    baseURL: 'https://ya-praktikum.tech/api/v2',
});

axiosInstance.interceptors.response.use(
    (response) => response,
    (error) => {
        const { status } = error.response;

        if (status === 401) {
            localStorage.setItem('isAuth', '');
        }

        return Promise.reject(error);
    },
);

export default axiosInstance;
