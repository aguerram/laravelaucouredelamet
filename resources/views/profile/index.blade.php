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
                    <ul class="list-group col-12">
                        @foreach($user->subprojects as $sb)
                            <a href="/subproject/{{$sb->id}}" class="list-group-item list-group-item-action mb-2" style="cursor: pointer">
                                <b>{{$sb->title}}</b>
                                <br>
                                <small><i class="fa fa-clock-o"></i> {{$sb->created_at}}</small>
                            </a>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection