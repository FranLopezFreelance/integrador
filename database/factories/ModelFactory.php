<?php
$faker = Faker\Factory::create('es_AR');
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
	
	$faker->addProvider(new Faker\Provider\es_AR\Address($faker));
	$faker->addProvider(new Faker\Provider\es_AR\Company($faker));
	$faker->addProvider(new Faker\Provider\es_AR\Person($faker));
	$faker->addProvider(new Faker\Provider\es_AR\PhoneNumber($faker));
	
    return [
        'name'				=> $faker->firstNameMale,
        'lastname'			=> $faker->lastName,
        'email'				=> $faker->email,
        'password'			=> bcrypt('secret'),
        'type_id'			=> $faker->numberBetween(1, 2),
        'city_id'			=> $faker->numberBetween(1, 48),
        'avatar'			=> 'images/users/default.png',
        'remember_token' 	=> str_random(10),
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    
    return [
        'user_id'           => $faker->numberBetween(1, 100),
        'name'              => $faker->swiftBicNumber,
        'section_id'        => $faker->numberBetween(1, 17),
        'brand_id'          => $faker->numberBetween(1, 25),
        'description'       => $faker->catchPhrase,
        'price'             => $faker->randomFloat($nbMaxDecimals = 2, 200, 2999),
        'image'             => 'images/products/default.jpg',
        'quantity'          => $faker->numberBetween(10, 50),
        'remember_token'    => str_random(10),
    ];
});