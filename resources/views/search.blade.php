@extends('layouts.app')
@push('accueil') active @endpush
@section('title')
    Accueil
@endsection
@section('style')
    <style>

    </style>
@endsection
@section('content')
    <div class="container">
        <ul class="list-group">
            @foreach($projects as $prjt)
                <li class="list-group-item">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex ">
                                <div class="col-3">
                                    @if(count($prjt->images)>0)
                                        <img src="{{asset('storage/'. $prjt->images->first()->link)}}" class="w-100"
                                             alt="...">
                                    @endif
                                </div>
                                <div class="ml-3">
                                    <h4 class="card-title"><a href="/projet/{{$prjt->id}}"
                                                              class="text-decoration-none">{{$prjt->title}}</a></h4>
                                    <p class="card-text">{{substr($prjt->content,0,255)}}...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
            @foreach($sprojects as $prjt)
                @if($prjt->active)
                    <li class="list-group-item">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex ">
                                    <div class="col-3">
                                        @if(count($prjt->images)>0)
                                            <img src="{{asset('storage/'. $prjt->images->first()->link)}}" class="w-100"
                                                 alt="...">
                                        @endif
                                    </div>
                                    <div class="ml-3">
                                        <h4 class="card-title"><a href="/subproject/{{$prjt->id}}"
                                                                  class="text-decoration-none">{{$prjt->title}}</a></h4>
                                        <p class="card-text">{{substr($prjt->content,0,255)}}...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
@endsection
