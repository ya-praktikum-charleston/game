import type { AvatarAction } from '../../../actions/users/avatar/types';

export type Props = {
    avatarLink: null | string;
    avatar: AvatarAction;
};

export type FormProps = {
    avatar: FileList;
};
