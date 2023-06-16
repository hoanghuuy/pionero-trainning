import route from "../constant/route";

const useLogin = () => {
    const login = async (value, navigate) => {
        const requestOptions = {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(value),
        };

        let result = await fetch(route.LOGIN, requestOptions)
            .then((response) => response.json())
            .then((json) => json);

        result = await result;

        if (result) {
            localStorage.setItem("token", result.access_token);
            localStorage.setItem("me", JSON.stringify(result.user));
        }

        navigate("/");
    };

    return { login };
};

export default useLogin;
