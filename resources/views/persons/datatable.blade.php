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
<div class="table-responsive">
    <table id="persons-table" class="table table-striped table-bordered dt-responsive nowrap no-footer collapsed" cellspacing="0" style="width:100%;">
       <thead>
           <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Nationality</th>
            <th>Residence</th>
            <th>Email</th>
            <th>Action</th>
           </tr>
       </thead>
       <tbody>

       </tbody>
        
    </table>
</div>


<center><a class="btn btn-secondary" href="/home">Back to home page</a></center>

<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#persons-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "/api/datatable",
                type: 'post'
            },
            columns: [
                {
                    data: 'Id',
                    name: 'ID'
                },
                {
                    data: 'Name',
                    name: 'Name'
                },
                {
                    data: 'Age',
                    name: 'Age'
                },
                {
                    data: 'Nationality',
                    name: 'Nationality'
                },
                {
                    data: 'Residence',
                    name: 'Residence'
                },
                {
                    data: 'Email',
                    name: 'Email'
                },
                {
                    data: 'Action',
                    name: 'Action',
                    orderable: false,
                },
             
            ]
        });

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

        $('#persons-table').on('click', '.delete', function(){
            id = $(this).attr("id");
            $.post("/persons/remove/" + id ,{"id": id} ,
                function (resp) {
                    console.log("User of ID: " + id + " is deleted");
                    $('#persons-table').DataTable().draw();
                }
            );
        })
    });
</script>

@endsection




