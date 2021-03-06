import React from 'react';
import { useParams } from 'react-router-dom';
import CommentAdd from './CommentAdd';
import { API } from '../../api';
import { PropsCommentType, MessageType } from './type';

interface UseParamsTypes {
    id: string;
}

function Comment(props: PropsCommentType) {
    const { message } = props;
    const [answers, setAnswers] = React.useState<MessageType[]>([]);
    const [viewForn, setViewForn] = React.useState<boolean>(false);
    const { id } = useParams<UseParamsTypes>();

    const handleAddMessagesToMessages = React.useCallback(
        (value) => {
            value.messageId = message?.id;
            API.addMessageToMessage(id, JSON.stringify(value))
                .then((response) => {
                    setAnswers([...answers, response.data]);
                    setViewForn(!viewForn);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        [id, message, answers, viewForn],
    );

    React.useEffect(() => {
        API.getMessageToMessage(id, message.id)
            .then((response) => {
                setAnswers(response.data);
            })
            .catch((error) => {
                console.log(error);
            });
    }, [id, message]);

    return (
        <>
            <div className="message">
                <div className="message_main">
                    <div className="message_content">
                        <p>{message.text}</p>
                        <div className="info">
                            <span>
                                <b>{message.author || ''}</b>
                            </span>
                            <span>
                                {message.createdAt
                                    ? new Date(message.createdAt).toLocaleString('ru-RU', { dateStyle: 'short', timeStyle: 'short' })
                                    : 'Без даты'}
                            </span>
                        </div>
                    </div>
                    <div className="message_answer" onClick={() => setViewForn(!viewForn)}>
                        {viewForn ? 'СКРЫТЬ' : 'ОТВЕТИТЬ'}
                    </div>
                    {viewForn && (
                        <CommentAdd
                            handleAddMessages={handleAddMessagesToMessages}
                        />
                    )}
                </div>
                <div className="answers">
                    <div className="answer-main">
                        {!!answers.length
                            && answers.map((elem, i) => (
                                <>
                                    <Comment key={i} message={elem} />
                                </>
                            ))}
                    </div>
                </div>
            </div>
        </>
    );
}

export default Comment;
