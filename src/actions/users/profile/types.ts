import type { ProfileProps } from '../../../../app/api/users/types';
import { ActionPayload } from '../../types';

export type ProfileAction = (props: ProfileProps) => ActionPayload<ProfileProps>;
