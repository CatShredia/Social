<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tag as TagModel;

use Livewire\Attributes\Rule;

class Tag extends Component
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
        $query = TagModel::withTrashed();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        $tags = $query->get();

        return view('livewire.tag', compact('tags'));
    }

    public function delete($TagId)
    {
        $Tag  = TagModel::find($TagId);

        $Tag->delete();
    }
    public function recover($TagId)
    {
        $Tag = TagModel::withTrashed()->findOrFail($TagId);

        $Tag->restore();
    }

    public function startCreating()
    {
        $this->creating = true;
    }

    public function cancelCreating()
    {
        $this->creating = false;
    }

    public function startEditing($TagId)
    {
        $this->editingId = $TagId;
    }

    public function cancelEditing()
    {
        $this->editingId = 0;
    }

    public function create()
    {
        $data = $this->validateOnly('creatingName');

        TagModel::create([
            'name' => $data['creatingName'],
        ]);

        $this->reset('creatingName');

        $this->cancelCreating();
    }
    public function save($TagId)
    {
        $data = $this->validateOnly('editingName');

        $Tag = TagModel::find($TagId);

        $Tag->update([
            'name' => $data['editingName'],
        ]);

        $this->cancelEditing();

        $this->reset('editingName');
    }
}
