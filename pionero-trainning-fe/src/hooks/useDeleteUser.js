import { route } from "../constant";

export default function useDeleteUser() {
  async function deleteUser(id) {
    const requestOptions = {
      method: "DELETE",
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
        Authorization: `Bearer ${JSON.parse(localStorage.getItem("token"))}`,
      },
    };

    let result = await fetch(`${route.USERS}/${id}`, requestOptions)
      .then((response) => response.json())
      .then((json) => json);

    await result;
  }

  return { deleteUser };
}
