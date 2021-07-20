import React, { useState, useEffect } from 'react';
import MainContainer from "../components/MainContainer";
import { useDispatch, useSelector } from "react-redux";
import {setUnits} from "../redux/actions/units";

const Storage = ({users}) => {

    const dispatch = useDispatch();
    const { units } = useSelector(({ units }) => units);

    // redux заработал, осталось разобраться как выполнять fetch запрос при загрузке сайта
    useEffect(() => {
        dispatch(setUnits(users));
    }, []);

    return (
        <MainContainer keywords={"Redux page"} title={'Redux'}>
            <h1>Redux</h1>

            <br/>
            <h2>props users</h2>
            {Object.keys(users).map((elem, i) => (
                <p key={i}>{users[elem].name}</p>
            ))}

            <br/>
            <h2>Проверка работы Redux</h2>
            {units && Object.keys(units).map((elem, i) => (
                <p key={i}>{units[elem].name}</p>
            ))}
        </MainContainer>
    );
};

export default Storage;


export async function getServerSideProps(context) {
    const response = await fetch(`https://jsonplaceholder.typicode.com/users`)
    const users = await response.json()

    return {
        props: {users},
    }
}
