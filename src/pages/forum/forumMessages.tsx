import React from 'react';
import ForumMessagesItem from './forumMessagesItem';

type Content = {
    id: number;
    avatar: string;
    content: string;
    date: string;
};

type Props = {
    date: string,
    content: { id: number, avatar: string, message: string, date: string }[],
};

const ForumMessages = ({ date, content }: Props) => (
    <>
        <div className="date-stick">{date}</div>
        {
            content.map((el) => (
                <ForumMessagesItem key={el.id} avatar={el.avatar} content={el.message} date={el.date} />
            ))
        }

    </>
);

export default ForumMessages;
