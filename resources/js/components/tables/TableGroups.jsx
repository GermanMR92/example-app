import { Link } from "@inertiajs/react";

export default function TableGroups({ groups, onDelete }) {
    return (
        <>
            <h2 className="subtitle">Groups</h2>
            <div className="mb-12 mt-3">
                <small className="flex justify-end text-gray-600">Click on the download icon to view the JSON of products associated with the category group.</small>
                <table className="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        {groups.map(group => (
                            <tr key={group.id}>
                                <td>{group.name}</td>
                                <td>
                                    <Link href={`/groups/edit/${group.id}`}>
                                        <i className="material-icons-outlined">edit</i>
                                    </Link>
                                    <button
                                        className="button is-primary"
                                        onClick={() => onDelete('groups', group.id)}
                                    >
                                        <i className="material-icons-outlined text-red-500">delete</i>
                                    </button>
                                    <a href={`/groups/${group.id}/products`} target="_blank">
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