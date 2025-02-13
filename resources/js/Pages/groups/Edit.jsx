import FormGroup from "@/components/FormGroup";

export default function Edit({ group, categories }) {

    return (
        <>
            <h1 className="text-3xl font-semibold text-center my-8">Edit group</h1>

            <div className="w-full max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
                <FormGroup
                    group={group}
                    categories={categories}
                />
            </div>
        </>
    );
}