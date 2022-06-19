<x-guest-layout>
    <section class="p-8 text-center bg-gradient-to-r from-blue-200 to-purple-500 lg:p-20">
        <h1 class="mb-2 text-2xl font-bold text-gray-700 lg:text-5xl">

        </h1>
        <div class="text-white">
            <span class="text-blue-800">Home - </span> Contact Us
        </div>
    </section>

    <!-- Contact Us -->
    <section class="px-4 py-4 bg-gray-200 lg:px-20 lg:py-20">
        <div class="flex items-center justify-center bg-gray-200">
            <div class="w-full px-6 py-16 bg-white rounded-lg shadow-2xl lg:w-2/5">
                <h2 class="mb-4 text-xl antialiased font-semibold text-center text-gray-800">Send Us a Message
                </h2>
                <form action="{{ route('contact-us.post') }}" class="mx-8 space-y-8" method="POST">
                    @csrf
                    <div class="flex justify-between">
                        <input type="text" name="first_name" id="first_name" :value="old('first_name')"
                            class="w-1/2 p-2 text-sm border-b-2 border-gray-400 outline-none opacity-50 focus:border-blue-400"
                            placeholder="First Name" 
                        />
                        @error('first_name')
                            <span class="text-xs text-red-600">
                                {{ $message }}
                            </span>
                        @enderror

                        <input type="text" name="last_name" id="last_name" :value="old('last_name')"
                            class="w-1/2 p-2 text-sm border-b-2 border-gray-400 outline-none opacity-50 focus:border-blue-400"
                            placeholder="Last Name" 
                        />
                        @error('last_name')
                            <span class="text-xs text-red-600">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>
                    <div>
                        <input type="text" name="email" id="email" :value="old('email')"
                            class="w-full p-2 text-sm border-b-2 border-gray-400 outline-none opacity-50 focus:border-blue-400"
                            placeholder="Your Email" 
                        />
                        @error('email')
                            <span class="text-xs text-red-600">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div>
                        <input type="text" name="subject" id="subject" :value="old('subject')"
                            class="w-full p-2 text-sm border-b-2 border-gray-400 outline-none opacity-50 focus:border-blue-400"
                            placeholder="Subject" 
                        />
                        @error('subject')
                            <span class="text-xs text-red-600">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div>
                        <textarea name="message" id="message" :value="old('message')"
                            class="w-full p-6 text-sm border-b-2 border-gray-400 rounded-lg outline-none opacity-50 focus:border-blue-400"
                            placeholder="Enter your message">
                        </textarea>
                        @error('message')
                            <span class="text-xs text-red-600">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="block w-full px-2 py-4 mt-2 text-white bg-black rounded-full">Send
                        Form</button>
                </form>
            </div>
        </div>
    </section>

</x-guest-layout>