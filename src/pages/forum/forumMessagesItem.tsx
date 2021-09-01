import React, { ReactElement } from 'react';
import classNames from 'classnames';

type Props = {
    avatar: string,
    content: string,
    date: string,
    login: string,
    admin: string,
};

const ForumMessagesItem = ({
    avatar,
    login,
    content,
    date,
    admin,
}: Props): ReactElement => {
    const messageUserStyle = classNames('msg-content', { 'msg-content-out ': admin === 'user' });
    const msgAvatarStyle = classNames('msg-avatar', { 'msg-avatar-out ': admin === 'user' });
    const msgBoxStyle = classNames('msg-box', { 'msg-box-out ': admin === 'user' });
    return (
        <div className={messageUserStyle}>
            <div className={msgAvatarStyle}>{avatar}</div>
            <div className={msgBoxStyle}>
                <div className="msg-user">{login}</div>
                <div className="msg-text">{content}</div>
                <div className="msg-date">{date}</div>
                {/* <div className="msg-setting">Н</div> */}
            </div>
        </div>
    );
};

export default ForumMessagesItem;
