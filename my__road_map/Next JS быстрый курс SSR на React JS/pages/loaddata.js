import React from 'react';
//import {searchAPI} from "../api/api";
import MainContainer from "../components/MainContainer";

const LoadData = ({lang}) => {

    return (
        <MainContainer keywords={"users page"} title={'Серверная загрузка данных'}>
            <h1>Серверная загрузка данных</h1>

            {/*{lang && Object.keys(lang).map((elem, i) => (*/}
            {/*    <p key={i}>{lang[elem].name}</p>*/}
            {/*))}*/}
        </MainContainer>
    );
};

export default LoadData;


export async function getStaticProps(context) {
    const lang = await searchAPI.getLangs().then((response) => {
        if (response.status === 200) {
            return response.data;
        }
    });
    return {
        props: {lang},
    }
}
