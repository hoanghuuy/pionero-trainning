/* eslint-disable jsx-a11y/anchor-is-valid */
import { useEffect, useState } from "react";
import { Table } from "react-bootstrap";
import { Link } from "react-router-dom";
import useDeleteUser from "../../hooks/useDeleteUser";
import useGetUsers from "../../hooks/useGetUsers";
import Layout from "../../layout";

const Users = () => {
  const [users, setUsers] = useState([]);

  const [deletedUserId, setDeletedUserId] = useState(0);

  const { getUsers } = useGetUsers();
  const { deleteUser } = useDeleteUser();

  const handleDeleteUser = (id) => {
    deleteUser(id);
    setDeletedUserId(id);
  };

  useEffect(() => {
    getUsers(setUsers);

    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, [deletedUserId]);

  return (
    <Layout>
      <div id="users-page">
        <h1>User List</h1>
        <Table striped bordered hover>
          {users && !!users.length && (
            <>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone number</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                {users.map((user, index) => (
                  <tr key={user.id}>
                    <td>{index + 1}</td>
                    <td>
                      <Link to={`/user/${user.id}`}>{user.name}</Link>
                    </td>
                    <td>{user.email}</td>
                    <td>{user.phoneNumber}</td>
                    <td>
                      <div className="d-inline-block me-3">
                        <Link to={`/user/${user.id}/edit`}>Edit</Link>
                      </div>

                      <span
                        className="text-primary"
                        style={{
                          textDecoration: "underline",
                          cursor: "pointer",
                        }}
                        onClick={() => handleDeleteUser(user.id)}
                      >
                        Delete
                      </span>
                    </td>
                  </tr>
                ))}
              </tbody>
            </>
          )}
        </Table>
      </div>
    </Layout>
  );
};

export default Users;
