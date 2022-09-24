<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'post'=>$faker->paragraph,
        'user_id'=>function(){
            return factory(App\User::class)->create()->id;
        },
        'created_at' =>new DateTime(),
        'updated_at' =>new DateTime()
    ];
});
