import React from 'react';
import { useParams } from 'react-router-dom';
import { useDispatch, useSelector } from 'react-redux';
import Topic from './Topic';
import Comment from './Comment';
import CommentAdd from './CommentAdd';
import { API } from '../../api';
import Main from '../../components/main';
import { PostType, MessageType } from './type';
import { fetchMessages } from '../../actions/forum';

interface UseParamsTypes {
    id: string;
}

type addMessageValueType = {
    author: string,
    text: string,
};

function Post() {
    const [post, setPost] = React.useState<PostType | null>(null);
    const [messages2, setMessages] = React.useState<MessageType[]>([]);
    const { id } = useParams<UseParamsTypes>();
    const dispatch = useDispatch();
    const messages: MessageType[] = useSelector(({ widgets }) => widgets.forum.messages);

    const handleAddMessages = React.useCallback(
        (value: addMessageValueType) => {
            API.addMessage(id, JSON.stringify(value))
                .then((response) => {
                    setMessages([...messages, response.data]);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        [id, messages],
    );

    const handleGetMessages = React.useCallback(() => {
        //API.getMessages(id).then((response) => {
        //    setMessages(response.data);
        //});
        dispatch(fetchMessages(id));
    }, [id, setMessages]);

    React.useEffect(() => {
        API.getPost(id).then((response) => {
            setPost(response.data);
            handleGetMessages();
        });
    }, [id, handleGetMessages]);

    return (
        <>
            <Main title="Форум">
                <div className="forum">
                    <div className="forum-content">
                        <Topic post={post} />
                        <div className="messages">
                            {messages.length ? (
                                messages.map((elem) => (
                                    <Comment key={elem.id} message={elem} />
                                ))
                            ) : (
                                <p>Комментариев нет</p>
                            )}
                        </div>
                        <CommentAdd handleAddMessages={handleAddMessages} mainComment />
                    </div>
                </div>
            </Main>
        </>
    );
}

export default Post;
