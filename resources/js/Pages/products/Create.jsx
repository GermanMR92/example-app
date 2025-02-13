import FormProduct from "@/components/FormProduct";
 
export default function Create({ product, categories }) {
    
    return (
        <>
            <h1 className="text-3xl font-semibold text-center my-8">New Product</h1>

            <div className="w-full max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
                <FormProduct 
                    product={product} 
                    categories={categories} 
                />
            </div>
        </>
    );
}
