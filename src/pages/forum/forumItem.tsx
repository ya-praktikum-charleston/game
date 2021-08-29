import React from 'react';
import AddIcon from '../../assets/svg/add.svg';

type MainProps = {
    topic: string;
    countTopics: string;
    countAnswers: string;
};

const ForumItem = ({ topic, countAnswers, countTopics }: MainProps) => (
    <div className="table-forum-item">
        <div data-name="forum" className="item-topics">{topic}</div>
        <div className="item-topics-count">
            <div className="item-topics-value">{countTopics}</div>
            <img className="item-topics-icon" src={AddIcon} alt="add" />
        </div>
        <div className="item-answers">{countAnswers}</div>
    </div>
);

export default ForumItem;
