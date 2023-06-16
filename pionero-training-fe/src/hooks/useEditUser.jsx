import route from "../constant/route";

const useEditUser = () => {
    const editUser = async (value, id, navigate) => {
        const requestOptions = {
            method: "PUT",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
                Authorization: "Bearer " + localStorage.getItem("token"),
            },
            body: JSON.stringify(value),
        };

        let result = await fetch(`${route.USERS}/${id}`, requestOptions)
            .then((response) => response.json())
            .then((json) => json);

        await result;

        navigate("/users");
    };

    return { editUser };
};

export default useEditUser;
