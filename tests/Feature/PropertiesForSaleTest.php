<?php

use Illuminate\Support\Facades\Http;

it('has data in the sale page', function () {
    Http::fake([
        'https://bayut.p.rapidapi.com/properties/list?locationExternalIDs=5002%2C6020&purpose=for-rent&hitsPerPage=1' => Http::response([
            'hits' => [
                "externalID" => 99999,
                "purpose" => "for-sale",
                "title" => "Fake For Sale Property",
                "price" => 111111,
                "area" => 444,
                "baths" => 10,
                "rooms" => 10,
                "isVerified" => true,
            ]
            ], 200),
    ]);

    $this->get(route('for-sale'))
        ->assertOk()
        ->assertSee('Properties For Sale');
});
