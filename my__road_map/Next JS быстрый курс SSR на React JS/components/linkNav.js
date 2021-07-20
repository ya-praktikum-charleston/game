import Link from "next/link";
import styles from '../styles/linkNav.module.css'

export default function LinkNav({text, href}) {
    return (
        <Link href={href}>
            <a className={styles.link}>{text}</a>
        </Link>
    )
}
