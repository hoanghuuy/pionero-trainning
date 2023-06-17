import { useState } from "react";
import { Button, Form } from "react-bootstrap";
import { useNavigate } from "react-router-dom";
import useAddUser from "../../hooks/useAddUser";
import Layout from "../../layout";

export interface UserAddI {
    name: "";
    email: "";
    password: "";
}

function AddUser() {
    const navigate = useNavigate();

    const [account, setAccount] = useState<UserAddI>({
        name: "",
        email: "",
        password: "",
    });

    const { addUser } = useAddUser();

    const handleChangeInput = (type: "name" | "email" | "password", e: any) => {
        setAccount((prev) => {
            prev[type] = e.target.value;
            return { ...prev };
        });
    };

    const submit = (e: any) => {
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
