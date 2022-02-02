<?php

use App\Models\City;
use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->generateData();

        City::insert($data);
    }

    private function generateData()
    {
        $data =
        [
            ["id"=>"1","name"=>"Tarauacá","state_id"=>"1","created_at"=>"2022-02-02 15:30:00","updated_at"=>"2022-02-02 15:30:00"],
            ["id"=>"2","name"=>"Rio Branco","state_id"=>"1","created_at"=>"2022-02-02 15:30:00","updated_at"=>"2022-02-02 15:30:00"],
            ["id"=>"3","name"=>"Palmas","state_id"=>"2","created_at"=>"2022-02-02 15:30:00","updated_at"=>"2022-02-02 15:30:00"],
            ["id"=>"4","name"=>"Araguaína","state_id"=>"2","created_at"=>"2022-02-02 15:30:00","updated_at"=>"2022-02-02 15:30:00"],
            ["id"=>"5","name"=>"Patna","state_id"=>"3","created_at"=>"2022-02-02 15:30:00","updated_at"=>"2022-02-02 15:30:00"],
            ["id"=>"6","name"=>"Purnia","state_id"=>"3","created_at"=>"2022-02-02 15:30:00","updated_at"=>"2022-02-02 15:30:00"],
            ["id"=>"7","name"=>"Moga","state_id"=>"4","created_at"=>"2022-02-02 15:30:00","updated_at"=>"2022-02-02 15:30:00"],
            ["id"=>"8","name"=>"Abohar","state_id"=>"4","created_at"=>"2022-02-02 15:30:00","updated_at"=>"2022-02-02 15:30:00"],
        ];

        return $data;
    }
}
