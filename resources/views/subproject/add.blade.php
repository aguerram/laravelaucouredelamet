@extends('layouts.app')
@section('title')
    Ajouter sous-projet
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <nav class="breadcrumb">
                    <a class="breadcrumb-item" href="/">Accueil</a>
                    <a class="breadcrumb-item" href="/projet/{{Request::segment(3)}}">Projet</a>
                    <span class="breadcrumb-item active">Ajouter sous-projet</span>
                </nav>
            </div>
            <div class="col-md-8 col-12 card pt-3">

                <form class="col-12" method="post" action="/subproject" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Titre</label>
                        <input required type="text" name="title" id="" class="form-control" placeholder=""
                               aria-describedby="helpId" value="{{old('title')}}">
                        <small id="helpId" class="text-muted">Tire de votre sous-projet</small>
                    </div>
                    <div required class="form-group">
                        <label for="">Contenu</label>
                        <textarea class="form-control" name="content">{{old('content')}}</textarea>
                        <small class="text-muted">Le contenu de votre projet</small>
                    </div>
                    <div class="form-group">
                        <label>Date de début</label>
                        <input required type="date" name="start_date"
                               value="{{old('start_date')?old('start_date'):date('Y-m-d')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Date de fin</label>
                        <input required type="date" name="end_date"
                               value="{{old('end_date')?old('end_date'):(new DateTime())->add(new DateInterval("P1D"))
                                 ->format('Y-m-d')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Images</label>
                        <input type="file" accept="image/*" name="images[]" class="form-control" multiple>
                    </div>
                    <input type="hidden" name="pid" value="{{Request::segment(3)}}">
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
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
