@extends('layouts.app')
@section('title')
    Profil
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{$user->name}}</h4>
                        <p class="card-text">{{$user->email}}</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="card-header text-center">Les sous-projets</div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
@endsection