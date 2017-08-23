<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 3)->create()->each(function (App\User $user) {
            $limit = random_int(20, 50);
            for($i=1; $i<=$limit; ++$i) {
                $user->posts()->save(factory(App\Post::class)->make());
            }
        });
    }
}
