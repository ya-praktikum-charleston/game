import LinkNav from "./linkNav";
import Head from "next/head";

const MainContainer = ({children, keywords, title}) => {
    return (
        <>
            <Head>
                <meta keywords={"мета теги, nextjs " + keywords}></meta>
                <title>{title}</title>
            </Head>
            <div className="navbar">
                <LinkNav href={'/'} text="Главная"/>
                <LinkNav href={'/users'} text="Пользователи"/>
                <LinkNav href={'/count'} text="Счётчик"/>
                {/*<LinkNav href={'/loaddata'} text="Серверная загрузка данных"/>*/}
                <LinkNav href={'/storage'} text="Redux"/>
                <LinkNav href={'/language'} text="Переводчик"/>
            </div>
            <div>
                {children}
            </div>
            <style jsx>
                {`
                    .navbar {
                        background: orange;
                        padding: 15px;
                    }
                `}
            </style>
        </>
    );
};

export default MainContainer;
