import route from "../constant/route";
import { userLoginI } from "../pages/Auth/Login";

const useLogin = () => {
    const login = async (value: userLoginI, navigate: any) => {
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
