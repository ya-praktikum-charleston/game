import React from "react";
import MainContainer from "../components/MainContainer";
import { useTranslation } from 'next-i18next';
import { serverSideTranslations } from 'next-i18next/serverSideTranslations';

const LoadData = () => {

    const { t, i18n } = useTranslation('header');

    const checkLanguage = (language) => {
        i18n.changeLanguage(language);
    }

    return (
        <MainContainer keywords={"users page"} title={'Переводчик'}>
            <h1>Переводчик</h1>

            <p>{t("personal_account")}</p>

            <button onClick={()=> checkLanguage('ru')}>RU</button>
            <button onClick={()=> checkLanguage('en')}>EN</button>
        </MainContainer>
    );
};

export default LoadData;


export const getStaticProps = async ({ locale }) => {
    return  {
        props: {
            ...await serverSideTranslations(locale, ['header'])
        }

    }
}
