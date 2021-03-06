@extends('admin.layout.admin')
@push('proprojects') active @endpush

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
    <div class="row justify-content-center">
        <div class="col-md-8 col-12">
            <nav class="breadcrumb">
                <a class="breadcrumb-item" href="/admin/{{Request::segment(2)}}">Les projets professionnels</a>
                <span class="breadcrumb-item active">{{$sb->title}}</span>
            </nav>
            <div class="card">

                <h1 class="px-3 pt-3 text-justify">{{$sb->title}}</h1>
                <p class="px-3 d-flex justify-content-between">
                    <i class=" fa fa-user"> {{$sb->user->name}}</i>
                    <i class="fa fa-clock-o"> {{$sb->created_at}}</i>
                </p>
                <hr/>
                <!--<div class="row justify-content-end">
                    <div class="btn-group">
                        @if(!$sb->active)
                            <a href="/admin/{{Request::segment(2)}}/activate/{{$sb->id}}" class="btn btn-success"><i class="fa fa-check"></i> Valider</a>
                        @endif
                        <form action="/admin/{{Request::segment(2)}}/{{$sb->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Supprimer</button>
                        </form>
                    </div>
                </div>-->
                <div id="projetcs" class="card-body">
                    <p class="text-justify">
                        {{$sb->body}}
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
@endsection