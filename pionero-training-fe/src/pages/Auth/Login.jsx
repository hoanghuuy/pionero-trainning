import { useState } from "react";
import { Button, Container, Form, Navbar } from "react-bootstrap";
import { Link, useNavigate } from "react-router-dom";
import useLogin from "../../hooks/useLogin";

function Login() {
    const navigate = useNavigate();

    const [account, setAccount] = useState({
        email: "",
        password: "",
    });

    const { login } = useLogin();

    const handleChangeInput = (type, e) => {
        setAccount((prev) => {
            prev[type] = e.target.value;
            return { ...prev };
        });
    };

    const submit = (e) => {
        e.preventDefault();
        login(account, navigate);
    };

    return (
        <>
            <header id="header">
                <Navbar
                    className="bg-body-tertiary"
                    bg="dark"
                    data-bs-theme="dark"
                >
                    <Container>
                        <Link to={"/"} className="text-decoration-none">
                            <Navbar.Brand>Pionero training</Navbar.Brand>
                        </Link>
                    </Container>
                </Navbar>
            </header>

            <Container
                id="login"
                className="w-50 mt-4 d-flex justify-content-center"
            >
                <div className="form-wrapper">
                    <h1>Login</h1>
                    <Form className="mt-5" onSubmit={submit}>
                        <Form.Group className="mb-3" controlId="emailI">
                            <Form.Label>Email address</Form.Label>
                            <Form.Control
                                type="email"
                                placeholder="Enter email"
                                value={account.email}
                                onChange={(e) => handleChangeInput("email", e)}
                            />
                            <Form.Text className="text-muted">
                                We'll never share your email with anyone else.
                            </Form.Text>
                        </Form.Group>

                        <Form.Group className="mb-3" controlId="passwordI">
                            <Form.Label>Password</Form.Label>
                            <Form.Control
                                type="password"
                                placeholder="Password"
                                value={account.password}
                                onChange={(e) =>
                                    handleChangeInput("password", e)
                                }
                            />
                        </Form.Group>

                        <Button
                            className="mt-3"
                            variant="primary"
                            type="submit"
                        >
                            Submit
                        </Button>
                    </Form>
                </div>
            </Container>
        </>
    );
}

export default Login;
