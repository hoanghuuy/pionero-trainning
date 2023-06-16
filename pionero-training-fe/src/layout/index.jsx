import { Button, Container } from "react-bootstrap";
import Header from "./header";
import { Link } from "react-router-dom";

export default function Layout({ pageTitle, sideAction, children }) {
    return (
        <>
            <Header />

            <main id="main" className="mt-3">
                <Container>
                    <div className="heading d-flex justify-content-between align-items-baseline">
                        <h1 className="page-title">{pageTitle ?? ""}</h1>
                        {!!sideAction ? (
                            <Link className="d-block" to={sideAction.url}>
                                <Button>{sideAction.name}</Button>
                            </Link>
                        ) : (
                            <div></div>
                        )}
                    </div>
                    <div className="page-content mt-4">{children}</div>
                </Container>
            </main>
        </>
    );
}
