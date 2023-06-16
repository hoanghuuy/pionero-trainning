import { useEffect, useRef } from "react";
import { Container, Navbar } from "react-bootstrap";
import { Link } from "react-router-dom";
import "./style.css";

export default function Header() {
  const user = useRef(JSON.parse(localStorage.getItem("currentUser")));

  useEffect(() => {
    user.current = JSON.parse(localStorage.getItem("currentUser"));
  }, []);

  return (
    <header id="header">
      <Navbar bg="dark" variant="dark">
        <Container>
          <Link to={"/"}>
            <Navbar.Brand>Pionero training</Navbar.Brand>
          </Link>

          <Navbar.Collapse className="justify-content-end">
            <Navbar.Text>
              {user.current ? (
                <>
                  Signed in as:{" "}
                  <span className="text-white">{user.current.name}</span>
                </>
              ) : (
                <Link to={"/login"}>
                  <span className="text-white">Login</span>
                </Link>
              )}
            </Navbar.Text>
          </Navbar.Collapse>
        </Container>
      </Navbar>
    </header>
  );
}
