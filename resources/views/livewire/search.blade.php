<div class="m-4 lg:m-0">
    <section class="p-12 bg-gradient-to-r from-blue-200 to-purple-500 lg:p-56">
        <h1 class="mb-2 text-center text-2xl font-bold text-gray-700 lg:text-5xl">
            Search For Your Dream Home
        </h1>

        <div class="p-8 flex min-w-fit items-center justify-center space-x-2">
            
            <select wire:model="purpose"
                class="w-full py-2 px-10 bg-white border border-gray-400 rounded outline-none focus:ring-2">
                <option>Type</option>
                <option value="for-rent">Rent</option>
                <option value="for-sale">Buy</option>
            </select>

            <x-input type="number" wire:model="rooms" value="roomsMin"
                class="w-full p-2 border border-gray-400 rounded outline-none focus:ring-2"
                placeholder="Rooms" />
        
            <select wire:model="furnished"
                class="w-full py-2 px-10 bg-white border border-gray-400 rounded outline-none focus:ring-2">
                <option>Furnish Type</option>
                <option value="furnished">Furnished</option>
                <option value="unfurnished">Unfurnished</option>
            </select>
        
            <x-input type="number" wire:model="minPrice" value="priceMin"
                class="w-full p-2 border border-gray-400 rounded outline-none focus:ring-2"
                placeholder="min" />
        
            <x-input type="number" wire:model="maxPrice" value="priceMax"
                class="w-full p-2 border border-gray-400 rounded outline-none focus:ring-2"
                placeholder="max" />
        
            <select wire:model="sortBy"
                class="w-full py-2 px-10 bg-white border border-gray-400 rounded outline-none focus:ring-2">
                <option>Sort</option>
                <option value="price-asc">Ascending</option>
                <option value="price-desc">Descending</option>
            </select>
        
            <select wire:model="rentFrequency"
                class="w-full py-2 px-10 bg-white border border-gray-400 rounded outline-none focus:ring-2">
                <option>Rent Frequency</option>
                <option value="monthly">Monthly</option>
                <option value="yearly">Yearly</option>
            </select>        
        </div>
    </section>
       
    <section class="px-4 py-4 bg-white lg:px-32 lg:py-20">
        <div class="">
            <h1 class="text-2xl font-bold text-center text-blue-600 lg:text-4xl">Search Results</h1>
            <div class="flex justify-center">
                <div class="w-40 h-1 bg-indigo-400 rounded"></div>
            </div>
        </div>

        @if (count($searchResults) > 0)
            <div class="mt-4 space-y-2 lg:gap-4 lg:flex lg:items-center lg:flex-wrap lg:mt-20">
                @foreach ($searchResults as $result) 
                    <div class="p-4 bg-slate-100 rounded-lg">
                        <a href="{{ route('property.show', $result['externalID']) }}">
                            <img src="{{ $result['coverPhoto']['url'] }}" class="w-full h-60 object-cover" alt="result">
                        </a>

                        <div class="p-6">
                            <a href="{{ route('property.show', $result['externalID']) }}">
                                <h4 class="text-2xl font-bold cursor-pointer">{{ Str::words($result['title'], 5, '...') }}</h4>
                            </a>
                                <!-- <div>
                                2 beds &bull; 2 baths
                            </div> -->
                            <div class="mt-2">
                                <span class="text-xl font-extrabold text-blue-600">${{ $result['price'] }}</span> 
                                @if ($result['purpose'] == 'for-rent') /{{ $result['rentFrequency'] }} @endif
                            </div>
                            <div class="flex justify-between mt-2">
                            <div class="flex items-center">
                                <x-phosphor-squares-four-light class="w-6 h-6" /> {{ round($result['area']) }} sqft
                                </div> 
                                
                                @if($result['isVerified'])
                                    <x-antdesign-safety-certificate-o class="w-6 h-6" />
                                @else 
                                    Not certified 
                                @endif
                                
                            </div>
                        </div>
                        <div class="flex justify-between p-4 text-gray-700 border-t border-gray-300">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 mr-3 text-gray-600 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M0 16L3 5V1a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v4l3 11v5a1 1 0 0 1-1 1v2h-1v-2H2v2H1v-2a1 1 0 0 1-1-1v-5zM19 5h1V1H4v4h1V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1h2V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1zm0 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1V6h-2v2a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V6H3.76L1.04 16h21.92L20.24 6H19zM1 17v4h22v-4H1zM6 4v4h4V4H6zm8 0v4h4V4h-4z">
                                    </path>
                                </svg>
                                <p><span class="font-bold text-gray-900">{{ $result['rooms'] }}</span> Bedrooms</p>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 mr-3 text-gray-600 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M17.03 21H7.97a4 4 0 0 1-1.3-.22l-1.22 2.44-.9-.44 1.22-2.44a4 4 0 0 1-1.38-1.55L.5 11h7.56a4 4 0 0 1 1.78.42l2.32 1.16a4 4 0 0 0 1.78.42h9.56l-2.9 5.79a4 4 0 0 1-1.37 1.55l1.22 2.44-.9.44-1.22-2.44a4 4 0 0 1-1.3.22zM21 11h2.5a.5.5 0 1 1 0 1h-9.06a4.5 4.5 0 0 1-2-.48l-2.32-1.15A3.5 3.5 0 0 0 8.56 10H.5a.5.5 0 0 1 0-1h8.06c.7 0 1.38.16 2 .48l2.32 1.15a3.5 3.5 0 0 0 1.56.37H20V2a1 1 0 0 0-1.74-.67c.64.97.53 2.29-.32 3.14l-.35.36-3.54-3.54.35-.35a2.5 2.5 0 0 1 3.15-.32A2 2 0 0 1 21 2v9zm-5.48-9.65l2 2a1.5 1.5 0 0 0-2-2zm-10.23 17A3 3 0 0 0 7.97 20h9.06a3 3 0 0 0 2.68-1.66L21.88 14h-7.94a5 5 0 0 1-2.23-.53L9.4 12.32A3 3 0 0 0 8.06 12H2.12l3.17 6.34z">
                                    </path>
                                </svg>
                                <p><span class="font-bold text-gray-900">{{ $result['baths'] }}</span> Bathrooms</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="px-3 py-3">
                No result were found
            </div>
        @endif
    </section>
</div>