{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

{{-- @extends ('layouts.layout') --}}
@extends('Layouts.app')

@section('content')
<div class="container">
    <div class="flex-center position-ref full-height">   
        <div class="content">
            <center>
                <img src="{{ asset('img/software.png') }}" alt="developer" width="320">
                <div class="title m-b-md">
                    <h2 style="color: steelblue;">User Management System - Home Page</h2>
                </div>
            </center>
            
            {{-- <center>   
                <h4><a href="/persons">>>check registered users<<</a></h4>
            </center> --}}
            
        </div>
    </div>
</div>
@endsection



