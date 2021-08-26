import React from 'react';
import { Formik, Form } from 'formik';
import TextInput from '../../components/text-input';
import AddIcon from '../../assets/svg/add.svg';
import ForumTopicsList from './forumTopicsList';

const ForumTopics = () => (
    <div className="forum-content-topics">
        <Formik
            initialValues={{ topics: '' }}
            onSubmit={(values) => console.log(values)}
        >
            <Form className="form-add-topic">
                <TextInput name="topics" type="text" placeholder="Добавить тему" />
                <button className="btn-add-topic" type="submit"><img className="item-topics-icon" src={AddIcon} alt="add" /></button>
            </Form>
        </Formik>
        <ForumTopicsList />
    </div>
);

export default ForumTopics;
