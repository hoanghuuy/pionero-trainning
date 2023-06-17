import route from "../constant/route";
import { UserAddI } from "../pages/User/AddUser";

const useAddUser = () => {
    const addUser = async (value: UserAddI, navigate: any) => {
        const requestOptions = {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
                Authorization: "Bearer " + localStorage.getItem("token"),
            },
            body: JSON.stringify(value),
        };

        let result = await fetch(route.USERS, requestOptions)
            .then((response) => response.json())
            .then((json) => json);

        await result;

        navigate("/users");
    };

    return { addUser };
};

export default useAddUser;
