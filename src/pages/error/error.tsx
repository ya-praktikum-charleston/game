import React from 'react';
import { Props, ErrorPageProps, Error } from './types';

import './error.css';

const errors: Error[] = [
    {
        number: 404,
        description: 'Ошибка!',
        message: 'К сожалению, запрашиваемая страница не найдена',
    },
    {
        number: 500,
        description: 'Ошибка сервера!',
        message: 'Мы о ней знаем и скоро исправим!',
    },
];

function getError(number: 404 | 500): Error {
    const error = errors.find((item) => item.number === number);

    if (error) {
        return error;
    }

    throw new Error('error not found');
}

const ErrorPage: Props = ({ number }: ErrorPageProps) => {
    const error = getError(number);

    return (
        <div className="main">
            <div className="block">
                <div className="error">
                    <div className="error__number">{number}</div>
                    <div className="error__decription">{error.description}</div>
                    <div className="error__message">{error.message}</div>
                </div>

                <button type="button" className="return-btn">Вернуться</button>
            </div>
        </div>
    );
};

export default ErrorPage;
