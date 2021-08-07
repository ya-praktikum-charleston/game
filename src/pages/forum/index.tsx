import React from 'react';
import './forum.css';
import Main from '../../components/main';
import ForumItem from './forumItem';

export default function ForumPage() {
    return (
        <Main title="Форум">
            <div className="table-forum">
                <ForumItem topic='Новые игры' countTopics={222} countAnswers={345} />
                <ForumItem topic='Геймдизайнеры' countTopics={5} countAnswers={14} />
                <ForumItem topic='Технологии' countTopics={590} countAnswers={895} />
            </div>
        </Main>
    );
}
