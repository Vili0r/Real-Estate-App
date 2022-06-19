<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Messages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                First Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Surname
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Subject
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Created at
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Delete</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($contacts as $contact)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    <a href="{{ route('contacts.show', $contact) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        {{ $contact->first_name }}
                                    </a>
                                </th>
                                <td class="px-6 py-4">
                                    {{ $contact->last_name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $contact->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $contact->subject }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $contact->created_at }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <form method="POST" action="{{ route('contacts.destroy', $contact) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            There are no messages to respond
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>