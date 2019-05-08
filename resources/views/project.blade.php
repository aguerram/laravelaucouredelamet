@extends('layouts.app')
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
            <div class="col-md-8 col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"><a href="/">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Projet</li>
                    </ol>
                </nav>
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
                            {{$project->content}}
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
                </div>
            </div>
        </div>
    </div>
@endsection
