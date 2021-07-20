import React, { useState, useEffect } from 'react';
//import {searchAPI} from "../api/api";
import MainContainer from "../components/MainContainer";

const Count = () => {

    const [count,setCount] = useState(0);
    const [count2,setCount2] = useState(0);
    const [lang,setLang] = useState(null);

    const addCount = () => {
        setCount(count+1);
    };

    useEffect(() => {
        setCount2(count);
        // searchAPI.getLangs().then((response) => {
        //     if (response.status === 200) {
        //         setLang(response.data);
        //     }
        // });
    }, [count]);

    return (
        <MainContainer keywords={"users page"} title={'Счётчик'}>
            <h1>Счётчик</h1>
            <br/>
            <p>{count}</p>
            <button onClick={()=> addCount()}>+</button>
            <br/>
            <p>{count2}</p>
            <br/>
            {lang && Object.keys(lang).map((elem, i) => (
                <p key={i}>{lang[elem].name}</p>
            ))}
        </MainContainer>
    );
};

export default Count;


