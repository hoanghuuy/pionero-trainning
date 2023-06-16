import { Link } from "react-router-dom";
import "./style.css";
import { useState } from "react";
import { Button, Modal } from "react-bootstrap";
import useDeleteUser from "../../../hooks/useDeleteUser";

export default function UserAction({ id, setRenderUserList }) {
    const [show, setShow] = useState(false);

    const { deleteUser } = useDeleteUser();

    const handleClose = () => setShow(false);
    const handleShow = () => setShow(true);

    const handleDeleteUser = () => {
        setShow(false);
        deleteUser(id);
        setRenderUserList(id);
    };

    return (
        <>
            <td id="user-action" className="d-flex justify-content-around">
                <Link to={`/user/${id}/edit`}>Edit</Link>

                <span
                    className="text-primary text-decoration-underline"
                    onClick={handleShow}
                >
                    Delete
                </span>
            </td>

            <Modal show={show} onHide={handleClose}>
                <Modal.Header closeButton>
                    <Modal.Title>Confirm</Modal.Title>
                </Modal.Header>
                <Modal.Body>
                    Are you sure you want to delete this user?
                </Modal.Body>
                <Modal.Footer>
                    <Button variant="secondary" onClick={handleClose}>
                        Close
                    </Button>
                    <Button variant="danger" onClick={handleDeleteUser}>
                        Delete
                    </Button>
                </Modal.Footer>
            </Modal>
        </>
    );
}
