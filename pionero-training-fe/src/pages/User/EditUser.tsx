import { useEffect, useState } from "react";
import { Button, Form } from "react-bootstrap";
import { useNavigate, useParams } from "react-router-dom";
import ManualSpinner from "../../components/ManualSpinner";
import useEditUser from "../../hooks/useEditUser";
import useGetUser from "../../hooks/useGetUser";
import Layout from "../../layout";

export interface userEditI {
    name: "";
    email: "";
    phoneNumber: "";
}

function EditUser() {
    const { id } = useParams();
    const navigate = useNavigate();

    const [user, setUser] = useState<userEditI>({
        name: "",
        email: "",
        phoneNumber: "",
    });

    const { getUser } = useGetUser();
    const { editUser } = useEditUser();

    const handleChangeInput = (
        type: "name" | "email" | "phoneNumber",
        e: any
    ) => {
        setUser((prev) => {
            prev[type] = e.target.value;
            return { ...prev };
        });
    };

    const submit = (e: any) => {
        e.preventDefault();
        if (id) editUser(user, id, navigate);
    };

    useEffect(() => {
        if (id) getUser(setUser, id);
        // eslint-disable-next-line react-hooks/exhaustive-deps
    }, []);

    return (
        <Layout pageTitle={"Edit User"}>
            {!!user ? (
                <Form onSubmit={submit}>
                    <Form.Group className="mb-3" controlId="nameI">
                        <Form.Label>Name</Form.Label>
                        <Form.Control
                            type="text"
                            placeholder="Enter name"
                            value={user.name}
                            onChange={(e) => handleChangeInput("name", e)}
                        />
                    </Form.Group>

                    <Form.Group className="mb-3" controlId="emailI">
                        <Form.Label>Email address</Form.Label>
                        <Form.Control
                            type="email"
                            placeholder="Enter email"
                            value={user.email}
                            onChange={(e) => handleChangeInput("email", e)}
                        />
                    </Form.Group>

                    <Form.Group className="mb-3" controlId="phoneNumberI">
                        <Form.Label>Phone number</Form.Label>
                        <Form.Control
                            type="text"
                            placeholder="Enter phone number"
                            value={user.phoneNumber}
                            onChange={(e) =>
                                handleChangeInput("phoneNumber", e)
                            }
                        />
                    </Form.Group>

                    <Button variant="primary" type="submit">
                        Submit
                    </Button>
                </Form>
            ) : (
                <ManualSpinner />
            )}
        </Layout>
    );
}

export default EditUser;
