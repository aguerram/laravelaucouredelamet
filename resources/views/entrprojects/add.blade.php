@extends('layouts.app')
@push('entrprojets') active @endpush

@section('title')
    Ajouter un projet entrepreneurials
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <nav class="breadcrumb">
                    <a class="breadcrumb-item" href="/">Accueil</a>
                    <a class="breadcrumb-item" href="/entrproject">Mes projets entrepreneurials</a>
                    <span class="breadcrumb-item active">Ajouter un projet entrepreneurial</span>
                </nav>
            </div>
            <div class="col-md-8 col-12 card pt-3">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <form class="col-12" method="post" action="/entrproject" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Titre</label>
                        <input required type="text" name="title" id="" class="form-control" placeholder=""
                               aria-describedby="helpId" value="{{old('title')}}">
                        <small id="helpId" class="text-muted">Tire de votre projet entrepreneurial</small>
                    </div>
                    <div required class="form-group">
                        <label for="">Contenu</label>
                        <textarea class="form-control" name="body">{{old('body')}}</textarea>
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
                        <label>Pièces jointes</label>
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

                </form>
            </div>
        </div>
    </div>
@endsection
