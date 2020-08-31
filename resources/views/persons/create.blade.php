@extends('layouts.layout')

@section('content')

<div class="mx-3 my-2 wrapper create-person">
    <h1 class="text-primary">Create a new Person</h1>
    <form id="create-form" method="" action="" autocomplete="off">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="Name" class="form-control" id="name" placeholder="Enter your name">
        </div>
        {{-- @error('Name')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror --}}
            
        <div class="form-group">
            <label>Nationality</label>
            {{-- <input type="text" name="Nationality" class="form-control" id="nationality" placeholder="Enter your nationality"> --}}
            {{-- <select class="w-100 form-control" id="nationality_id" name="nationality">
               @foreach ($Nationalities as $key => $Nationality)
                    <option value="{{$key}}">{{$Nationality}}</option>
               @endforeach
            </select> --}}
            <select class="w-100 form-control" id="nationality_id" name="nationality">
            </select>
        </div>
        {{-- @error('Nationality')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror --}}
        <div class="form-group">
            <label for="residence">Residence</label>
            <input type="text" name="Residence" class="form-control" id="residence" placeholder="Enter your residence">
        </div>
        {{-- @error('Residence')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror --}}
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="Email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        {{-- @error('Email')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror --}}
        <div class="form-group">
            <label for="age">Age</label>
            <input type="text" name="Age" class="form-control" id="age" placeholder="Enter your age">
        </div>
        {{-- @error('Age')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror --}}
        <div class="form-group">
            <label for="birth">Birthdate</label>
            <input type="text" name="Birthdate" class="date form-control" id="birth" placeholder="Enter your birthdate">
        </div>
        {{-- @error('Birthdate')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror --}}
        
        <button type="submit" id="create-form-submit" class="btn btn-success">Submit</button>
    </form>
</div>
<footer>
    <center><a class="btn btn-secondary" href="/home">Back to home page</a></center>
</footer>

<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('#nationality_id').select2({
    
    placeholder: "Select and Search",
    ajax: {
        url: '/api/nationality',
        type: 'POST',
        dataType: 'json',
        delay: 250,
        //sending data to serverside
        data: function(params) {
            return {
                searchTerm: params.term,
            };
        },
        //receiving data from serverside
        processResults: function(response) {
            // Transforms the top-level key of the response object from 'items' to 'results'
            return {
                results: response,
            };
        },
        cache: true,
    }
});



$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[id='create-form']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      Name: "required",
      nationality: "required",
      Age: "required",
      Birthdate: "required",
      Email: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },
    //   password: {
    //     required: true,
    //     minlength: 5
    //   }
    Residence: "required",

    },
    // Specify validation error messages
    messages: {
      Name: "Please enter your name",
      Age: "Please enter your age",
      Residence: "Please enter your residence",
      nationality: "Please enter your nationality",
      Birthdate: "Please enter your birthdate",
    //   password: {
    //     required: "Please provide a password",
    //     minlength: "Your password must be at least 5 characters long"
    //   },
      Email: "Please enter a valid email address"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
        $('#create-form').submit(function(e){
        // e.preventDefault();
        // console.log("form submitted");
        $.ajax({
            type: "post",
            url: "/persons/store",
            data: {
                "name" : $('#name').val(),
                "residence" : $('#residence').val(),
                "email" : $('#exampleInputEmail1').val(),
                "age" : $('#age').val(),
                "birthdate" : $('#birth').val(),
                "nationality" : $('#nationality_id').select2('data')[0]['text'],
            },
            success: function (response) {
                console.log("user created");
                window.location.replace("/persons/datatable");
            }
        });
    })
        }
    });
});

// $('#create-form-submit').click(function(e){
    
// });
// $('#nationality_id').select2({
//     placeholder: 'Select and Search',
// });


$('.date').datepicker({  
    format: 'yyyy-mm-dd'
});


</script>


@endsection

