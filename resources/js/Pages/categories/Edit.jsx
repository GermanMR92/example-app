import FormCategory from "@/components/FormCategory";

export default function Edit({ category }) {

    return (
        <>
            <h1 className="text-3xl font-semibold text-center my-8">Edit category</h1>

            <div className="w-full max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
                <FormCategory
                    category={category}
                />
            </div>

        </>
    )
}