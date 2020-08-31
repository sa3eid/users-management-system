@extends('layouts.layout')

@section('content')
<p class="text-success">{{session('msg')}}</p>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Person's Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

        </div>
        </div>
    </div>
</div>

<h3 class="my-1 mx-1 text-info">Persons table</h3>
<table id="persons-table" class="table table-striped table-bordered table-dark">

    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Nationality</th>
        <th>Residence</th>
        <th>Email</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    
@foreach ($data as $d) 
    <tr>
        {{-- <td>{{$d['name']}}</td>
        <td>{{$d['age']}}</td>
        <td>{{$d['nationality']}}</td> --}}
        <td>{{$d->Id}}</td>
        <td>{{$d->Name}}</td>
        <td>{{$d->Age}}</td>
        <td>{{$d->Nationality}}</td>
        <td>{{$d->Residence}}</td>
        <td>{{$d->Email}}</td>
    <td><button id="{{$d->Id}}" class="btn btn-warning edit" data-toggle="modal" data-target="#exampleModal">Edit</button></td>
        <td>
            <form action="/persons/{{$d->Id}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
@endforeach

</table>


@isset($name)
@isset($age)
    <h4>Ordered by {{$name}} whose age {{$age}}</h4>
@endisset
@endisset

<h4><center><a href="/">>>return back to homepage<<</a></center></h4>

<script>
    $(document).ready(function(){
        $('#persons-table').on('click', '.edit', function(){
            id = $(this).attr("id");
            // console.log(id);
            $.get("/persons/edit/" + id ,{"id": id} ,
                function (resp) {
                    // console.log(data);
                    $('#exampleModal .modal-body').html(resp);
                    $('#exampleModal').modal('show');
                }
            );
        });
    });
</script>

@endsection




