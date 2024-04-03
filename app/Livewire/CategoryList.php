<?php

namespace App\Livewire;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Component;

class CategoryList extends Component
{
    #[Computed]
    public function categories()
    {
        return DB::table('categories')
            ->select('categories.name', 'categories.id', DB::raw('COUNT(category_post.id) as category_count'))
            ->join('category_post', 'categories.id', '=', 'category_post.category_id')
            ->groupBy('categories.name', 'categories.id')
            ->orderBy('category_count', 'desc')
            ->take(6)
            ->get();
    }

    public function render()
    {
        return view('livewire.category-list');
    }
}
