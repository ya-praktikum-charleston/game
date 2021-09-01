import React, { ReactElement } from 'react';

type Props = {
    avatar: string,
    content: string,
    date: string
};

const ForumMessagesItem = ({ avatar, content, date }: Props): ReactElement => (
    <div className="msg-content">
        <div className="msg-avatar">{avatar}</div>
        <div className="msg-box">
            <div className="msg-text">{content}</div>
            <div className="msg-date">{date}</div>
            <div className="msg-setting">Н</div>
        </div>
    </div>
);

export default ForumMessagesItem;
