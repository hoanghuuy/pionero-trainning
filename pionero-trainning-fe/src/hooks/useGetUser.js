import { route } from "../constant";

export default function useGetUser() {
  async function getUser(setUser, id) {
    const headers = {
      Accept: "application/json",
      Authorization: `Bearer ${JSON.parse(localStorage.getItem("token"))}`,
    }; // auth header with bearer token

    let result = await fetch(`${route.USERS}/${id}`, { headers })
      .then((response) => response.json())
      .then((json) => json);

    result = await result;

    setUser(result);
  }

  return { getUser };
}
