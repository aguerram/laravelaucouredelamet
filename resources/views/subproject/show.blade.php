@extends('layouts.app')
@section('title')
    {{$sb->title}}
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-12">
                <nav class="breadcrumb">
                    <a class="breadcrumb-item" href="/">Accueil</a>
                    <a class="breadcrumb-item" href="/projet/{{$sb->project->id}}">{{$sb->project->title}}
                        <small>(Projet global)</small></a>
                    <span class="breadcrumb-item active">{{$sb->title}}</span>
                </nav>
                <div class="card">

                    <h1 class="px-3 pt-3 text-justify">{{$sb->title}}</h1>
                    <p class="px-3 d-flex justify-content-between">
                        <a href="/profile/{{$sb->user->id}}"><i class=" fa fa-user"></i> {{$sb->user->name}}</a>
                        <span><i class="fa fa-clock-o"> {{$sb->created_at}}</i></span>
                    </p>
                    <hr/>
                    <div id="projetcs" class="card-body">
                        <p class="text-justify">
                            {!!nl2br($sb->content)!!}
                        </p>

                        <table class="table">
                            <thead>
                            <th>Date de debut</th>
                            <th>Date de fin</th>
                            </thead>
                            <tbody>
                            <td>{{$sb->start_date}}</td>
                            <td>{{$sb->end_date}}</td>
                            </tbody>
                        </table>
                        @if(count($sb->images)>0)
                            <div id="carouselId" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    @for($i = 0 ; $i<count($sb->images);$i++)
                                        <li data-target="#carouselId" data-slide-to="{{$i}}"
                                            class="{{$i == 0 ?'active':''}}"></li>
                                    @endfor
                                </ol>
                                <div class="carousel-inner" role="listbox">

                                    @for($i = 0 ; $i<count($sb->images);$i++)
                                        <div class="carousel-item {{$i == 0?'active':''}}">
                                            <img src="{{asset('storage/'.$sb->images[$i]->link)}}"/>
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
@endsection