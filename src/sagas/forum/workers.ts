import {
    put,
    call,
    CallEffect,
    PutEffect,
} from 'redux-saga/effects';
import {
    getPost,
    getPosts as fetchPosts,
    addPost,
    getMessages as fetchMessages,
    //addMessage,
    getMessageToMessage,
    addMessageToMessage,
} from '../../../app/api/forum';
import { getPosts, getMessages } from '../../actions/forum';
import type { ActionPayload } from '../../actions/types';
import type {
    GetPostProps,
    GetPostsResponse,
    GetPostResponse,
    AddPostProps,
    GetMessagesProps,
    AddMessageProps,
    AddMessageToMessageProps,
    GetMessageToMessageProps,
} from '../../../app/api/forum/types';

export function* workerGetPosts(): Generator<CallEffect<GetPostsResponse>> {
    try {
        const result = yield call(fetchPosts);
        yield put(getPosts(result));
    } catch (error) {
        console.log(error);
    }
}

export function* workerGetPost(
    action: ActionPayload<GetPostProps>,
): Generator<CallEffect<GetPostResponse>> {
    try {
        yield call(getPost, action.payload);
    } catch (error) {
        console.log(error);
    }
}

export function* workerAddPost(
    action: ActionPayload<AddPostProps>,
): Generator<CallEffect<TeamLeaderBoardResponse>> {
    try {
        yield call(addPost, action.payload);
    } catch (error) {
        console.log(error);
    }
}

export function* workerGetMessages(
    action: ActionPayload<GetMessagesProps>,
): Generator<CallEffect<TeamLeaderBoardResponse>> {
    try {
        const result = yield call(fetchMessages, action.payload);
        yield put(getMessages(result));
    } catch (error) {
        console.log(error);
    }
}

export function* workerAddMessage(
    action: ActionPayload<AddMessageProps>,
): Generator<CallEffect<TeamLeaderBoardResponse>> {
    try {
        const result = yield call(fetchMessage, action.payload);
        yield put(addMessage(result));
    } catch (error) {
        console.log(error);
    }
}

export function* workerAddMessageToMessage(
    action: ActionPayload<AddMessageToMessageProps>,
): Generator<CallEffect<TeamLeaderBoardResponse>> {
    try {
        yield call(addMessageToMessage, action.payload);
    } catch (error) {
        console.log(error);
    }
}

export function* workerGetMessageToMessage(
    action: ActionPayload<GetMessageToMessageProps>,
): Generator<CallEffect<TeamLeaderBoardResponse>> {
    try {
        yield call(getMessageToMessage, action.payload);
    } catch (error) {
        console.log(error);
    }
}
