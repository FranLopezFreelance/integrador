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
        'password'			=> bcrypt(str_random(10)),
        'type_id'			=> $faker->numberBetween(1, 2),
        'city_id'			=> $faker->numberBetween(1, 23),
        'avatar'			=> 'images/users/default.png',
        'remember_token' 	=> str_random(10),
    ];
});

$factory->define(App\City::class, function (Faker\Generator $faker) {
	
	$faker->addProvider(new Faker\Provider\es_AR\Address($faker));

    return [

        'name'     			=> $faker->state,
  ];
    
});