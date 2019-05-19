@extends('layouts.app')
@section('title')
    Registre
@endsection
@section('style')
    <style>
        .navbar {
            display: none !important;
        }

        .invalid-feedback {
            display: block;
        }
    </style>
    <link rel="stylesheet" href="{{asset('css/login.css')}}"/>
@endsection
@section('content')

    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="{{route('login')}}" class="signup-image-link">J'ai déja un compte</a>
                    </div>

                    <div class="signin-form">
                        @if(count($sname)>0)
                            <h3 class="form-title">Créer un compte</h3>
                            <form method="POST" action="{{ route('register') }}" class="register-form" id="login-form">
                                @csrf
                                <div class="form-group">
                                    <select class="form-control" name="name" id="your_name2">
                                        <option value="" disabled selected>Nom Complete</option>
                                        @foreach($sname as $sn)
                                            <option value="{{$sn->name}}" {{old('name') === $sn->name?'selected':''}}>{{$sn->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="your_pass"><i class="fa fa-key"></i></label>
                                    <input type="password" name="password" id="your_pass" placeholder="Mot de passe"/>
                                </div>
                                <div class="form-group">
                                    <label for="your_pass2"><i class="fa fa-key"></i></label>
                                    <input type="password" name="password_confirmation" id="your_pass2"
                                           placeholder="Mot de passe"/>
                                </div>

                                <div class="form-group form-button">
                                    <input type="submit" name="signin" id="signin" class="form-submit"
                                           value="S'inscrire"/>
                                </div>
                                @if(count($errors)>0)
                                    <ul class="alert alert-danger">
                                        @foreach($errors->all() as $err)
                                            <li>{{$err}}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </form>
                        @else
                            <h5 class="text-justify">
                                Désolé, mais l'inscription n'est pas disponible pour le moment, car il n'y a pas de noms disponibles</h5>
                        @endif
                        <div class="social-login">
                            <!-- <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
