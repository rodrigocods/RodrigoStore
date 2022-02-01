<?php

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Seeder;
use Symfony\Component\ErrorHandler\Error\FatalError;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->generateData();

        Country::insert($data);
    }

    private function generateData()
    {
        $data =
        [
            ["id"=>"1","name"=>"Brazil", "created_at"=>"2022-02-01 15:30:00","updated_at"=>"2022-02-01 15:30:00"],
            ["id"=>"2","name"=>"India","created_at"=>"2022-02-01 15:30:00","updated_at"=>"2022-02-01 15:30:00"],
            ["id"=>"3","name"=>"Japan","created_at"=>"2022-02-01 15:30:00","updated_at"=>"2022-02-01 15:30:00"],
            ["id"=>"4","name"=>"United States of America","created_at"=>"2022-02-01 15:30:00","updated_at"=>"2022-02-01 15:30:00"],
            ["id"=>"5","name"=>"Russia","created_at"=>"2022-02-01 15:30:00","updated_at"=>"2022-02-01 15:30:00"]
        ];

        return $data;
    }
}
