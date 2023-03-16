<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // Make the admin first to have id 1
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password')
        ]);
        //  Make an employee
        \App\Models\User::factory()->create([
            'name' => 'employee',
            'email' => 'employee@gmail.com',
            'password' => Hash::make('password')
        ]);

        // Make a 3rd user
        \App\Models\User::create([
            'id' => 3,
            'name' => 'employee2',
            'email' => 'employee2@gmail.com',
            'email_verified_at' => '2023-03-15 11:23:57',
            'password' => '$2y$10$c0CRe.MzVKLnqGz7MlOmYODVO1vyndTvu94bYUOOM8h5ddEk2P31G',
            'remember_token' => 'uqyb2ABjR7tMoEQ9FdNrEUIIrJ3iF1XXj1ExkWOPxJcOrjs8dm1iSSGOreSw',
            'created_at' => '2023-03-15 11:23:57',
            'updated_at' => '2023-03-15 11:23:57'
        ]);

        // Expenses Seeder
        \App\Models\Expense::create([
            'id' => 1,
            'user_id' => 2,
            'date' => '2002-04-20',
            'category' => 'Nisi rem voluptate o',
            'title' => 'Modi natus in aut cu',
            'description' => 'Aut culpa delectus',
            'cost' => 77.00,
            'path' => NULL,
            'created_at' => '2023-03-13 18:07:06',
            'updated_at' => '2023-03-13 18:07:06'
        ]);

        \App\Models\Expense::create([
            'id' => 2,
            'user_id' => 2,
            'date' => '1998-04-25',
            'category' => 'Ex ex minima perfere',
            'title' => 'Incididunt sed in mo',
            'description' => 'Doloribus cillum nat',
            'cost' => 90.00,
            'path' => NULL,
            'created_at' => '2023-03-13 18:12:05',
            'updated_at' => '2023-03-13 18:12:05'
        ]);

        \App\Models\Expense::create([
            'id' => 3,
            'user_id' => 2,
            'date' => '1995-10-17',
            'category' => 'Dolore eos omnis qu',
            'title' => 'Suscipit itaque et d',
            'description' => 'Voluptas dolorem eu',
            'cost' => 58.00,
            'path' => NULL,
            'created_at' => '2023-03-13 18:25:15',
            'updated_at' => '2023-03-13 18:25:15'
        ]);

        \App\Models\Expense::create([
            'id' => 4,
            'user_id' => 2,
            'date' => '2023-03-03',
            'category' => 'cate',
            'title' => 'Just a very huge title and title of this title',
            'description' => NULL,
            'cost' => 902112.21,
            'path' => NULL,
            'created_at' => '2023-03-14 17:21:48',
            'updated_at' => '2023-03-15 12:04:05'
        ]);

        \App\Models\Expense::create([
            'id' => 5,
            'user_id' => 2,
            'date' => '2023-03-14',
            'category' => 'cat',
            'title' => 'title',
            'description' => NULL,
            'cost' => 90.00,
            'path' => NULL,
            'created_at' => '2023-03-14 18:09:20',
            'updated_at' => '2023-03-15 11:25:10'
        ]);

        \App\Models\Expense::create([
            'id' => 6,
            'user_id' => 2,
            'date' => '2023-03-14',
            'category' => 'cat',
            'title' => 'title',
            'description' => 'desc',
            'cost' => 90.00,
            'path' => NULL,
            'created_at' => '2023-03-14 18:09:20',
            'updated_at' => '2023-03-14 18:09:20'
        ]);

        \App\Models\Expense::create([
            'id' => 7,
            'user_id' => 3,
            'date' => '2023-03-14',
            'category' => 'three',
            'title' => 'title3',
            'description' => 'desc',
            'cost' => 90.00,
            'path' => NULL,
            'created_at' => '2023-03-14 18:09:20',
            'updated_at' => '2023-03-14 18:09:20'
        ]);
    }
}
