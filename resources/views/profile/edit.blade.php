@extends('layouts.app')
@section('title')
    Profil
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{$user->name}}</h4>
                        <hr>
                        <p class="card-text">Créé a : <b>{{$user->created_at}}</b></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="card-header text-center">Les informations personnel</div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <form action="/profile/edit" method="post" class="container bg-white p-2">
                    @csrf
                    <div class="form-group">
                        <label for="your_name"><i class="fa fa-calendar"></i> Date de naissance</label>
                        <input class="form-control" type="date" value="{{ old('datene')?old('datene'):$user->datene }}" name="datene"/>
                    </div>
                    <div class="form-group">
                        <label for="adre"><i class="fa fa-map"></i> Address</label>
                        <textarea id="adre" class="form-control"
                                  name="address">{{ old('address')?old('address'):$user->address }}</textarea>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="your_name"><i class="fa fa-key"></i> Nouveau mot de passe</label>
                        <input class="form-control" type="password" name="password"/>
                    </div>
                    <div class="form-group">
                        <label for="your_name"><i class="fa fa-key"></i> Répéter le mot de passe</label>
                        <input class="form-control" type="password" name="password_confirmation"/>
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Enregistrer</button>
                        <a href="/profile" type="submit" class="btn btn-secondary text-white"><i class="fa fa-arrow-left"></i> Retourner</a>
                    </div>
                </form>
                @if(count($errors->all())>0)
                    <div class="card-footer">
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection