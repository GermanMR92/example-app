import { Link } from "@inertiajs/react";

export default function TablePartners({ partners, onDelete }) {
    return (
        <>
            <h2 className="subtitle">Partners</h2>
            <div className="mb-12 mt-3">
                <small className="flex justify-end text-gray-600">Click on the download icon to view the JSON of products associated with the partner.</small>
                <table className="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        {partners.map(partner => (
                            <tr key={partner.id}>
                                <td>{partner.name}</td>
                                <td>{partner.email}</td>
                                <td>
                                    <Link href={`/partners/edit/${partner.id}`}>
                                        <i className="material-icons-outlined">edit</i>
                                    </Link>
                                    <button
                                        className="button is-primary"
                                        onClick={() => onDelete('partners', partner.id)}
                                    >
                                        <i className="material-icons-outlined text-red-500">delete</i>
                                    </button>
                                    <a href={`/partners/${partner.id}/products`} target="_blank">
                                        <i className="material-icons-outlined">sim_card_download</i>
                                    </a>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        </>
    )
}