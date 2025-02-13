import { useForm } from "@inertiajs/react";

export default function FormPartner({ partner, categories }) {

    const { data, setData, post, errors, processing } = useForm({
        name: partner ? partner.name : '',
        email: partner ? partner.email : '',
        categories: partner ? partner.categories.map(category => category.id) : [],
    });

    function submit(e) {
        e.preventDefault();
        if (partner) {
            post(`/partners/update/${partner.id}`);
        } else {
            post("/partners/store");
        }
    }

    return (
        <form className="flex flex-col gap-4" onSubmit={submit}>
            {/* name */}
            <div>
                <label htmlFor="name" className="block text-sm font-medium text-gray-700">Name</label>
                <input
                    id="name"
                    type="text"
                    placeholder="Enter partner name"
                    value={data.name}
                    className={`w-full px-4 py-2 border rounded-lg focus:outline-none`}
                    onChange={(e) => setData('name', e.target.value)}
                />
                {errors.name && <p className="text-sm text-red-500">{errors.name}</p>}
            </div>

            {/* email */}
            <div>
                <label htmlFor="email" className="block text-sm font-medium text-gray-700">Email</label>
                <input
                    id="email"
                    type="text"
                    placeholder="Enter partner email"
                    value={data.email}
                    className={`w-full px-4 py-2 border rounded-lg focus:outline-none`}
                    onChange={(e) => setData('email', e.target.value)}
                />
                {errors.email && <p className="text-sm text-red-500">{errors.email}</p>}
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
                <small className="text-gray-500">Select categories associated to the partner</small>
            </div>

            {/* Submit Button */}
            <button
                type="submit"
                className={`w-full py-2 px-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none ${processing ? 'opacity-50' : ''}`}
                disabled={processing}
            >
                {processing ? 'Processing...' : partner ? 'Update partner' : 'Create partner'}
            </button>
        </form>
    )
}