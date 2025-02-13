import FormCategory from "@/components/FormCategory";
 
export default function Create() {
    
    return (
        <>
            <h1 className="text-3xl font-semibold text-center my-8">New Category</h1>

            <div className="w-full max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
                <FormCategory />
            </div>
        </>
    );
}

