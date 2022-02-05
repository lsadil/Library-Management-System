<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;

class SearchBar extends Component
{
    public $query;
    public $books;

    public function mount()
    {
        $this->books = [];
        $this->query = '';
    }

    public function updatedQuery()
    {
        $this->books = Book::where('title', 'like', '%' . $this->query . '%')
            ->get();

    }

    public function render()
    {
        return view('livewire.search-bar');
    }
}
