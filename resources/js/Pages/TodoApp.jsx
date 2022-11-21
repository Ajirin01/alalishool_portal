import React from 'react';
import GuestLayout from '@/Layouts/GuestLayout';
import { Head } from '@inertiajs/inertia-react';
import TodoList from '@/Components/TodoApp/TodoList';

export default function Dashboard(props) {
    return (
        <GuestLayout>
            {/* <Head title="Todos" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 bg-white border-b border-gray-200">You're on todo app!</div>
                    </div>
                </div>
            </div> */}

            <TodoList />
        </GuestLayout>
    );
}
