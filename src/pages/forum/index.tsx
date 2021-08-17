import React from 'react';
import { Formik, Form } from 'formik';
import './forum.css';
import Main from '../../components/main';
import ForumItem from './forumItem';
import FormTopicsItem from './topicItem';
import TextInput from '../../components/text-input';
import AddIcon from '../../assets/svg/add.svg';

export default function ForumPage() {
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
                <div className="forum-content" onClick={handleViewForum}>
                    <div className="forum-content-chapter" style={{ margin: '0px 45px' }}>
                        <Formik
                            initialValues={{ topics: '' }}
                            onSubmit={(values) => console.log(values)}
                        >
                            <Form className="form-add-topic">
                                <TextInput name="topics" type="text" placeholder="Добавить раздел" />
                                <button className="btn-add-topic" type="submit"><img className="item-topics-icon" src={AddIcon} alt="add" /></button>
                            </Form>
                        </Formik>
                        <div className="table-forum">
                            <div className="table-forum-item">
                                <div className="table-topics">темы</div>
                                <div className="table-answers">ответы</div>
                            </div>
                            <ForumItem topic="Новые игры" countTopics={222} countAnswers={345} />
                            <ForumItem topic="Геймдизайнеры" countTopics={5} countAnswers={14} />
                            <ForumItem topic="Технологии" countTopics={590} countAnswers={895} />
                            <ForumItem topic="Новые игры" countTopics={222} countAnswers={345} />
                            <ForumItem topic="Геймдизайнеры" countTopics={5} countAnswers={14} />
                            <ForumItem topic="Технологии" countTopics={590} countAnswers={895} />
                        </div>
                    </div>
                    <div className="forum-content-topics" style={{ margin: '0px 45px' }}>
                        <Formik
                            initialValues={{ topics: '' }}
                            onSubmit={(values) => console.log(values)}
                        >
                            <Form className="form-add-topic">
                                <TextInput name="topics" type="text" placeholder="Добавить тему" />
                                <button className="btn-add-topic" type="submit"><img className="item-topics-icon" src={AddIcon} alt="add" /></button>
                            </Form>
                        </Formik>
                        <div className="table-forum">
                            <div className="table-topics-item">
                                <div className="table-answers grid">Сообщения</div>
                            </div>
                            <FormTopicsItem topic="Новые игры" countAnswers={345} />
                            <FormTopicsItem topic="Геймдизайнеры" countAnswers={14} />
                            <FormTopicsItem topic="Технологии" countAnswers={895} />
                            <FormTopicsItem topic="Новые игры" countAnswers={345} />
                            <FormTopicsItem topic="Геймдизайнеры" countAnswers={14} />
                            <FormTopicsItem topic="Технологии" countAnswers={895} />
                        </div>
                    </div>
                    <div className="forum-content-msg" style={{ margin: '0px 45px' }}>
                        <div className="msg-main">
                            <div className="date-stick">11.08.2021</div>
                            <div className="msg-content">
                                <div className="msg-avatar">Av</div>
                                <div className="msg-box">
                                    <div className="msg-text">Добрый вечер! Я согласен с тем, что было сказано выше, однако я не был на сколько котегоричен!</div>
                                    <div className="msg-date">23:03</div>
                                    <div className="msg-setting">Н</div>
                                </div>
                            </div>
                            <div className="msg-content">
                                <div className="msg-avatar">Av2</div>
                                <div className="msg-box">
                                    <div className="msg-text">Добрый вечер! Глупости говорите!</div>
                                    <div className="msg-date">23:06</div>
                                    <div className="msg-setting">Н</div>
                                </div>
                            </div>
                            <div className="msg-content">
                                <div className="msg-avatar">Av2</div>
                                <div className="msg-box">
                                    <div className="msg-text">Добрый вечер! Глупости говорите!</div>
                                    <div className="msg-date">23:06</div>
                                    <div className="msg-setting">Н</div>
                                </div>
                            </div>
                            <div className="date-stick">12.08.2021</div>
                            <div className="msg-content">
                                <div className="msg-avatar">Av2</div>
                                <div className="msg-box">
                                    <div className="msg-text">Добрый вечер! Глупости говорите!</div>
                                    <div className="msg-date">23:06</div>
                                    <div className="msg-setting">Н</div>
                                </div>
                            </div>
                            <div className="msg-content">
                                <div className="msg-avatar">Av2</div>
                                <div className="msg-box">
                                    <div className="msg-text">Добрый вечер! Глупости говорите!</div>
                                    <div className="msg-date">23:06</div>
                                    <div className="msg-setting">Н</div>
                                </div>
                            </div>
                            <div className="msg-content">
                                <div className="msg-avatar">Av2</div>
                                <div className="msg-box">
                                    <div className="msg-text">Добрый вечер! Глупости говорите!</div>
                                    <div className="msg-date">23:06</div>
                                    <div className="msg-setting">Н</div>
                                </div>
                            </div>
                            <div className="msg-content">
                                <div className="msg-avatar">Av2</div>
                                <div className="msg-box">
                                    <div className="msg-text">Добрый вечер! Глупости говорите!</div>
                                    <div className="msg-date">23:06</div>
                                    <div className="msg-setting">Н</div>
                                </div>
                            </div>
                            <div className="msg-content">
                                <div className="msg-avatar">Av2</div>
                                <div className="msg-box">
                                    <div className="msg-text">Добрый вечер! Глупости говорите!</div>
                                    <div className="msg-date">23:06</div>
                                    <div className="msg-setting">Н</div>
                                </div>
                            </div>
                            <div className="msg-content">
                                <div className="msg-avatar">Av2</div>
                                <div className="msg-box">
                                    <div className="msg-text">Добрый вечер! Глупости говорите!</div>
                                    <div className="msg-date">23:06</div>
                                    <div className="msg-setting">Н</div>
                                </div>
                            </div>
                            <div className="msg-content">
                                <div className="msg-avatar">Av2</div>
                                <div className="msg-box">
                                    <div className="msg-text">Добрый вечер! Глупости говорите!</div>
                                    <div className="msg-date">23:06</div>
                                    <div className="msg-setting">Н</div>
                                </div>
                            </div>
                            <div className="msg-content">
                                <div className="msg-avatar">Av2</div>
                                <div className="msg-box">
                                    <div className="msg-text">Добрый вечер! Глупости говорите!</div>
                                    <div className="msg-date">23:06</div>
                                    <div className="msg-setting">Н</div>
                                </div>
                            </div>
                            <div className="msg-content">
                                <div className="msg-avatar">Av2</div>
                                <div className="msg-box">
                                    <div className="msg-text">Добрый вечер! Глупости говорите!</div>
                                    <div className="msg-date">23:06</div>
                                    <div className="msg-setting">Н</div>
                                </div>
                            </div>
                            <div className="msg-content">
                                <div className="msg-avatar">Av2</div>
                                <div className="msg-box">
                                    <div className="msg-text">Добрый вечер! Глупости говорите!</div>
                                    <div className="msg-date">23:06</div>
                                    <div className="msg-setting">Н</div>
                                </div>
                            </div>
                            <div className="date-stick">13.08.2021</div>
                            <div className="msg-content">
                                <div className="msg-avatar">Av2</div>
                                <div className="msg-box">
                                    <div className="msg-text">Добрый вечер! Глупости говорите!</div>
                                    <div className="msg-date">23:06</div>
                                    <div className="msg-setting">Н</div>
                                </div>
                            </div>
                            <div className="msg-content">
                                <div className="msg-avatar">Av2</div>
                                <div className="msg-box">
                                    <div className="msg-text">Добрый вечер! Глупости говорите!</div>
                                    <div className="msg-date">23:06</div>
                                    <div className="msg-setting">Н</div>
                                </div>
                            </div>
                            <div className="msg-content">
                                <div className="msg-avatar">Av2</div>
                                <div className="msg-box">
                                    <div className="msg-text">Добрый вечер! Глупости говорите!</div>
                                    <div className="msg-date">23:06</div>
                                    <div className="msg-setting">Н</div>
                                </div>
                            </div>
                            <div className="msg-content">
                                <div className="msg-avatar">Av2</div>
                                <div className="msg-box">
                                    <div className="msg-text">Добрый вечер! Глупости говорите!</div>
                                    <div className="msg-date">23:06</div>
                                    <div className="msg-setting">Н</div>
                                </div>
                            </div>
                            <div className="date-stick">14.08.2021</div>
                            <div className="msg-content">
                                <div className="msg-avatar">Av2</div>
                                <div className="msg-box">
                                    <div className="msg-text">Добрый вечер! Глупости говорите!</div>
                                    <div className="msg-date">23:06</div>
                                    <div className="msg-setting">Н</div>
                                </div>
                            </div>
                            <div className="msg-content">
                                <div className="msg-avatar">Av2</div>
                                <div className="msg-box">
                                    <div className="msg-text">Добрый вечер! Глупости говорите!</div>
                                    <div className="msg-date">23:06</div>
                                    <div className="msg-setting">Н</div>
                                </div>
                            </div>
                            <div className="msg-content">
                                <div className="msg-avatar">Av2</div>
                                <div className="msg-box">
                                    <div className="msg-text">Добрый вечер! Глупости говорите!</div>
                                    <div className="msg-date">23:06</div>
                                    <div className="msg-setting">Н</div>
                                </div>
                            </div>
                            <div className="msg-content">
                                <div className="msg-avatar">Av2</div>
                                <div className="msg-box">
                                    <div className="msg-text">Добрый вечер! Глупости говорите!</div>
                                    <div className="msg-date">23:06</div>
                                    <div className="msg-setting">Н</div>
                                </div>
                            </div>
                            <div className="msg-content">
                                <div className="msg-avatar">Av2</div>
                                <div className="msg-box">
                                    <div className="msg-text">Добрый вечер! Глупости говорите!</div>
                                    <div className="msg-date">23:06</div>
                                    <div className="msg-setting">Н</div>
                                </div>
                            </div>
                            <div className="msg-content">
                                <div className="msg-avatar">Av2</div>
                                <div className="msg-box">
                                    <div className="msg-text">Добрый вечер! Глупости говорите!</div>
                                    <div className="msg-date">23:06</div>
                                    <div className="msg-setting">Н</div>
                                </div>
                            </div>
                            <div className="msg-content">
                                <div className="msg-avatar">Av2</div>
                                <div className="msg-box">
                                    <div className="msg-text">Добрый вечер! Глупости говорите!</div>
                                    <div className="msg-date">23:06</div>
                                    <div className="msg-setting">Н</div>
                                </div>
                            </div>
                            <div className="msg-content">
                                <div className="msg-avatar">Av2</div>
                                <div className="msg-box">
                                    <div className="msg-text">Добрый вечер! Глупости говорите!</div>
                                    <div className="msg-date">23:06</div>
                                    <div className="msg-setting">Н</div>
                                </div>
                            </div>
                            <div className="msg-content">
                                <div className="msg-avatar">Av2</div>
                                <div className="msg-box">
                                    <div className="msg-text">Добрый вечер! Глупости говорите!</div>
                                    <div className="msg-date">23:06</div>
                                    <div className="msg-setting">Н</div>
                                </div>
                            </div>
                            <div className="msg-content">
                                <div className="msg-avatar">Av2</div>
                                <div className="msg-box">
                                    <div className="msg-text">Добрый вечер! Глупости говорите!</div>
                                    <div className="msg-date">23:06</div>
                                    <div className="msg-setting">Н</div>
                                </div>
                            </div>
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
                </div>
            </div>
        </Main>
    );
}
