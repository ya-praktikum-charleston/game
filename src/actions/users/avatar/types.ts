import type { AvatarProps } from '../../../../app/api/users/types';
import type { ActionPayload } from '../../types';

export type AvatarAction = (payload: AvatarProps) => ActionPayload<AvatarProps>;
