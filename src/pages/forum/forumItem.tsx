import React from 'react';
import AddIcon from '../../assets/svg/add.svg';

type MainProps = {
    topic: string;
    countTopics: number;
    countAnswers: number;
};

const FormItem = ({ topic, countTopics, countAnswers }: MainProps) => (
    <div className="table-forum-item">
        <div className="item-topics">{topic}</div>
        <div className="item-topics-count">
            <div className="item-topics-value">{countTopics}</div>
            <img className="item-topics-icon" src={AddIcon} alt="add" />
        </div>
        <div className="item-answers">{countAnswers}</div>
    </div>
);

export default FormItem;
