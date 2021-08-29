import React from 'react';
import './forum.css';
import {
    Switch,
    Route,
    useRouteMatch,
} from 'react-router-dom';
import Main from '../../components/main';
import ForumMessageList from './forumMessageList';
import ForumChapters from './forumChapters';
import ForumTopics from './forumTopics';

const ForumPage = () => {
    const { url } = useRouteMatch();
    return (
        <Main title="Форум">
            <div className="forum">
                <div className="forum-content">
                    <Switch>
                        <Route exact path={`${url}`}><ForumChapters /></Route>
                        <Route exact path={`${url}/chapters/:chapterId`}><ForumTopics /></Route>
                        <Route exact path={`${url}/chapters/:chapterId/topics/:topicId`}><ForumMessageList /></Route>
                    </Switch>
                </div>
            </div>
        </Main>
    );
};

export default ForumPage;
