@extends('header')
@section('main')

<div class="container mt-5">
    <div class="row">
        <h5><i class="bi bi-pencil-square"></i>User Details</h5>
        <nav class="my-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
            </ol>
        </nav>

        <div class="card">
            

            <div class="card-body">
                <h5 class="card-title fw-bold">{{$user->name}}</h5>
                <p class="card-text text-secondary">Username : {{$user->username}}</p>
                <p class="card-text text-secondary">email : {{$user->email}}</p>
                <p class="card-text text-secondary">Create at : {{$user->created_at}}</p>
            </div>
        </div>
        @include('footer');
@endsection