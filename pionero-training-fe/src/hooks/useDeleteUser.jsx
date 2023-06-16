import route from "../constant/route";

const useDeleteUser = () => {
    const deleteUser = async (id) => {
        const requestOptions = {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
                Authorization: "Bearer " + localStorage.getItem("token"),
            },
        };

        let result = await fetch(`${route.USERS}/${id}`, requestOptions)
            .then((response) => response.json())
            .then((json) => json);

        await result;
    };

    return { deleteUser };
};

export default useDeleteUser;
