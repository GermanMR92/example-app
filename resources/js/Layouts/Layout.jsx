import { Link } from "@inertiajs/react";

export default function Layout({children}) {
    return (
        <>
            <header>
                <nav>
                    <Link className="nav-link" href="/">Home</Link>
                    <Link className="nav-link" href="/products/new">Create product</Link>
                    <Link className="nav-link" href="/categories/new">Create category</Link>
                    <Link className="nav-link" href="/partners/new">Create partner</Link>
                    <Link className="nav-link" href="/groups/new">Create group</Link>
                </nav>
            </header>

            <main>
                {children}
            </main>
        </>
    )

}