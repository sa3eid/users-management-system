
<div class="mx-3 my-2 wrapper edit-person">
    <h1 class="text-primary">Edit Person data</h1>
    <form method="POST" action="/persons/edit/save" autocomplete="off">
        @csrf
        <input type="text" name="id" value={{$person[0]->Id ?? ''}} hidden>
        <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="Name" class="form-control" id="name" value="{{$person[0]->Name ?? '' }}"  placeholder="Enter your name">
        </div>
        @error('Name')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <div class="form-group">
        <label for="nationality">Nationality</label>
        <input type="text" name="Nationality" class="form-control" id="nationality" value="{{$person[0]->Nationality ?? '' }}" placeholder="Enter your nationality">
        </div>
        @error('Nationality')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div class="form-group">
        <label for="residence">Residence</label>
        <input type="text" name="Residence" class="form-control" id="residence" value="{{$person[0]->Residence ?? '' }}" placeholder="Enter your residence">
        </div>
        @error('Residence')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control"  name="Email" id="exampleInputEmail1" value="{{$person[0]->Email ?? '' }}" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        @error('Email')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div class="form-group">
        <label for="age">Age</label>
        <input type="text" name="Age" class="form-control" id="age" value="{{$person[0]->Age ?? '' }}" placeholder="Enter your age">
        </div>
        @error('Age')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror            
        <div class="modal-footer d-flex justify-content-start">
            <button type="submit" class="btn btn-success">Save edit</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </form>
</div>
