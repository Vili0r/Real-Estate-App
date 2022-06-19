<?php

use Illuminate\Support\Facades\Http;

it('has data in the rent page', function () {
    Http::fake([
        'https://bayut.p.rapidapi.com/properties/list?locationExternalIDs=5002%2C6020&purpose=for-rent&hitsPerPage=1' => Http::response([
            'hits' => [
                "externalID" => 11111,
                "purpose" => "for-rent",
                "title" => "Fake For Rent Property",
                "price" => 9999,
                "rentFrequency" => "monthly",
                "area" => 111,
                "baths" => 10,
                "rooms" => 10,
                "isVerified" => true,
            ]
            ], 200),
    ]);

    $this->get(route('for-rent'))
        ->assertOk()
        ->assertSee('Properties For Rent');
});
