<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/adminauth.css" type="text/css" rel="stylesheet"/>
    <link href="/css/adminauth_util.css" type="text/css" rel="stylesheet"/>
    <title>Admin</title>
    <style>
        .alert{
            padding: 5px;
            font-size: 13px;
            background-color: #F44336;
            color: white;
            margin-top: 10px;
            width: 100%;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Se connecter
					</span>
            </div>

            <form class="login100-form validate-form" method="post" action="{{route('admin.login')}}">
                @csrf
                <div class="wrap-input100 validate-input m-b-26" data-validate="email est vide">
                    <span class="label-input100">Email</span>
                    <input class="input100" value="{{old('email')}}" type="email" name="email" placeholder="Entrer votre email">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-18" data-validate="Le mdps est vide">
                    <span class="label-input100">Mot de passe</span>
                    <input class="input100" type="password" name="password" placeholder="Entrer votre mot de passe">
                    <span class="focus-input100"></span>
                </div>

                <div class="flex-sb-m w-full p-b-30">
                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
                        <label class="label-checkbox100" for="ckb1">
                            Enregister le mot de passe
                        </label>
                    </div>

                    <div>
                        <a href="#" class="txt1">
                            Le mot de passe oublié?
                        </a>
                    </div>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Connexion
                    </button>
                </div>
                @if(count($errors)>0)
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            <li>{{$err}}</li>
                        @endforeach
                    </ul>
                @endif
                @if(session('error'))
                    <ul class="alert alert-danger">
                        {{session('error')}}
                    </ul>
                @endif
            </form>
        </div>
    </div>
    <script src="{{asset('js/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('js/vendor/animsition/js/animsition.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('js/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('js/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('js/vendor/select2/select2.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('js/vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('js/vendor/daterangepicker/daterangepicker.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('js/vendor/countdowntime/countdowntime.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('js/main.js')}}"></script>
</div>
</body>
</html>
