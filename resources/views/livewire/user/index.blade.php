<div class="container">  
    @section('title','User Module')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif  
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if($isUpdated)
        @include('livewire.user.update')
    @endif
    @if($isCreated)        
        @include('livewire.user.create')
    @endif      
    @if($isListed)  
        @include('livewire.user.list')  
    @endif
</div>

