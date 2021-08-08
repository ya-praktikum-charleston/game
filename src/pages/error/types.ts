import { FC } from 'react';

export type ErrorPageProps = {
    number: 404 | 500;
};

export type Error = {
    number: 404 | 500;
    message: string;
    description: string;
};

export type Props = FC<ErrorPageProps>;
