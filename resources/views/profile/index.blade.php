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
                        <!--<div class="d-flex justify-content-center align-items-center flex-column">
                            <img style="width: 96px;height: 96px;border-radius: 50%" src="{{asset('storage/images/c82OiMJod3Ja90Po0dAR1eJChUY2RvIdkKqtcW2u.jpeg')}}">
                            <button class="btn">Modifier</button>
                        </div>-->
                        <h4 class="card-title">{{$user->name}}</h4>
                        <hr>
                        <p class="card-text">Créé a : <b>{{$user->created_at}}</b></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="card-header text-center">Les informations personnel</div>
                <div class="card-body bg-white">
                    <a href="/profile/edit" class="btn btn-primary">Modifier</a>
                    <br>
                    <br>
                    <table class="table">
                        <tbody>
                        <tr>
                            <th>Date de naissance</th>
                            <td>{{$user->datene}}</td>
                        </tr>
                        <tr>
                            <th>Adresse</th>
                            <td>{{$user->address}}</td>
                        </tr>
                        <tr>
                            <td class="bg-light"></td>
                            <td class="bg-light"></td>
                        </tr>
                        <tr>
                            <th>Total des sous-projets</th>
                            <td>{{count($user->entrprojects)}}</td>
                        </tr>
                        <tr>
                            <th>Total des projets professionnels </th>
                            <td>{{count($user->proprojects)}}</td>
                        </tr>
                        <tr>
                            <th>Total des projets entrepreneurials  </th>
                            <td>{{count($user->entrprojects)}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--
    <div class="form-group">
                                    <label for="your_name"><i class="fa fa-calendar"></i></label>
                                    <input type="date" value="{{ old('datene') }}" name="datene"/>
                                </div>
                                <div class="form-group">
                                    <label for="adre"><i class="fa fa-map"></i></label>
                                    <textarea style="padding-left: 28px;" id="adre" class="form-control" name="address">{{ old('address')}}</textarea>
                                </div>
    -->
@endsection