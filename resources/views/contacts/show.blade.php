<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Message from ') }} {{ $contact->first_name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full px-6 py-16 bg-white rounded-lg shadow-2xl lg:w-2/5">
                <div>
                    <x-label for="message" :value="__('Message from')" />{{ $contact->email }}
                    <textarea name="message" id="message" :value="old('message')"
                        class="w-full p-6 text-sm border-b-2 border-gray-400 rounded-lg outline-none opacity-50 focus:border-blue-400"
                        placeholder="Enter your message"> {{ $contact->message }}
                    </textarea>                                       
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
