import React, { ReactElement } from 'react';
import ForumForm from './forumForm';
import ForumChaptersList from './forumСhaptersList';

const ForumChapters = (): ReactElement => {
    const onSubmitHandler = () => {
        console.log('test');
    };
    return (
        <div className="forum-content-chapter">
            <ForumForm placeholder="Добавить раздел" onSubmit={onSubmitHandler} />
            <ForumChaptersList />
        </div>
    );
};

export default ForumChapters;
