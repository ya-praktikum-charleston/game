import {useRouter} from "next/router";
import MainContainer from "../../components/MainContainer";

function User({user}) {
    const {query} = useRouter()

    return (
        <MainContainer keywords={"user page"} title={`${user.name}`}>

            <div>Пользователь c id {query.id}</div>
            <div>Имя пользователя - {user.name}</div>

        </MainContainer>
    )
};

export default User;

export async function getServerSideProps({params}) {
    const response = await fetch(`https://jsonplaceholder.typicode.com/users/${params.id}`)
    const user = await response.json()
    return {
        props: {user}, // will be passed to the page component as props
    }
}
