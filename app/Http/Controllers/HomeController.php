<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function propertiesForRent()
    {
        $propertiesForRent = Http::withHeaders(config('services.bayut'))
                ->get('https://bayut.p.rapidapi.com/properties/list?locationExternalIDs=5002%2C6020&purpose=for-rent&hitsPerPage=6')
                ->json()['hits'];
        
        return view('home.rent', compact('propertiesForRent'));
    }

    public function propertiesForSale()
    {
        $propertiesForSale = Http::withHeaders(config('services.bayut'))
                ->get('https://bayut.p.rapidapi.com/properties/list?locationExternalIDs=5002%2C6020&purpose=for-sale&hitsPerPage=6')
                ->json()['hits'];

        return view('home.sale', compact('propertiesForSale'));
    }

    public function show($id)
    {
        $property = Http::withHeaders(config('services.bayut'))
                ->get('https://bayut.p.rapidapi.com/properties/detail?externalID='.$id)
                ->json();

        return view('home.show', compact('property'));
    }

    public function contactUs()
    {
        return view('home.contact');
    }
}
