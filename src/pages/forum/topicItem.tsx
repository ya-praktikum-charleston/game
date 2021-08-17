import React from 'react';
import AddIcon from '../../assets/svg/add.svg';

type MainProps = {
    topic: string;
    countTopics?: number;
    countAnswers: number;
};

const FormTopicsItem = ({ topic, countTopics, countAnswers }: MainProps) => (
    <div className="table-topics-item">
        <div data-name="topics" className="item-topics">{topic}</div>
        {
            countTopics !== null
            && (
                <div className="item-topics-count">
                    <div className="item-topics-value">{countTopics}</div>
                    <img className="item-topics-icon" src={AddIcon} alt="add" />
                </div>
            )
        }

        <div className="item-answers">{countAnswers}</div>
    </div>
);

FormTopicsItem.defaultProps = {
    countTopics: null,
};

export default FormTopicsItem;
