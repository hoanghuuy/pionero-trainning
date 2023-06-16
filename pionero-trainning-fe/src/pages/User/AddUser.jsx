import { Button, FormControl, FormGroup, FormLabel } from "react-bootstrap";
import Layout from "../../layout";
import { useState } from "react";
import { Form, useNavigate } from "react-router-dom";
import useAddUser from "../../hooks/useAddUser";

const AddUser = () => {
  const navigate = useNavigate();

  const { addUser } = useAddUser();

  const [user, setUser] = useState({
    name: "",
    email: "",
    password: "",
  });

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

    if (type === "password") {
      setUser((prev) => ({
        ...prev,
        password: e.target.value,
      }));
    }
  };

  const submitAdd = () => {
    addUser(user, navigate);
  };

  return (
    <Layout>
      <h1>Add User</h1>

      <Form className="mt-5" onSubmit={submitAdd}>
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

        <FormGroup className="mb-3" controlId="passwordInput">
          <FormLabel>Phone Number</FormLabel>
          <FormControl
            type="password"
            placeholder="Enter password here..."
            value={user.password}
            onChange={(e) => changeInputValue("password", e)}
          />
        </FormGroup>

        <Button type="submit">Add</Button>
      </Form>
    </Layout>
  );
};

export default AddUser;
