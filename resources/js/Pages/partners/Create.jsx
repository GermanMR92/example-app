import FormPartner from '@/components/FormPartner';
 
export default function Create({ categories }) {
    
    return (
        <>
            <h1 className="text-3xl font-semibold text-center my-8">New Partner</h1>

            <div className="w-full max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
                <FormPartner
                    categories={categories}
                />
            </div>
        </>
    );
}

