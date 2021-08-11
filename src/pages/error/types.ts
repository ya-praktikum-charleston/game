import { FC } from 'react';

export type ErrorPageProps = {
    number: 404 | 500;
};

export type Errors = {
    number: 404 | 500;
    message: string;
    description: string;
};

export type Props = FC<ErrorPageProps>;
