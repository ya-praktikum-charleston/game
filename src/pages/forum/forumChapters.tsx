import React, { ReactElement } from 'react';
import ForumForm from './forumForm';
import ForumChaptersList from './forumСhaptersList';

const ForumChapters = (): ReactElement => {
    const onSubmitHandler = () => {};
    return (
        <div className="forum-content-chapter">
            <ForumForm placeholder="Добавить раздел" onSubmit={onSubmitHandler} />
            <ForumChaptersList />
        </div>
    );
};

export default ForumChapters;
