import FormGroup from "@/components/FormGroup";
 
export default function Create({ categories }) {
    
    return (
        <>
            <h1 className="text-3xl font-semibold text-center my-8">New Category group</h1>

            <div className="w-full max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
                <FormGroup
                    categories={categories}
                />
            </div>
        </>
    );
}

