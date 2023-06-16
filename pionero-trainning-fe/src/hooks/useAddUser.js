import { route } from "../constant";

export default function useAddUser() {
  async function addUser(value, navigate) {
    const requestOptions = {
      method: "POST",
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
        Authorization: `Bearer ${JSON.parse(localStorage.getItem("token"))}`,
      },
      body: JSON.stringify(value),
    };

    let result = await fetch(route.USERS, requestOptions)
      .then((response) => response.json())
      .then((json) => json);

    await result;
    navigate("/users");
  }

  return { addUser };
}
