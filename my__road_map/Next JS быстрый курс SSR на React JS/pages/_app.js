import App from "next/app";
import React from 'react';
import {Provider, useDispatch} from "react-redux";
import { createWrapper } from "next-redux-wrapper";
import store from "../redux/store";

import '../styles/global.css'
//import {setUnits} from "../redux/actions/units";
//import '../styles/navbar.css'

import { appWithTranslation } from 'next-i18next';


function MyApp({Component, pageProps, users}) {
    //const { Component, pageProps, users } = props;
    console.log(users);
    return (
        <Provider store={store}>
            <Component {...pageProps}/>
        </Provider>
    );
}

// class MyApp extends App {
//
//     render(){
//         const { Component, pageProps } = this.props;
//         return (
//             <Provider store={store}>
//                 <Component {...pageProps}/>
//             </Provider>
//         );
//     }
// }

const makestore = () => store;
const wrapper = createWrapper(makestore);
//export default wrapper.withRedux(MyApp);

export default appWithTranslation(wrapper.withRedux(MyApp));

// export async function getServerSideProps(context) {
//     const response = await fetch(`https://jsonplaceholder.typicode.com/users`)
//     const users = await response.json()
//
//     return {
//         props: {users},
//     }
//     // const dispatch = useDispatch();
//     // dispatch(setUnits(users));
// }

