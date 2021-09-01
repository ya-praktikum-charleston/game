import React, { ReactElement } from 'react';
import {
    Link,
    useParams,
    useRouteMatch,
} from 'react-router-dom';
import FormTopicsItem from './topicItem';
import content from './data';

type ParamTypes = {
    chapterId: string;
};

const ForumTopicsList = (): ReactElement => {
    const { chapterId } = useParams<ParamTypes>();
    const { url } = useRouteMatch();
    return (
        <div className="table-forum">
            <div className="table-topics-item">
                <div className="table-topics text-h2">темы</div>
                <div className="table-answers text-h2">сообщения</div>
            </div>
            {
                content.map((chapterItem) => {
                    if (chapterItem.id === +chapterId) {
                        const { topicsList } = chapterItem;
                        return topicsList.map((topicItem) => {
                            const { id, name, countAnswers } = topicItem;
                            return (
                                <Link key={id} to={`${url}/topics/${id}`}>
                                    <FormTopicsItem
                                        key={id}
                                        topic={name}
                                        countAnswers={countAnswers}
                                    />
                                </Link>
                            );
                        });
                    }
                    return null;
                })
            }
        </div>
    );
};

export default ForumTopicsList;
