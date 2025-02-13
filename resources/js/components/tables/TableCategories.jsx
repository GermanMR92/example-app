import { Link } from "@inertiajs/react";

export default function TableCategories({ categories, onDelete }) {
    return (
        <>
            <h2 className="subtitle">Categories</h2>
            <div className="mb-12 mt-3">
                <table className="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        {categories.map(category => (
                            <tr key={category.id}>
                                <td>{category.name}</td>
                                <td>{category.description}</td>
                                <td>
                                    <Link href={`/categories/edit/${category.id}`}>
                                        <i className="material-icons-outlined">edit</i>
                                    </Link>
                                    <button
                                        className="button is-primary"
                                        onClick={() => onDelete('categories', category.id)}
                                    >
                                        <i className="material-icons-outlined text-red-500">delete</i>
                                    </button>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        </>
    )
}