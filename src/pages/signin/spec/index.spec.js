// 2. Сабмит формы

import React from 'react';
import {Provider} from 'react-redux';
import {mount} from 'enzyme';
import { signinAction } from '../../../actions/auth/signin';

import {mockStore} from 'mocks/store';

import Signin from '../';

jest.mock('../../../components/main', () => function Main({children}) {
    return children;
});

jest.mock('react-router-dom', () => ({
    Link(props) {
        return <a {...props} />;
    },
    Redirect(props) {
        return <span {...props} />;
    },
}));

describe('<Signin />', () => {
    let store;
    let wrapper;

    beforeEach(() => {
        store = mockStore({
            collections: {
                signin: {
                    data: 'OK',
                },
            },
        });

        wrapper = mount(
            <Provider store={store}>
                <Signin />
            </Provider>
        );
    });

    describe('редиректим на корневой роут, если', () => {
        it('успешно авторизовались', () => {
            expect(wrapper.find('Signin').find('Redirect')).toHaveLength(1);
            expect(wrapper.find('Signin').find('Redirect').props()).toEqual({
                to: '/',
            });
        });

        it('пользователь уже авторизован', () => {
            store = mockStore({
                collections: {
                    signin: {
                        error: 'User already in system',
                    },
                },
            });

            wrapper = mount(
                <Provider store={store}>
                    <Signin />
                </Provider>
            );

            expect(wrapper.find('Signin').find('Redirect')).toHaveLength(1);
            expect(wrapper.find('Signin').find('Redirect').props()).toEqual({
                to: '/',
            });
        });
    });

    it('при сабмите формы диспатчим экшн для авторизации', () => {
        store = mockStore({
            collections: {
                signin: {},
            },
        });

        wrapper = mount(
            <Provider store={store}>
                <Signin />
            </Provider>
        );

        // console.log(wrapper.debug());

        wrapper.find('Signin').find('ReactFinalForm').props().onSubmit({
            login: 'admin',
            password: 'pass',
        });

        expect(store.getActions()).toEqual([
            signinAction({
                login: 'admin',
                password: 'pass',
            }),
        ]);
    });

    it('рендерим сообщение об ошибке, если пользователь ввел неправильный логин или пароль', () => {
        store = mockStore({
            collections: {
                signin: {
                    error: 'Login or password is incorrect',
                },
            },
        });

        wrapper = mount(
            <Provider store={store}>
                <Signin />
            </Provider>
        );

        // console.log(wrapper.debug());

        expect(wrapper.find('LoginPassError')).toHaveLength(1);
    });

    it('не рендерим сообщение об ошибке, если пользователь ввел правильный логин и пароль', () => {
        expect(wrapper.find('LoginPassError')).toHaveLength(0);
    });
});
