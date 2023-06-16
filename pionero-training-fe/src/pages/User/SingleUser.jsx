import { Col, Row } from "react-bootstrap";
import Layout from "../../layout";
import { useParams } from "react-router-dom";
import { useEffect, useState } from "react";
import useGetUser from "../../hooks/useGetUser";
import ManualSpinner from "../../components/ManualSpinner";

function SingleUser() {
    const { id } = useParams();

    const [user, setUser] = useState();

    const { getUser } = useGetUser();

    useEffect(() => {
        getUser(setUser, id);
        // eslint-disable-next-line react-hooks/exhaustive-deps
    }, []);

    return (
        <Layout pageTitle={"Single User"}>
            {!!user ? (
                <Row>
                    <Col sm={6} md={3}>
                        <h2>Name :</h2>
                        <div>Email :</div>
                        <div>Phone Number :</div>
                    </Col>

                    <Col>
                        <div className="h2">{user.name}</div>
                        <div>{user.email}</div>
                        <div>{user.phoneNumber}</div>
                    </Col>
                </Row>
            ) : (
                <ManualSpinner />
            )}
        </Layout>
    );
}

export default SingleUser;
