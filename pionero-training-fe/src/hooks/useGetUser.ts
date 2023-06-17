import route from "../constant/route";

const useGetUser = () => {
    const getUser = async (setUser: any, id: string) => {
        const requestOptions = {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
                Authorization: "Bearer " + localStorage.getItem("token"),
            },
        };

        let result = await fetch(`${route.USERS}/${id}`, requestOptions)
            .then((response) => response.json())
            .then((json) => json);

        result = await result;

        setUser(result);
    };

    return { getUser };
};

export default useGetUser;
