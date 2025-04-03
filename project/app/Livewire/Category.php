<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category as CategoryModel;

class Category extends Component
{
    public $search = '';

    public function render()
    {
        $query = CategoryModel::withTrashed();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        $categories = $query->get();

        return view('livewire.category', compact('categories'));
    }

    public function delete($categoryId)
    {
        $category  = CategoryModel::find($categoryId);

        $category->delete();
    }
    public function recover($categoryId)
    {
        $category = CategoryModel::withTrashed()->findOrFail($categoryId);

        $category->restore();
    }
}
