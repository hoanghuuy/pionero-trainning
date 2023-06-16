import { Button, Form } from "react-bootstrap";
import Layout from "../../layout";
import { useState } from "react";
import useAddUser from "../../hooks/useAddUser";
import { useNavigate } from "react-router-dom";

function AddUser() {
    const navigate = useNavigate();

    const [account, setAccount] = useState({
        name: "",
        email: "",
        password: "",
    });

    const { addUser } = useAddUser();

    const handleChangeInput = (type, e) => {
        setAccount((prev) => {
            prev[type] = e.target.value;
            return { ...prev };
        });
    };

    const submit = (e) => {
        e.preventDefault();
        addUser(account, navigate);
    };

    return (
        <Layout pageTitle={"Add User"}>
            <Form onSubmit={submit}>
                <Form.Group className="mb-3" controlId="nameI">
                    <Form.Label>Name</Form.Label>
                    <Form.Control
                        type="text"
                        placeholder="Enter name"
                        value={account.name}
                        onChange={(e) => handleChangeInput("name", e)}
                    />
                </Form.Group>

                <Form.Group className="mb-3" controlId="emailI">
                    <Form.Label>Email address</Form.Label>
                    <Form.Control
                        type="email"
                        placeholder="Enter email"
                        value={account.email}
                        onChange={(e) => handleChangeInput("email", e)}
                    />
                </Form.Group>

                <Form.Group className="mb-3" controlId="passwordI">
                    <Form.Label>Password</Form.Label>
                    <Form.Control
                        type="password"
                        placeholder="Enter password"
                        value={account.password}
                        onChange={(e) => handleChangeInput("password", e)}
                    />
                </Form.Group>

                <Button variant="primary" type="submit">
                    Submit
                </Button>
            </Form>
        </Layout>
    );
}

export default AddUser;
