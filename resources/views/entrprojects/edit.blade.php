@extends('layouts.app')
@push('entrprojets') active @endpush

@section('title')
    Modifier un projet entrepreneurial
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <nav class="breadcrumb">
                    <a class="breadcrumb-item" href="/">Accueil</a>
                    <a class="breadcrumb-item" href="/entrproject">Mes projets entrepreneurials</a>
                    <span class="breadcrumb-item active">Modifier {{$v->title}}</span>
                </nav>
            </div>
            <div class="col-md-8 col-12 card pt-3">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <form class="col-12" method="post" action="/entrproject/{{$v->id}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Titre</label>
                        <input required type="text" name="title" id="" class="form-control" placeholder=""
                               aria-describedby="helpId" value="{{$v->title}}">
                        <small id="helpId" class="text-muted">Tire de votre projet entrepreneurial</small>
                    </div>
                    <div required class="form-group">
                        <label for="">Contenu</label>
                        <textarea class="form-control" name="body">{{$v->body}}</textarea>
                        <small class="text-muted">Le contenu de votre projet</small>
                    </div>
                    <div class="form-group">
                        <label>Date de début</label>
                        <input required type="date" name="start_date"
                               value="{{$v->start_date}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Date de fin</label>
                        <input required type="date" name="end_date"
                               value="{{$v->end_date}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Pièces jointes</label>
                        <input type="file" accept="image/*" name="images[]" class="form-control" multiple>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Enregistrer</button>
                    </div>
                    @if(count($errors->all())>0)
                        <div class="card-footer">
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    <li>{{$err}}</li>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </form>
            </div>
        </div>
    </div>
@endsection
