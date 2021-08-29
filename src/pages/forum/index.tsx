import React, { ReactElement } from 'react';
import './forum.css';
import {
    Switch,
    Route,
    Link,
    useHistory,
    useLocation,
    useRouteMatch,
} from 'react-router-dom';
import Main from '../../components/main';
import ForumMessageList from './forumMessageList';
import ForumChapters from './forumChapters';
import ForumTopics from './forumTopics';

const ForumPage = (): ReactElement => {
    // let location = useLocation();
    // let background = location.state && location.state.background;
    const { path, url } = useRouteMatch();

    const handleViewForum = (e) => {
        console.log(e.target.dataset.name);
        const dataAttribut = e.target.dataset.name;
        if (dataAttribut === 'forum') {
            e.currentTarget.style.transform = 'translate3d(-100%, 0px, 0px)';
        } else if (dataAttribut === 'topics') {
            e.currentTarget.style.transform = 'translate3d(-200%, 0px, 0px)';
        } else {
            e.currentTarget.style.transform = 'translate3d(-200%, 0px, 0px)';
        }
    };
    return (
        <Main title="Форум">
            <div className="forum">
                <div className="forum-content">
                    <Switch>
                        <Route exact path={`${url}`}><ForumChapters /></Route>
                        <Route exact path={`${url}/chapters/:chapterId`}><ForumTopics /></Route>
                        <Route exact path={`${url}/chapters/:chapterId/topics/:topicId`}><ForumMessageList /></Route>
                    </Switch>

                    {/* Show the modal when a background page is set */}
                    {/* {background && <Route path="/img/:id" children={<Modal />} />} */}

                    {/* <ForumChapters />
                    <ForumTopics />
                    <ForumMessageList /> */}
                </div>
            </div>
        </Main>
    );
};

export default ForumPage;
