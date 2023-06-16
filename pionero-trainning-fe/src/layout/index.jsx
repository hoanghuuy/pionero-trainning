import { Container } from "react-bootstrap";
import Header from "./header";

function Layout({ children }) {
  return (
    <div id="layout">
      <Header />

      <main className="mt-5">
        <Container>{children}</Container>
      </main>
    </div>
  );
}

export default Layout;
