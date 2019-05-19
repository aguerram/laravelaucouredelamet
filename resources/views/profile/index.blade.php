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
                <div class="card-body bg-white">
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
@endsection