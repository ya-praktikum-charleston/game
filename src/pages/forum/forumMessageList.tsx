import React from 'react';
import { Formik, Form } from 'formik';
import {
    Link,
    useParams,
    useRouteMatch,
} from 'react-router-dom';
import TextInput from '../../components/text-input';
import ForumMessages from './forumMessages';
import AddIcon from '../../assets/svg/add.svg';
import content from './data';

const ForumMessageList = () => {
    const { chapterId, topicId } = useParams();
    const { url } = useRouteMatch();
    return (
        <div className="forum-content-msg">
            <div className="msg-main">
                {
                    content.map((chapterItem) => {
                        if (chapterItem.id === +chapterId) {
                            const { topicsList } = chapterItem;
                            return topicsList.map(
                                (topicItem) => {
                                    if (topicItem.id === +topicId) {
                                        const { id, messageList } = topicItem;
                                        return (
                                            <ForumMessages
                                                key={id}
                                                date="12/07/2021"
                                                content={messageList}
                                            />
                                        );
                                    }
                                    return null;
                                },
                            );
                        }
                        return null;
                    })
                }
            </div>

            <Formik
                initialValues={{ topics: '' }}
                onSubmit={(values) => console.log(values)}
            >
                <Form className="form-send-msg">
                    <TextInput name="topics" type="text" placeholder="Введите сообщение" />
                    <button className="btn-add-topic" type="submit"><img className="item-topics-icon" src={AddIcon} alt="add" /></button>
                </Form>
            </Formik>
        </div>
    );
};

export default ForumMessageList;
