import axios from '../../utils/axios-instance';
import type {
    ProfileProps,
    AvatarProps,
    PasswordProps,
    ProfileResponse,
    AvatarResponse,
    PasswordResponse,
} from './types';

export const profile = (props: ProfileProps): Promise<ProfileResponse> => axios.put<ProfileResponse>('/user/profile', props)
    .then(({ data }) => data);

export const avatar = (props: AvatarProps): Promise<AvatarResponse> => axios.put<AvatarResponse>('/user/profile/avatar', props)
    .then(({ data }) => data);

export const password = (props: PasswordProps): Promise<PasswordResponse> => axios.put<PasswordResponse>('/user/password', props)
    .then(({ data }) => data);
