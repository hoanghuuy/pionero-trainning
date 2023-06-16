import { Form, useNavigate, useParams } from "react-router-dom";
import Layout from "../../layout";
import { Button, FormControl, FormGroup, FormLabel } from "react-bootstrap";
import { useEffect, useState } from "react";
import useGetUser from "../../hooks/useGetUser";
import useEditUser from "../../hooks/useEditUser";

const EditUser = () => {
  const { id } = useParams();
  const navigate = useNavigate();

  const [user, setUser] = useState();

  const { getUser } = useGetUser();
  const { editUser } = useEditUser();

  const changeInputValue = (type, e) => {
    if (type === "name") {
      setUser((prev) => ({
        ...prev,
        name: e.target.value,
      }));
    }

    if (type === "email") {
      setUser((prev) => ({
        ...prev,
        email: e.target.value,
      }));
    }

    if (type === "phoneNumber") {
      setUser((prev) => ({
        ...prev,
        phoneNumber: e.target.value,
      }));
    }
  };

  const submitEdit = () => {
    editUser(user, id, navigate);
  };

  useEffect(() => {
    getUser(setUser, id);
    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, []);

  return (
    <Layout>
      <h1>Edit User</h1>

      {user && (
        <Form className="mt-5" onSubmit={submitEdit}>
          <FormGroup className="mb-3" controlId="NameInput">
            <FormLabel>Name</FormLabel>
            <FormControl
              type="text"
              placeholder="Enter name here..."
              value={user.name}
              onChange={(e) => changeInputValue("name", e)}
            />
          </FormGroup>

          <FormGroup className="mb-3" controlId="EmailInput">
            <FormLabel>Email address</FormLabel>
            <FormControl
              type="email"
              placeholder="Enter email here..."
              value={user.email}
              onChange={(e) => changeInputValue("email", e)}
            />
          </FormGroup>

          <FormGroup className="mb-3" controlId="phoneInput">
            <FormLabel>Phone Number</FormLabel>
            <FormControl
              type="text"
              placeholder="Enter phone number here..."
              value={user.phoneNumber}
              onChange={(e) => changeInputValue("phoneNumber", e)}
            />
          </FormGroup>

          <Button type="submit">Edit</Button>
        </Form>
      )}
    </Layout>
  );
};

export default EditUser;
