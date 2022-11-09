import React from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import InputError from '@/Components/InputError';
import PrimaryButton from '@/Components/PrimaryButton';

import { useForm, Head } from '@inertiajs/inertia-react';

export default function Index({ auth, permanences }) {
    const { data, setData, post, processing, reset, errors } = useForm({
        message: '',
    });

    const submit = (e) => {
        e.preventDefault();
        post(route('canteenpermanence.store'), { onSuccess: () => reset() });
    };

    return (
        <AuthenticatedLayout
            auth={auth}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Tap Kalender</h2>}
        >
            <Head title="Tapbeurten" />

            <div className="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                <div className="mt-6 bg-white shadow-sm rounded-lg divide-y">
                    {permanences.map(permanence =>
                        // <Chirp key={chirp.id} chirp={chirp} />
                        <p key={permanence.id}>{permanence.date} - {permanence.department.name} - {permanence.canteenteam.name}</p>
                        // <p>{permanence.date} - {permanence.department.name}</p>
                        // <p>{permanence.date} - </p>
                    )}
                </div>
            </div>

        </AuthenticatedLayout>
    );
}
