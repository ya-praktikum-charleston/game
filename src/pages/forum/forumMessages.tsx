import React from 'react';
import ForumMessagesItem from './forumMessagesItem';

type User = {
    login: string,
    avatar: string,
}

type Content = {
    id: number;
    user: User;
    date: string;
    message: string,
    admin: string,
};

type Props = {
    date: string,
    content: Content[],
};

const ForumMessages = ({ date, content }: Props) => (
    <>
        <div className="date-stick">{date}</div>
        {
            content.map((el) => (
                <ForumMessagesItem
                    key={el.id}
                    avatar={el.user.avatar}
                    login={el.user.login}
                    content={el.message}
                    date={el.date}
                    admin={el.admin}
                />
            ))
        }

    </>
);

export default ForumMessages;
