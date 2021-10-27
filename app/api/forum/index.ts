import axios from 'axios';

import { isServer } from '../../../src/utilities/isServer';

const instanceAPI = axios.create({
    baseURL: 'http://localhost:5000/',
    headers: {
        post: {
            'Content-Type': 'application/json; charset=utf-8',
        },
        put: {
            'Content-Type': 'application/json; charset=utf-8',
        },
    },
});
// Получить все посты
export const getPosts = () => instanceAPI.get('/api/posts')
    .then((response) => {
        return response.data;
    });

// Получить пост по id
export const getPost = (id: string) => axios.get(`/api/post/${id}`)
    .then((response) => {
        if (isServer) {
            return response;
        }
        return response.data;
    });

// Создать новый пост
export const addPost = (values: string) => axios.post('/api/post/', values)
    .then((response) => {
        if (isServer) {
            return response;
        }
        return response.data;
    });

// Получить все комментарии поста
export const getMessages = (id: string) => axios.get(`/api/messages/${id}`)
    .then((response) => {
        if (isServer) {
            return response;
        }
        return response.data;
    });

// Добавить комментарий
export const addMessage = (id: string, value: string) => axios.post(`/api/message/${id}`, value)
    .then((response) => {
        if (isServer) {
            return response;
        }
        return response.data;
    });

// Получить все ответы на комментарий
export const getMessageToMessage = (postId: string, messageId: number) => axios.get(`/api/answers/${postId}/${messageId}`)
    .then((response) => {
        if (isServer) {
            return response;
        }
        return response.data;
    });

// Добавить комментарий к комментарию
export const addMessageToMessage = (id: string, value: string) => axios.post(`/api/answer/${id}`, value)
    .then((response) => {
        if (isServer) {
            return response;
        }
        return response.data;
    });
