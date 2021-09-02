import React, { ReactElement } from 'react';
import { Formik, Form } from 'formik';
import TextInput from '../../components/text-input';
import AddIcon from '../../assets/svg/add.svg';
import ForumChaptersList from './forumСhaptersList';

const ForumChapters = (): ReactElement => (
    <div className="forum-content-chapter">
        <Formik
            initialValues={{ topics: '' }}
            onSubmit={(values) => console.log(values)}
        >
            <Form className="form-add-topic">
                <TextInput name="topics" type="text" placeholder="Добавить раздел" />
                <button className="btn-add-topic" type="submit"><img className="item-topics-icon" src={AddIcon} alt="add" /></button>
            </Form>
        </Formik>
        <ForumChaptersList />
    </div>
);

export default ForumChapters;
