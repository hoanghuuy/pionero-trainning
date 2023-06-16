import { useState } from "react";
import { Button, FormControl, FormGroup, FormLabel } from "react-bootstrap";
import { Form, useNavigate } from "react-router-dom";
import Layout from "../layout";
import { route } from "../constant";

export default function Login() {
  const navigate = useNavigate();

  const [formInputs, setFormInput] = useState({
    email: "",
    password: "",
  });

  const changeInputValue = (type, e) => {
    if (type === "email") {
      setFormInput((prev) => ({
        ...prev,
        email: e.target.value,
      }));
    }

    if (type === "password") {
      setFormInput((prev) => ({
        ...prev,
        password: e.target.value,
      }));
    }
  };

  async function login(value) {
    const requestOptions = {
      method: "POST",
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
      },
      body: JSON.stringify(value),
    };

    let result = await fetch(route.LOGIN, requestOptions)
      .then((response) => response.json())
      .then((json) => json);

    result = await result;

    if (result.access_token) {
      localStorage.setItem("token", JSON.stringify(result.access_token));
      localStorage.setItem("currentUser", JSON.stringify(result.user));

      navigate("/");
    } else navigate("/login");
  }

  const loginSubmit = () => {
    login(formInputs);
  };

  return (
    <Layout>
      <div id="login-page" className="mt-5">
        <h1>Login</h1>

        <Form className="mt-5" onSubmit={loginSubmit}>
          <FormGroup className="mb-3" controlId="EmailInput">
            <FormLabel>Email address</FormLabel>
            <FormControl
              type="email"
              placeholder="name@example.com"
              value={formInputs.email}
              onChange={(e) => changeInputValue("email", e)}
            />
          </FormGroup>

          <FormGroup className="mb-3" controlId="PasswordInput">
            <FormLabel>Password</FormLabel>
            <FormControl
              type="password"
              placeholder="Enter your password"
              value={formInputs.password}
              onChange={(e) => changeInputValue("password", e)}
            />
          </FormGroup>

          <Button type="submit">Login</Button>
        </Form>
      </div>
    </Layout>
  );
}
