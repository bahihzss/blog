<?php

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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(5, true),
        'body' => bodyFaker($faker),
    ];
});

/**
 * Return the markdown text for post body.
 *
 * @param \Faker\Generator $faker
 * @return string
 */
function bodyFaker(Faker\Generator $faker) {
    $nb = random_int(3, 4);
    $headers = $faker->sentences($nb);

    $paragraphs = array_map(function($header) use ($faker) {
        $nbSentences = random_int(4, 10);
        return '### '.$header."\n".$faker->paragraph($nbSentences);
    }, $headers);
    return implode("\n\n", $paragraphs);
}