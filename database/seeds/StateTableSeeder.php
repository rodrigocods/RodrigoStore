<?php

use App\Models\State;
use Illuminate\Database\Seeder;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->generateData();

        State::insert($data);
    }

    private function generateData()
    {
        $data =
        [
            ["id"=>"1","name"=>"Acre","country_id"=>"1","created_at"=>"2022-02-02 15:30:00","updated_at"=>"2022-02-02 15:30:00"],
            ["id"=>"2","name"=>"Tocantins","country_id"=>"1","created_at"=>"2022-02-02 15:30:00","updated_at"=>"2022-02-02 15:30:00"],
            ["id"=>"3","name"=>"Bihar","country_id"=>"2","created_at"=>"2022-02-01 15:30:00","updated_at"=>"2022-02-01 15:30:00"],
            ["id"=>"4","name"=>"Punjab","country_id"=>"2","created_at"=>"2022-02-01 15:30:00","updated_at"=>"2022-02-01 15:30:00"],
        ];

        return $data;
    }
}
