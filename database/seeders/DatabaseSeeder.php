<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\Keyword;
use App\Models\Language;
use App\Models\Loan;
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
        Book::factory(100)->create();
        Category::factory(5)->create();
        Subscriber::factory(25)->create();
        Keyword::factory(5)->create();
        Loan::factory(300)->create();
    }
}
