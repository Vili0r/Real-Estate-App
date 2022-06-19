<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Search extends Component
{
    public $purpose = 'for-rent';
    public $minPrice = '0';
    public $maxPrice = '1000000';
    public $rooms = '0';
    public $furnished = 'furnished';
    public $sortBy = 'price-asc';
    public $rentFrequency = 'monthly';
    public $locationExtrnalIDs = '5002';
    public $categoryExternalID = '4';

    public function render()
    {
        $searchResults = [];

        $searchResults = Http::withHeaders(config('services.bayut'))
            ->get('https://bayut.p.rapidapi.com/properties/list?locationExternalIDs=' .$this->locationExtrnalIDs 
                .'&purpose=' .$this->purpose .'&categoryExternalID=' .$this->categoryExternalID 
                .'&roomsMin=' .$this->rooms .'&priceMin=' .$this->minPrice .'&priceMax=' .$this->maxPrice 
                .'&rentFrequency=' .$this->rentFrequency .'$sort=' .$this->sortBy .'&furnishingStatus=' .$this->furnished)
            ->json()['hits'];

        return view('livewire.search', [
            'searchResults' => collect($searchResults)->take(12)
        ])
            ->layout('layouts.guest');
    }
}
