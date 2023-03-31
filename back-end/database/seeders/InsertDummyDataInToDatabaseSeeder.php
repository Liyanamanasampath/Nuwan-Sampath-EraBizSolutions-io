<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class InsertDummyDataInToDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            ['country_id' => 1, 'name' => 'United States', 'created_at' => now(), 'updated_at' => now()],
            ['country_id' => 2, 'name' => 'Canada', 'created_at' => now(), 'updated_at' => now()],
            ['country_id' => 3, 'name' => 'Mexico', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('states')->insert([
            ['state_id' => 1, 'name' => 'California', 'country_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['state_id' => 2, 'name' => 'Texas', 'country_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['state_id' => 3, 'name' => 'Ontario', 'country_id' => 2, 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('specialties')->insert([
            ['specialty_id' => 1, 'name' => 'Cardiology', 'created_at' => now(), 'updated_at' => now()],
            ['specialty_id' => 2, 'name' => 'Neurology', 'created_at' => now(), 'updated_at' => now()],
            ['specialty_id' => 3, 'name' => 'Dermatology', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('hospitals')->insert([
            ['hospital_id' => 1, 'name' => 'Mount Sinai Hospital', 'created_at' => now(), 'updated_at' => now()],
            ['hospital_id' => 2, 'name' => 'Johns Hopkins Hospital', 'created_at' => now(), 'updated_at' => now()],
            ['hospital_id' => 3, 'name' => 'Mayo Clinic', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('doctors')->insert([
            ['doctors_id' => 1, 'name' => 'John Smith', 'country_id' => 1, 'state_id' => 1, 'specialty_id' => 1, 'hospital_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['doctors_id' => 2, 'name' => 'Jane Doe', 'country_id' => 2, 'state_id' => 3, 'specialty_id' => 2, 'hospital_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['doctors_id' => 3, 'name' => 'Bob Johnson', 'country_id' => 1, 'state_id' => 2, 'specialty_id' => 3, 'hospital_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            // Add more doctors as needed
        ]);
    }
}
