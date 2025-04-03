<div>
    <table class="table table-hover text-nowrap">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Deleted_at</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
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
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
