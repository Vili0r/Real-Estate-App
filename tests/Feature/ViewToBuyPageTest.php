<?php

it('has home page', function () {
    $this->get(route('home'))
        ->assertOk();
});

it('has the routes in the home page', function () {
    $this->get('/')
        ->assertSee('Find Your Dream Home')
        ->assertSee('View Properties To Rent')
        ->assertSee('Buy Now');
});
