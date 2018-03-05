<?php

$factory->define(App\Comment::class, function ($faker) use ($factory) {
	return [
		'username' => $faker->word,
		'text' => $faker->sentence($nbWords = 6, $variableNbWords = true),
		'post_id' => $factory->create('App\Post')->id,
	];
});