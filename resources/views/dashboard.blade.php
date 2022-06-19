<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($contactEmails as $contactEmail)
                @if (auth()->user()->email == $contactEmail->email)    
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <a href="{{ route('contacts.show', $contactEmail->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                See your request {{ $contactEmail->id }}
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</x-app-layout>
