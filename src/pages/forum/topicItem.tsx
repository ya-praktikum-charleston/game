import React, { ReactElement } from 'react';

type MainProps = {
    topic: string;
    countAnswers: string;
};

const FormTopicsItem = ({ topic, countAnswers }: MainProps): ReactElement => (
    <div className="table-topics-item">
        <div data-name="topics" className="item-topics">{topic}</div>
        <div className="item-answers">{countAnswers}</div>
    </div>
);

export default FormTopicsItem;
