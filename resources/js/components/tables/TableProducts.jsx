import { Link } from "@inertiajs/react";

export default function TableProductos({ products, onDelete }) {
    return (
        <>
            <h2 className="subtitle">Products</h2>
            <div className="mb-12 mt-3">
                <table className="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {products.map(product => (
                            <tr key={product.id}>
                                <td>
                                    {product.image_url ? (
                                        <img src={product.image_url} alt={product.name} className="w-10 h-10 object-cover" />
                                    ) : (
                                        <span>No img</span>
                                    )}
                                </td>
                                <td>{product.name}</td>
                                <td>{product.description}</td>
                                <td>{product.price}€</td>
                                <td>{product.stock}ud</td>
                                <td>
                                    <Link href={`/products/edit/${product.id}`}>
                                        <i className="material-icons-outlined">edit</i>
                                    </Link>
                                    <button
                                        className="button is-primary"
                                        onClick={() => onDelete('products', product.id)}
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