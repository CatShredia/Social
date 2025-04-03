<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category as CategoryModel;

use Livewire\Attributes\Rule;

class Category extends Component
{
    // for search
    public $search = '';

    // for new creating
    public $creating = false;

    // for editing existed
    public $editingId = 0;

    #[Rule('required')]
    public $creatingName = '';

    #[Rule('required')]
    public $editingName = '';

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

    public function startCreating()
    {
        $this->creating = true;
    }

    public function cancelCreating()
    {
        $this->creating = false;
    }

    public function startEditing($categoryId)
    {
        $this->editingId = $categoryId;
    }

    public function cancelEditing()
    {
        $this->editingId = 0;
    }

    public function create()
    {
        $data = $this->validateOnly('creatingName');

        CategoryModel::create([
            'name' => $data['creatingName'],
        ]);

        $this->reset('creatingName');

        $this->cancelCreating();
    }
    public function save($categoryId)
    {
        $data = $this->validateOnly('editingName');

        $category = CategoryModel::find($categoryId);

        $category->update([
            'name' => $data['editingName'],
        ]);

        $this->cancelEditing();

        $this->reset('editingName');
    }
}
