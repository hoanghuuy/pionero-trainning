import Layout from "../layout";

export default function ErrorPage() {
    return (
        <Layout>
            <div className="text-center mt-5">
                <h1 className="text-bold">Error</h1>
                <div className="mt-5 mb-3">
                    Sorry, an unexpected error has occurred.
                </div>
                <div className="text-muted">
                    <i>Not Found</i>
                </div>
            </div>
        </Layout>
    );
}
