<?php

use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Country::class, 50)->create()->each(function ($country)
        {
            $country->state()->saveMany(factory(App\Models\State::class, 20)->make()->each(function ($state)
            {
                $state->city()->saveMany(factory(App\Models\City::class, 20)->make());
            }));
        });
    }
}
