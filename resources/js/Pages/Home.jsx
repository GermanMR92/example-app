import { useState } from "react";
import { router } from "@inertiajs/react";
import { useForm, usePage, Link } from "@inertiajs/react";

export default function Home({ products, categories, partners, groups }) {

    // flash are global, we can configurate it in the HandleInertiaRequests middleware
    const { flash } = usePage().props;
    const { delete: destroy } = useForm();

    function onDelete(url, id) {
        if(window.confirm('Are you sure you want to delete this record?')) {
            destroy(`/${url}/destroy/${id}`);
        }
    }
    
    return (
        <div>
            <h1 className="title">Hello to Super Store App!</h1>

            {/* Show actions messages */}
            {flash.message &&
                <div className="absolute top-24 right-6 bg-rose-500 p-2 rounded-md shadow-lg text-sm text-white">
                    {flash.message}
                </div>
            }
            {flash.success &&
                <div className="absolute top-24 right-6 bg-green-600 p-2 rounded-md shadow-lg text-sm text-white">
                    {flash.success}
                </div>
            }

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

            <h2 className="subtitle">Partners</h2>
            <div className="mb-12 mt-3">
                <table className="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        {partners.map(partner => (
                            <tr key={partner.id}>
                                <td>{partner.name}</td>
                                <td>{partner.email}</td>
                                <td>
                                    <Link href={`/partners/edit/${partner.id}`}>
                                        <i className="material-icons-outlined">edit</i>
                                    </Link>
                                    <button
                                        className="button is-primary"
                                        onClick={() => onDelete('partners', partner.id)}
                                    >
                                        <i className="material-icons-outlined text-red-500">delete</i>
                                    </button>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>

            <h2 className="subtitle">Groups</h2>
            <div className="mb-12 mt-3">
                <table className="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        {groups.map(group => (
                            <tr key={group.id}>
                                <td>{group.name}</td>
                                <td>
                                    <Link href={`/groups/edit/${group.id}`}>
                                        <i className="material-icons-outlined">edit</i>
                                    </Link>
                                    <button
                                        className="button is-primary"
                                        onClick={() => onDelete('groups', group.id)}
                                    >
                                        <i className="material-icons-outlined text-red-500">delete</i>
                                    </button>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        </div>
    );
}