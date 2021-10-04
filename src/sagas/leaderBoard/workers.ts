import {
    put,
    call,
    CallEffect,
    PutEffect,
} from 'redux-saga/effects';
import { setUnexpectedError } from '../../actions/app';
import {
    addUserLeaderBoard,
    getAllLeaderBoard,
    getTeamLeaderBoard,
} from '../../../app/api/leaderBoard';
import { fetchUserFulfilled } from '../../actions/auth/user';
import { leaderboardList } from '../../actions/app';
import type { Action, ActionPayload } from '../../actions/types';
import type {
    UserLeaderBoardProps,
    UserLeaderBoardResponse,
    AllLeaderBoardProps,
    AllLeaderBoardResponse,
    TeamLeaderBoardProps,
    TeamLeaderBoardResponse,
} from '../../../app/api/leaderBoard/types';

export function* workerAddUserLeaderBoard(
    action: ActionPayload<UserLeaderBoardProps>,
): Generator<CallEffect<UserLeaderBoardResponse>
    | PutEffect<ActionPayload<UserLeaderBoardResponse>>
    | PutEffect<ActionPayload<boolean>>, void, UserLeaderBoardResponse> {
    try {
        debugger
        yield call(addUserLeaderBoard, action.payload);
    } catch (error) {
        yield put(setUnexpectedError(true));
    }
}

export function* workerGetAllLeaderBoard(
    action: ActionPayload<AllLeaderBoardProps>,
): Generator<CallEffect<AllLeaderBoardResponse>
    | PutEffect<ActionPayload<AllLeaderBoardResponse>>
    | PutEffect<ActionPayload<boolean>>, void, AllLeaderBoardResponse> {
    try {
        const response = yield call(getAllLeaderBoard, {
            ratingFieldName: 'point',
            cursor: 0,
            limit: 10,
        });
        yield put(leaderboardList(response as AllLeaderBoardResponse));
    } catch (error) {
        yield put(setUnexpectedError(true));
    }
}

export function* workerGetTeamLeaderBoard(
    action: ActionPayload<TeamLeaderBoardProps>,
): Generator<CallEffect<TeamLeaderBoardResponse>
    | PutEffect<ActionPayload<TeamLeaderBoardResponse>>
    | PutEffect<ActionPayload<boolean>>, void, TeamLeaderBoardResponse> {
    try {
        yield call(getTeamLeaderBoard, action.payload);
    } catch (error) {
        yield put(setUnexpectedError(true));
    }
}
