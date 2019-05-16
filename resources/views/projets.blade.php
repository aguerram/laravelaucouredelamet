@extends('layouts.app')
@push('projets') active @endpush
@section('title')
    Accueil
@endsection
@section('style')
    <style>

    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-2">
            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-header">Les projet de l'association au coeur de l'amitié</div>

                    <div id="projetcs" class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <br>
                        @foreach($projects as $prjt)
                            <div class="media mb-4">
                                @if(count($prjt->images)>0)
                                    <img src="{{asset('storage/'. $prjt->images->first()->link)}}" class="mr-3 col-3"
                                         alt="...">
                                @endif
                                <div class="media-body">
                                    <h5 class="mt-0 text-black">{{$prjt->title}}</h5>
                                    <p class="text-justify">
                                        @if(strlen($prjt->content)>200)
                                            {{substr($prjt->content,0,200)}}...
                                        @else
                                            {{$prjt->content}}
                                        @endif
                                        <br>
                                        <a href="/projet/{{$prjt->id}}" class="readmore btn btn-sm btn-secondary">Lire
                                            la suite</a>
                                        <br>
                                        <small><i class="fa fa-clock-o"></i> {{$prjt->created_at}}</small>
                                    </p>

                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
