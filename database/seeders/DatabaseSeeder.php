<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\Language;
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
        Category::factory(5);
        Subscriber::factory(10)->create();
    }
}
