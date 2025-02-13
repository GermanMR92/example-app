import { useForm } from "@inertiajs/react";

export default function FormGroup({ group, categories }) {
    
    const { data, setData, post, errors, processing } = useForm({
        name: group ? group.name : '',
        description: group ? group.description : '',
        categories: group ? group.categories.map(category => category.id) : [],
    });

    function submit(e) {
        e.preventDefault();
        if (group) {
            post(`/groups/update/${group.id}`);
        } else {
            post("/groups/store");
        }
    }

    return (
        <form className="flex flex-col gap-4" onSubmit={submit}>
            <div>
                <label htmlFor="name" className="block text-sm font-medium text-gray-700">Title</label>
                <input
                    id="name"
                    type="text"
                    placeholder="Enter group title"
                    value={data.name}
                    className={`w-full px-4 py-2 border rounded-lg focus:outline-none`}
                    onChange={(e) => setData('name', e.target.value)}
                />
                {errors.name && <p className="text-sm text-red-500">{errors.name}</p>}
            </div>

            {/* Categories */}
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
                <small className="text-gray-500">Select categories associated to the group</small>
            </div>

            {/* Submit Button */}
            <button
                type="submit"
                className={`w-full py-2 px-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none ${processing ? 'opacity-50' : ''}`}
                disabled={processing}
            >
                {processing ? 'Processing...' : group ? 'Update group' : 'Create group'}
            </button>
        </form>
    )
}