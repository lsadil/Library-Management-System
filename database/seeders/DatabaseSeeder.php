<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\Language;
use App\Models\Loan;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Book::factory(1000)->create();
        Category::factory(5)->create();
        Subscriber::factory(100)->create();
        Loan::factory(500)->create();
        User::create([
            'name' => 'admin',
            'email' => 'adilowalido@gmail.com',
            'password' => 'Masteradilo123'
        ]);
    }
}
