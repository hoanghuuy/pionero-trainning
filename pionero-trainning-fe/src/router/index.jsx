import { createBrowserRouter } from "react-router-dom";
import HomePage from "../pages";
import Login from "../pages/login";
import ErrorPage from "../pages/error";
import Users from "../pages/User/Users";
import SingleUser from "../pages/User/SingleUser";
import AddUser from "../pages/User/AddUser";
import EditUser from "../pages/User/EditUser";

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
    element: <Users />,
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