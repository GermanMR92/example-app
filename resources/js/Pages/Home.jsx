import { useForm, usePage, Link } from "@inertiajs/react";
import TableCategories from "@/components/tables/tableCategories";
import TableProductos from "@/components/tables/TableProducts";
import TablePartners from "@/components/tables/TablePartners";
import TableGroups from "@/components/tables/TableGroups";

export default function Home({ products, categories, partners, groups }) {

    // flash are global, we can configurate it in the HandleInertiaRequests middleware
    const { flash } = usePage().props;
    const { delete: destroy } = useForm();

    function onDelete(url, id) {
        if(window.confirm('Are you sure you want to delete this record?')) {
            destroy(`/${url}/destroy/${id}`);
        }
    }
    
    return (
        <div>
            <h1 className="title">Hello to Super Store App!</h1>

            {/* Show actions messages */}
            {flash.message &&
                <div className="absolute top-24 right-6 bg-rose-500 p-2 rounded-md shadow-lg text-sm text-white">
                    {flash.message}
                </div>
            }
            {flash.success &&
                <div className="absolute top-24 right-6 bg-green-600 p-2 rounded-md shadow-lg text-sm text-white">
                    {flash.success}
                </div>
            }

            <TableProductos products={products} onDelete={onDelete} />
            <TableCategories categories={categories} onDelete={onDelete} />
            <TableGroups groups={groups} onDelete={onDelete} />
            <TablePartners partners={partners} onDelete={onDelete} />
            
        </div>
    );
}