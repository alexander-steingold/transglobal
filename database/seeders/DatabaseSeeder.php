<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Customer;
use App\Models\Country;
use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Alexander Steingold',
            'email' => 'alex@gmail.com',
        ]);

        User::factory(10)->create();
        $users = User::all();

        $this->call([
            CountrySeeder::class,
        ]);
        $countries = Country::all();
        for ($i = 0; $i < 10; $i++) {
            Customer::factory()->create([
                // 'user_id' => $users->pop()->id,
                'country_id' => 109//$countries->random()->id
            ]);
        }
//        $companies = Customer::all();
//        for ($i = 0; $i < 100; $i++) {
//            $item = Item::factory()->create([
//                'company_id' => $companies->random()->id
//            ]);
//            foreach (range(1, fake()->numberBetween(5, 10)) as $index) {
//                Image::factory()->create([
//                    'item_id' => $item->id
//                ]);
//            }
        // }


//        foreach ($users as $user) {
//            $jobs = Job::inRandomOrder()->take(rand(0, 4))->get();
//            foreach ($jobs as $job) {
//                JobApplication::factory()->create([
//                    'job_id' => $job->id,
//                    'user_id' => $user->id
//                ]);
//            }
//
//        }
    }
}
