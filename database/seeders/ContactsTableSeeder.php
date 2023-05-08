<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;
use Faker\Factory as Faker;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $faker = Faker::create('ja_JP');
    \App\Models\Contact::factory(11)->create([
    'postcode' => $faker->numerify('8###')
    ]);
    // contact::factory()->count(15)->create();
    }
}
