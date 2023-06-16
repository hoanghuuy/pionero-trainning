import { route } from "../constant";

export default function useGetUsers() {
  async function getUsers(setUsers) {
    const headers = {
      Accept: "application/json",
      Authorization: `Bearer ${JSON.parse(localStorage.getItem("token"))}`,
    }; // auth header with bearer token

    let result = await fetch(route.USERS, { headers })
      .then((response) => response.json())
      .then((json) => json);

    result = await result;

    setUsers(result);
  }

  return { getUsers };
}
