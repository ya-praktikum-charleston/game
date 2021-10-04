export type fetchData = {
    id: number,
    login: string,
    avatar: string,
    point: number,
};

export type UserLeaderBoardProps = {
    data: fetchData,
    ratingFieldName: 'point',
    teamName: 'charleston'
};

export type AllLeaderBoardProps = {
    ratingFieldName: 'point',
    cursor: 0,
    limit: 10
};

export type TeamLeaderBoardProps = {
    ratingFieldName: 'point',
    cursor: 0,
    limit: 10
};

export type UserLeaderBoardResponse = string;

export type AllLeaderBoardResponse = { data: fetchData }[];

export type TeamLeaderBoardResponse = { data: fetchData }[];
