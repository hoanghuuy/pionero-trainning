import { useEffect, useRef } from "react";
import { Card } from "react-bootstrap";
import Layout from "../layout";

export default function HomePage() {
  const user = useRef(JSON.parse(localStorage.getItem("currentUser")));

  useEffect(() => {
    user.current = JSON.parse(localStorage.getItem("currentUser"));
  }, []);

  return (
    <Layout>
      <Card>
        <Card.Header as="h5">Dashboard</Card.Header>
        <Card.Body>
          <Card.Text>
            Welcome <b>{!!user.current && user.current.name}</b> to the website.
          </Card.Text>
          {/* <Button variant="primary">Go somewhere</Button> */}
        </Card.Body>
      </Card>
    </Layout>
  );
}
