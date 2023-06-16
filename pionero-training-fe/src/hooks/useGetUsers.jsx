import route from "../constant/route";

const useGetUsers = () => {
    const getUsers = async (setUsers) => {
        const requestOptions = {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
                Authorization: "Bearer " + localStorage.getItem("token"),
            },
        };

        let result = await fetch(route.USERS, requestOptions)
            .then((response) => response.json())
            .then((json) => json);

        result = await result;

        setUsers(result);
    };

    return { getUsers };
};

export default useGetUsers;
