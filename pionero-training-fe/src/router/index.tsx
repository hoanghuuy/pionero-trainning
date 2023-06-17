import { createBrowserRouter } from "react-router-dom";
import HomePage from "../pages";
import Login from "../pages/Auth/Login";
import ErrorPage from "../pages/ErrorPage";
import AddUser from "../pages/User/AddUser";
import EditUser from "../pages/User/EditUser";
import SingleUser from "../pages/User/SingleUser";
import UserList from "../pages/User/UserList";

const router = createBrowserRouter([
    {
        path: "/",
        element: <HomePage />,
        errorElement: <ErrorPage />,
    },
    {
        path: "/login",
        element: <Login />,
    },
    {
        path: "/users",
        element: <UserList />,
    },
    {
        path: "/user/:id",
        element: <SingleUser />,
    },
    {
        path: "/user/add",
        element: <AddUser />,
    },
    {
        path: "/user/:id/edit",
        element: <EditUser />,
    },
]);

export default router;
