<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Subscriber;
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
        Book::factory(10)->create();
        Subscriber::factory(10)->create();
    }
}
