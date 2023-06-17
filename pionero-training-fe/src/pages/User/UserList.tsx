import { useEffect, useState } from "react";
import { Table } from "react-bootstrap";
import { Link } from "react-router-dom";
import ManualSpinner from "../../components/ManualSpinner";
import useGetUsers from "../../hooks/useGetUsers";
import Layout from "../../layout";
import { User } from "../../layout/header";
import UserAction from "./action/UserAction";

function UserList() {
    const [users, setUsers] = useState<User[]>([]);
    const [renderUserList, setRenderUserList] = useState<number>(0);

    const { getUsers } = useGetUsers();

    useEffect(() => {
        getUsers(setUsers);
        // eslint-disable-next-line react-hooks/exhaustive-deps
    }, [renderUserList]);

    return (
        <Layout
            pageTitle={"User List"}
            sideAction={{ name: "Add User", url: "/user/add" }}
        >
            {!!users && !!users.length ? (
                <Table striped bordered hover>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th className="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {users.map((user, index) => (
                            <tr key={user.id}>
                                <td>{index + 1}</td>
                                <td>
                                    <Link to={`/user/${user.id}`}>
                                        {user.name}
                                    </Link>
                                </td>
                                <td>{user.email}</td>
                                <td>{user.phoneNumber}</td>
                                <UserAction
                                    id={user.id}
                                    setRenderUserList={setRenderUserList}
                                />
                            </tr>
                        ))}
                    </tbody>
                </Table>
            ) : (
                <ManualSpinner />
            )}
        </Layout>
    );
}

export default UserList;
