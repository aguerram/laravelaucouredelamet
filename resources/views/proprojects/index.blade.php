@extends('layouts.app')
@push('proprojets') active @endpush
@section('title')
    Mes projets professionnels
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
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Mes projets professionnels</span>
                        <a href="/proproject/create" class="btn btn-primary"><i class="fa fa-plus"></i> Ajouter un
                            projet professionnel</a>
                    </div>

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
                                        @if(strlen($prjt->body)>200)
                                            {{substr($prjt->body,0,200)}}...
                                        @else
                                            {{$prjt->content}}
                                        @endif
                                        <br>


                                    <div class="btn-group">
                                        <a href="/proproject/{{$prjt->id}}" class="readmore btn btn-sm btn-secondary">Lire
                                            la suite</a>&nbsp;&nbsp;&nbsp;
                                        <a href="/proproject/{{$prjt->id}}/edit" class="btn btn-success btn-sm"><i
                                                    class="fa fa-pencil"></i></a>
                                        <div class="dropdown open">
                                            <button class="btn btn-danger dropdown-toggle btn-sm" type="button"
                                                    id="triggerId"
                                                    data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                                <form method="post" action="/proproject/{{$prjt->id}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item" href="#"><i class="fa fa-trash"></i>
                                                        Confirmer
                                                        la
                                                        suppression
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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
