import React, { ReactElement } from 'react';
import {
    Link,
    useParams,
} from 'react-router-dom';
import ForumForm from './forumForm';
import ForumMessages from './forumMessages';
import content from './data';

type ParamTypes = {
    chapterId: string;
    topicId: string;
};

const ForumMessageList = (): ReactElement => {
    const { chapterId, topicId } = useParams<ParamTypes>();
    const onSubmitHandler = () => {};
    const chapterItem = content.find(
        (chapterElement) => chapterElement.id === +chapterId,
    );
    return (
        <div className="forum-content-msg">

            {
                chapterItem && chapterItem.topicsList.map(
                    (topicItem) => {
                        if (topicItem.id !== +topicId) {
                            return null;
                        }
                        const { id, messageList } = topicItem;
                        return (
                            <>
                                <div className="title-forum-page">
                                    <div className="title-columns">
                                        <div className="text-h2">тема</div>
                                        <Link to={`/forum/chapters/${chapterItem.id}`}><span className="column-back">вернуться к списку тем</span></Link>
                                    </div>
                                    <h2 className="item-chapter">{topicItem && topicItem.name}</h2>
                                </div>
                                <div className="msg-main">
                                    <ForumMessages
                                        key={id}
                                        date="12/07/2021"
                                        content={messageList}
                                    />
                                </div>
                            </>
                        );
                    },
                )
            }
            <ForumForm placeholder="Введите сообщение" onSubmit={onSubmitHandler} />
        </div>
    );
};

export default ForumMessageList;
