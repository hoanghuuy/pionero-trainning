import { Button, Form } from "react-bootstrap";
import Layout from "../../layout";
import { useEffect, useState } from "react";
import { useNavigate, useParams } from "react-router-dom";
import useGetUser from "../../hooks/useGetUser";
import useEditUser from "../../hooks/useEditUser";
import ManualSpinner from "../../components/ManualSpinner";

function EditUser() {
    const { id } = useParams();
    const navigate = useNavigate();

    const [user, setUser] = useState();

    const { getUser } = useGetUser();
    const { editUser } = useEditUser();

    const handleChangeInput = (type, e) => {
        setUser((prev) => {
            prev[type] = e.target.value;
            return { ...prev };
        });
    };

    const submit = (e) => {
        e.preventDefault();
        editUser(user, id, navigate);
    };

    useEffect(() => {
        getUser(setUser, id);
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
            ) : <ManualSpinner />}
        </Layout>
    );
}

export default EditUser;
