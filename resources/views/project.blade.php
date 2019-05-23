@extends('layouts.app')
@push('projets') active @endpush
@section('title')
    {{$project->title}}
@endsection
@section('style')
    <style>
        .carousel-item.active {
            display: flex !important;
            justify-content: center;
        }

        #carouselId {
            background-color: #424242 !important;
        }

    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"><a href="/">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Projet</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-4 col-12">
                @include('layouts.subprojects')
            </div>
            <div class="col-md-8 col-12">

                <div class="card">

                    <h1 class="px-3 pt-3 text-justify">{{$project->title}}</h1>
                    <div id="projetcs" class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <br>

                        <p class="text-justify">
                            {!!nl2br($project->content)!!}
                        </p>
                        <table class="table">
                            <thead>
                            <th>Date de debut</th>
                            <th>Date de fin</th>
                            </thead>
                            <tbody>
                            <td>{{$project->start_date}}</td>
                            <td>{{$project->end_date}}</td>
                            </tbody>
                        </table>
                        @if(count($project->images)>0)
                            <div id="carouselId" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    @for($i = 0 ; $i<count($project->images);$i++)
                                        <li data-target="#carouselId" data-slide-to="{{$i}}"
                                            class="{{$i == 0 ?'active':''}}"></li>
                                    @endfor
                                </ol>
                                <div class="carousel-inner" role="listbox">

                                    @for($i = 0 ; $i<count($project->images);$i++)
                                        <div class="carousel-item {{$i == 0?'active':''}}">
                                            <img src="{{asset('storage/'.$project->images[$i]->link)}}"/>
                                        </div>
                                    @endfor

                                </div>
                                <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        @endif

                    </div>
                    <div class="card-footer">
                        <div class="container">
                            <p>Commentaires</p>
                            <hr>
                            <form class="col-12" method="post" action="/comment" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group" style="display: flex;align-items: center;">
                                    <input type="hidden" value="{{$project->id}}" name="prjt">
                                    <input type="text"
                                           class="form-control" required value="{{old('content')}}" name="content"
                                           placeholder="Commentaire">
                                    <input type="file" name="image" id="imageselect" accept="image/*"
                                           style="display:none;">
                                    <div class="input-group-append">
                                        <div class="btn-group">
                                            <button id="selectbtn" type="button" class="btn btn-sm btn-nooutline"><i
                                                        class="fa fa-image input-group-text"></i>
                                            </button>
                                            <button type="submit" class="btn btn-success btn-sm btn-nooutline"><i
                                                        class="fa fa-long-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <div class="col-12">
                                <ul class="list-group">
                                    @foreach($project->comments as $comment)
                                        <li class="list-group-item mt-2"><b>{{$comment->user->name}}</b>
                                            : {{$comment->content}}
                                            @if(count($comment->images)>0)
                                                <br>
                                                <a href="{{asset('storage/'.$comment->images[0]->link)}}"
                                                   target="_blank">
                                                    <img style="max-height: 256px"
                                                         src="{{asset('storage/'.$comment->images[0]->link)}}">
                                                </a>
                                            @endif
                                            <br>
                                            <small><i class="fa fa-clock-o"></i> {{$comment->created_at}}
                                                @if($comment->user->id === \Illuminate\Support\Facades\Auth::user()->id)
                                                    <form class="float-right" method="post"
                                                          action="/comment/{{$comment->id}}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-link btn-sm"><i
                                                                    class="fa fa-trash text-danger"></i> Supprimer
                                                        </button>
                                                    </form>
                                                @endif
                                            </small>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection