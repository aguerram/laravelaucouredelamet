@extends('layouts.app')
@push('accueil') active @endpush
@section('title')
Accueil
@endsection
@section('style')
<style>
    body {

        background: url('/images/back.jpg');
        background-position: bottom;
    }

    .card-header {
        background-color: #113a7c;
        color: white;
    }
    .bglk{
        background-color: #8ad2f5;
    }
</style>
@endsection
@section('content')

<div id="carouselId" class="carousel slide" data-ride="carousel" style="
    overflow: hidden;position:relative;top:-24px;border-bottom: 3px solid white;height:600px;">
    <ol class="carousel-indicators">
        <li data-target="#carouselId" data-slide-to="0" class="active"></li>
        <li data-target="#carouselId" data-slide-to="1"></li>
        <li data-target="#carouselId" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img style="width:100%" src="{{asset('images/home/1.jpg')}}">
        </div>
        <div class="carousel-item">
            <img style="width:100%" src="{{asset('images/home/2.jpg')}}">
        </div>
        <div class="carousel-item">
            <img style="width:100%;height:600px" src="{{asset('images/home/4.jpg')}}">
        </div>
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
<div class="container">
    <div class="row justify-content-center mt-2">
        <div class="col-md-8 col-12">
            <div class="card">
                <div class="card-header">
                    3 Meilleurs membres
                </div>
                <div class="card-body">
                    <div class="row justify-content-around">
                        @foreach($users as $user)
                        <div class="card col-lg-3 col-md-4 col-5 m-2 bglk">
                            <a class="card-body btn" href="/profile/{{$user->id}}">
                                <p>{{$user->name}}</p>
                                <p class="text-center"><small>Total des votes : </small> <b>{{$user->votes_count}}</b></p>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Contactez nous</div>

                <div id="projetcs" class="card-body">
                    <table>
                        <tbody>
                            <tr>
                                <td style="font-size: 16px" valign="top"><i class="fa fa-map-marker"></i></td>
                                <td><b style="font-size: 16px">Adresse de notre espace d’accueil</b>
                                    <p class="text-justify">
                                        Maison qui fait l’angle de l’avenue Istiklal (*), et de la rue Khabazine, entrée
                                        par
                                        la rue porte numéro 5, quartier BAB DOUKALLA.
                                        (*) l’avenue Istiklal se situe à l’intérieur de l’ancienne médina, débute à la
                                        porte
                                        qui donne sur le port, traverse la place de l’horloge et va jusqu’à bab doukala.
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 16px" valign="top"><i class="fa fa-phone"></i></td>
                                <td><b style="font-size: 16px">Téléphone de notre espace d’accueil</b>
                                    <p class="text-justify">
                                        <span style="color: #00AD5F">+212 (0) 5 24 78 35 63</span>

                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 16px" valign="top"><i class="fa fa-envelope"></i></td>
                                <td><b style="font-size: 16px">Email de groupe</b>
                                    <p class="text-justify">
                                        <span style="color: #00AD5F">aucoeurdelamitie2002@yahoo.fr</span>

                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
</div>
@endsection