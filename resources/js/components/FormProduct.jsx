import { useForm } from "@inertiajs/react";

export default function FormProduct({ product, categories }) {

    // Todo: valorar guardar imagen real en vez de URL

    const { data, setData, post, errors, processing } = useForm({
        name: product ? product.name : '',
        description: product ? product.description : '',
        price: product ? product.price : 0,
        stock: product ? product.stock : 0,
        image_url: '',
        categories: product ? product.categories.map(category => category.id) : [],
        cta_url: product ? product.cta_url : '',
    });

    function submit(e) {
        e.preventDefault();
        if (product) {
            post(`/products/update/${product.id}`);
        } else {
            post("/products/store");
        }
    }

    return (
        <form className="flex flex-col gap-4" onSubmit={submit}>
            {/* Name */}
            <div>
                <label htmlFor="name" className="block text-sm font-medium text-gray-700">Title</label>
                <input
                    id="name"
                    type="text"
                    placeholder="Enter product title"
                    value={data.name}
                    className={`w-full px-4 py-2 border rounded-lg focus:outline-none ${errors.name ? 'border-red-500' : 'border-gray-300'}`}
                    onChange={(e) => setData('name', e.target.value)}
                />
                {errors.name && <p className="text-sm text-red-500">{errors.name}</p>}
            </div>

            {/* Description */}
            <div>
                <label htmlFor="description" className="block text-sm font-medium text-gray-700">Description</label>
                <textarea
                    id="description"
                    placeholder="Enter product description"
                    value={data.description}
                    className={`w-full px-4 py-2 border rounded-lg focus:outline-none ${errors.description ? 'border-red-500' : 'border-gray-300'}`}
                    onChange={(e) => setData('description', e.target.value)}
                />
                {errors.description && <p className="text-sm text-red-500">{errors.description}</p>}
            </div>

            {/* Price */}
            <div>
                <label htmlFor="price" className="block text-sm font-medium text-gray-700">Price</label>
                <input
                    id="price"
                    type="number"
                    placeholder="Enter product price"
                    value={data.price}
                    className={`w-full px-4 py-2 border rounded-lg focus:outline-none ${errors.price ? 'border-red-500' : 'border-gray-300'}`}
                    onChange={(e) => setData('price', e.target.value)}
                />
                {errors.price && <p className="text-sm text-red-500">{errors.price}</p>}
            </div>

            {/* Stock */}
            <div>
                <label htmlFor="stock" className="block text-sm font-medium text-gray-700">Stock</label>
                <input
                    id="stock"
                    type="number"
                    placeholder="Enter stock quantity"
                    value={data.stock}
                    className={`w-full px-4 py-2 border rounded-lg focus:outline-none ${errors.stock ? 'border-red-500' : 'border-gray-300'}`}
                    onChange={(e) => setData('stock', e.target.value)}
                />
                {errors.stock && <p className="text-sm text-red-500">{errors.stock}</p>}
            </div>

            {/* Image URL */}
            {/* <div>
                <label htmlFor="image_url" className="block text-sm font-medium text-gray-700">Image URL</label>
                <input
                    id="image_url"
                    type="text"
                    placeholder="Enter image URL"
                    value={data.image_url}
                    className={`w-full px-4 py-2 border rounded-lg focus:outline-none ${errors.image_url ? 'border-red-500' : 'border-gray-300'}`}
                    onChange={(e) => setData('image_url', e.target.value)}
                />
                {errors.image_url && <p className="text-sm text-red-500">{errors.image_url}</p>}
            </div> */}

            {/* Image */}
            <div>
                <label htmlFor="image_url" className="block text-sm font-medium text-gray-700">Image URL</label>
                <input
                    id="image_url"
                    type="file"
                    accept="image/png, image/jpeg, image/jpg"
                    className={`w-full px-4 py-2 border rounded-lg focus:outline-none ${errors.image_url ? 'border-red-500' : 'border-gray-300'}`}
                    onChange={(e) => setData('image_url', e.target.files[0])}
                />
                {errors.image_url && <p className="text-sm text-red-500">{errors.image_url}</p>}
            </div>

            {/* Categories (multiple select) */}
            <div>
                <label htmlFor="categories" className="block text-sm font-medium text-gray-700">Categories</label>
                <select
                    multiple
                    id="categories"
                    value={data.categories}
                    className={`w-full px-4 py-2 border rounded-lg focus:outline-none ${errors.categories ? 'border-red-500' : 'border-gray-300'}`}
                    onChange={(e) => setData('categories', Array.from(e.target.selectedOptions, option => option.value))}
                >
                    {categories.map((category) => (
                        <option key={category.id} value={category.id}>
                            {category.name}
                        </option>
                    ))}
                </select>
                {errors.categories && <p className="text-sm text-red-500">{errors.categories}</p>}
            </div>

            {/* CTA URL */}
            <div>
                <label htmlFor="cta_url" className="block text-sm font-medium text-gray-700">CTA URL</label>
                <input
                    id="cta_url"
                    type="text"
                    placeholder="Enter CTA URL"
                    value={data.cta_url}
                    className={`w-full px-4 py-2 border rounded-lg focus:outline-none ${errors.cta_url ? 'border-red-500' : 'border-gray-300'}`}
                    onChange={(e) => setData('cta_url', e.target.value)}
                />
                {errors.cta_url && <p className="text-sm text-red-500">{errors.cta_url}</p>}
            </div>

            {/* Submit Button */}
            <button
                type="submit"
                className={`w-full py-2 px-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none ${processing ? 'opacity-50' : ''}`}
                disabled={processing}
            >
                {processing ? 'Processing...' : product ? 'Update product' : 'Create product'}
            </button>
        </form>
    )
}