import { useRouteError } from "react-router-dom";

export default function ErrorPage() {
  const error = useRouteError();
  console.error(error);

  return (
    <div id="error-page" className="text-center p-5">
      <h1 class="display-1">Error</h1>
      <p className="mt-4">Sorry, an unexpected error has occurred.</p>
      <p className="text-muted">
        <i>{error.statusText || error.message}</i>
      </p>
    </div>
  );
}
