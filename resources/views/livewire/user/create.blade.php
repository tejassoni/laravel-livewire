<!-- LIVEWIRE -->
<div>
    <h2 class="text-center mt-20">User Create</h2>
    <form name="create">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Name" wire:model="name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter Email" wire:model="email">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="mobile">Mobile:</label>
            <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile" wire:model="mobile">
            @error('mobile')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="genderRadiobtn1" value="male"
                wire:model="gender">
            <label class="form-check-label" for="genderRadiobtn1">
                Male
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="genderRadiobtn2" value="female" wire:model="gender">
            <label class="form-check-label" for="genderRadiobtn2">
                Female
            </label>
        </div>

        <div class="form-group">
            <label for="birthdate">Birthdate:</label>
            <input type="date" class="form-control" id="birthdate" placeholder="Enter Birthdate" wire:model="birthdate" max="{{ date('Y-m-d') }}">
            @error('birthdate')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button wire:click.prevent="storeUser()" class="btn btn-success">Save</button>
        <button wire:click="backUserList()" class="btn btn-warning">Back</button>
    </form>
</div>
