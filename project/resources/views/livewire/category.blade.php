<div>
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Search categories..."
            wire:model.live.debounce.300ms="search">
    </div>
    <table class="table table-hover text-nowrap">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Deleted_at</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Actions</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>0</td>
                <td>
                    @if($creating)
                        <form wire:submit="save">
                            <input type="text" class="form-control" wire:model="creatingName">
                            <button type="submit" class="btn btn-primary mt-2" wire:click="create">Save</button>
                            <button type="button" class="btn btn-secondary mt-2" wire:click="cancelCreating">Cancel</button>
                        </form>
                    @else
                        {{-- Placeholder for the name when not creating --}}
                    @endif
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    @if(!$creating)
                        <button style="background-color: rgb(38, 154, 32); color: white;" class="btn"
                            wire:click="startCreating">Create</button>
                    @endif
                </td>
            </tr>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>
                        @if($editingId === $category->id)
                            <form wire:submit="save({{ $category->id }})">
                                <input type="text" class="form-control" wire:model="editingName">
                                <button type="submit" class="btn btn-primary mt-2">Update</button>
                                <button type="button" class="btn btn-secondary mt-2" wire:click="cancelEditing">Cancel</button>
                            </form>
                        @else
                            {{ $category->name }}
                        @endif
                    </td>
                    <td>
                        @if ($category->deleted_at === null)
                            Not deleted
                        @else
                            {{ $category->deleted_at }}
                        @endif
                    </td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ $category->updated_at }}</td>
                    <td>
                        @if ($category->deleted_at === null)
                            <button class="btn btn-danger" wire:click="delete({{ $category->id }})">Delete</button>
                        @else
                            <button class="btn btn-success" wire:click="recover({{ $category->id }})">Recover</button>
                        @endif
                    </td>
                    <td>
                        @if($editingId !== $category->id)
                            <button class="btn btn-success" wire:click="startEditing    ({{ $category->id }})">Edit</button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
