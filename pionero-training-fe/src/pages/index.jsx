import { Button, Card } from "react-bootstrap";
import Layout from "../layout";
import { Link } from "react-router-dom";

export default function HomePage() {
    return (
        <Layout pageTitle={"Home Page"}>
            <Card>
                <Card.Header>Dashboard</Card.Header>
                <Card.Body>
                    <Card.Text>
                        Welcome <b>Huy</b> to the website
                    </Card.Text>
                    <Link to={"/users"}>
                        <Button variant="primary">Go to Users page</Button>
                    </Link>
                </Card.Body>
            </Card>
        </Layout>
    );
}
