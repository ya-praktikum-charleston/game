import React from 'react';
import {
    Link,
    useParams,
} from 'react-router-dom';
import ForumForm from './forumForm';
import ForumTopicsList from './forumTopicsList';
import LogoutIcon from '../../assets/svg/logout.svg';
import content from './data';

type ParamTypes = {
    chapterId: string;
    topicId: string;
};

const ForumTopics = () => {
    const { chapterId, topicId } = useParams<ParamTypes>();
    const chapterItem = content.find(
        (chapterElement) => chapterElement.id === +chapterId,
    );
    const onSubmitHandler = () => {
        console.log('test');
    };
    return (
        <div className="forum-content-topics">
            <ForumForm placeholder="Добавить тему" onSubmit={onSubmitHandler} />
            <div className="title-forum-page">
                <div className="title-columns">
                    <div className="text-h2">раздел</div>
                    <Link to="/forum"><span className="column-back">вернуться к разделам</span></Link>
                </div>
                <h2 className="item-chapter">{chapterItem && chapterItem.name}</h2>
            </div>
            <ForumTopicsList />
        </div>
    );
};

export default ForumTopics;
