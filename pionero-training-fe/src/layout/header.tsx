import { useEffect, useRef } from "react";
import Container from "react-bootstrap/Container";
import Navbar from "react-bootstrap/Navbar";
import { Link } from "react-router-dom";
import React from "react";

export type User = {
    id: number;
    name: string;
    email: string;
    phoneNumber?: string;
};

function Header() {
    const user = useRef<User>(JSON.parse(localStorage.getItem("me") || "{}"));

    useEffect(() => {
        user.current = JSON.parse(localStorage.getItem("me") || "{}");
    });

    return (
        <header id="header">
            <Navbar className="bg-body-tertiary" bg="dark" data-bs-theme="dark">
                <Container>
                    <Link to={"/"} className="text-decoration-none">
                        <Navbar.Brand>Pionero training</Navbar.Brand>
                    </Link>

                    <Navbar.Collapse className="justify-content-end">
                        {!!Object.keys(user.current).length ? (
                            <Navbar.Text>
                                Signed in as:{" "}
                                <Link
                                    to={`/user/${user.current.id}`}
                                    className="text-decoration-none"
                                >
                                    {user.current.name}
                                </Link>
                            </Navbar.Text>
                        ) : (
                            <Link
                                to={"/login"}
                                className="text-white text-decoration-none"
                                style={{
                                    cursor: "pointer",
                                }}
                            >
                                Login
                            </Link>
                        )}
                    </Navbar.Collapse>
                </Container>
            </Navbar>
        </header>
    );
}

export default Header;
