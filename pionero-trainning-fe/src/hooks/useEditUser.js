import { route } from "../constant";

export default function useEditUser() {
  async function editUser(value, id, navigate) {
    const requestOptions = {
      method: "PUT",
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
        Authorization: `Bearer ${JSON.parse(localStorage.getItem("token"))}`,
      },
      body: JSON.stringify(value),
    };

    let result = await fetch(`${route.USERS}/${id}`, requestOptions)
      .then((response) => response.json())
      .then((json) => json);

    await result;
    navigate("/users");
  }

  return { editUser };
}
