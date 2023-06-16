import route from "../constant/route";

const useAddUser = () => {
    const addUser = async (value, navigate) => {
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
