import { useForm } from "@inertiajs/react";

export default function FormProduct({ category, categories }) {

    const { data, setData, post, errors, processing } = useForm({
        name: category ? category.name : '',
        description: category ? category.description : '',
    });

    function submit(e) {
        e.preventDefault();
        if (category) {
            post(`/categories/update/${category.id}`);
        } else {
            post("/categories/store");
        }
    }

    return (
        <form className="flex flex-col gap-4" onSubmit={submit}>
            <div>
                <label htmlFor="name" className="block text-sm font-medium text-gray-700">Title</label>
                <input
                    id="name"
                    type="text"
                    placeholder="Enter category title"
                    value={data.name}
                    className={`w-full px-4 py-2 border rounded-lg focus:outline-none`}
                    onChange={(e) => setData('name', e.target.value)}
                />
                {errors.name && <p className="text-sm text-red-500">{errors.name}</p>}
            </div>

            <div>
                <label htmlFor="description" className="block text-sm font-medium text-gray-700">Description</label>
                <textarea
                    id="description"
                    placeholder="Enter category description"
                    value={data.description}
                    className={`w-full px-4 py-2 border rounded-lg focus:outline-none ${errors.description ? 'border-red-500' : 'border-gray-300'}`}
                    onChange={(e) => setData('description', e.target.value)}
                />
                {errors.description && <p className="text-sm text-red-500">{errors.description}</p>}
            </div>

            {/* Submit Button */}
            <button
                type="submit"
                className={`w-full py-2 px-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none ${processing ? 'opacity-50' : ''}`}
                disabled={processing}
            >
                {processing ? 'Processing...' : category ? 'Update category' : 'Create category'}
            </button>
        </form>
    )
}