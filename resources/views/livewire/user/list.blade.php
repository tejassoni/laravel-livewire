<!-- LIVEWIRE -->
<h2 class="text-center mt-20">User Lists</h2>
<button class="btn btn-sm btn-success" wire:click="addUserView">Add New</button>
<table class="table table-bordered mt-5">
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Gender</th>
            <th>Birthdate</th>
            <th width="150px">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->mobile }}</td>
                <td>{{ $user->gender }}</td>
                <td>{{ $user->birthdate }}</td>
                <td>
                    <button wire:click="editUserView({{ $user->id }})" class="btn btn-primary btn-sm">Edit</button>
                    <button wire:click="deleteUser({{ $user->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
