<?php

namespace App\Http\Livewire\User;

use App\Models\User as ModelsUser;
use Livewire\Component;

# LIVEWIRE
class User extends Component
{
    public $users, $user_id, $name, $gender, $date, $mobile, $email, $birthdate;
    public $isUpdated = false, $isCreated = false, $isListed = true;

    /**
     * User listing initilize
     */
    public function render()
    {
        $this->users = ModelsUser::all();
        return view('livewire.user.index');
    }

    /**
     * User create view calls
     */
    public function addUserView()
    {
        $this->isUpdated = false;
        $this->isCreated = true;
        $this->isListed = false;
        return view('livewire.user.create');
    }

    /**
     * The attributes are reseted.
     */
    private function resetInputFields()
    {
        $this->name = '';
        $this->gender = '';
        $this->date = '';
        $this->mobile = '';
        $this->email = '';
        $this->birthdate = '';
    }

    /**
     * User Create Store in database
     */
    public function storeUser()
    {
        $validated = $this->validate([
            'name' => ['required', 'regex:/^[a-zA-Z\s]+$/', 'max:100'],
            'email' => ['required', 'email', 'unique:users,email'],
            'mobile' => 'required|numeric|digits:10',
            'gender'  => 'required',
            'birthdate'  => 'required',
        ]);

        ModelsUser::create($validated);
        session()->flash('success', 'User Created Successfully.');
        $this->resetInputFields();
    }

    /**
     * User edit view calls
     */
    public function editUserView($id)
    {
        $user = ModelsUser::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->mobile = $user->mobile;
        $this->gender = $user->gender;
        $this->birthdate = $user->birthdate;

        // livewire model
        $this->isUpdated = true;
        $this->isCreated = false;
        $this->isListed = false;
    }

    /**
     * User Update Store in database
     */
    public function updateUser()
    {
        $validated = $this->validate([
            'name' => ['required', 'regex:/^[a-zA-Z\s]+$/', 'max:100'],
            'email' => ['required', 'email', "unique:users,email,$this->user_id"],
            'mobile' => 'required|numeric|digits:10',
            'gender'  => 'required',
            'birthdate'  => 'required',
        ]);

        $user = ModelsUser::find($this->user_id);
        $user->update($validated);
        session()->flash('success', 'User Updated Successfully.');
        $this->resetInputFields();
        $this->backUserList();
    }

    /**
     * User list view calls
     */
    public function backUserList()
    {
        $this->isUpdated = false;
        $this->isCreated = false;
        $this->isListed = true;
    }

     /**
     * User delete
     */
    public function deleteUser($id)
    {
        ModelsUser::find($id)->delete();
        session()->flash('success', 'User Deleted Successfully.');
        $this->backUserList();
    }
}

