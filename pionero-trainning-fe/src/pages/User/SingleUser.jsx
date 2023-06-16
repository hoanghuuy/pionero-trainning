import { useEffect, useState } from "react";
import { Col, Row } from "react-bootstrap";
import { useParams } from "react-router-dom";
import useGetUser from "../../hooks/useGetUser";
import Layout from "../../layout";

const SingleUser = () => {
  const { id } = useParams();

  const [user, setUser] = useState();

  const { getUser } = useGetUser();

  useEffect(() => {
    getUser(setUser, id);
    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, []);

  return (
    <Layout>
      <h1>Single User</h1>
      <Row className="single-user-infor mt-5">
        <Col sm={3} xs={6}>
          <div className="h2">Name:</div>
          <div>Email:</div>
          <div>Phone number:</div>
        </Col>

        {user && (
          <Col>
            <h2>{user.name}</h2>
            <div>{user.email}</div>
            <div>{user.phoneNumber}</div>
          </Col>
        )}
      </Row>
    </Layout>
  );
};

export default SingleUser;
