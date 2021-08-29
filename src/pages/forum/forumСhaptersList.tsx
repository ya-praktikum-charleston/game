import React, { ReactElement } from 'react';
import {
    Link,
    useRouteMatch,
} from 'react-router-dom';
import ForumItem from './forumItem';
import content from './data';

const ForumChaptersList = (): ReactElement => {
    const { url } = useRouteMatch();
    return (
        <div className="table-forum">
            <div className="table-forum-item">
                <div className="table-chapters text-h2">разделы</div>
                <div className="table-topics text-h2">темы</div>
                <div className="table-answers text-h2">ответы</div>
            </div>
            {
                content.map((chapterItem) => {
                    const {
                        id, name, countTopics, countAnswers,
                    } = chapterItem;
                    return (
                        <Link key={id} to={`${url}/chapters/${id}`}><ForumItem topic={name} countTopics={countTopics} countAnswers={countAnswers} /></Link>
                    );
                })
            }
        </div>
    );
};

export default ForumChaptersList;
