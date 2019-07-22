<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>

        <title>{{ $title }}</title>
        <link rel="shorcut icon" href="{{ URL::asset('assets/images/web/'.$zooq[0]['favicon']) }}" />
        <link rel="stylesheet" href="{{ URL::asset('assets/css/zooq.login.css') }}"/>
        <link rel="stylesheet" href="{{ URL::asset('assets/css/animate.css') }}"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous"/>
        <script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/zooq.admin.js') }}"></script>
        <meta name="robots" content="noindex"/>
        <meta name="googlebot" content="noindex"/>
    </head>
    <body>
        <div class="login-container">
            <form method="POST" id="FormLogin" class="form-login">
                @csrf
                <div id="Message"></div>
                <div class="form-login-body">
                    <div class="form-logo">
                        <img onmousedown="return false" src="{{ URL::asset('assets/images/web/'.$zooq[0]['logo']) }}"/>
                    </div>
                    <div class="form-title">
                        ZooQ Account
                    </div>
                    <div class="form-group">
                        <label class="fas fa-at icon"></label>
                        <input type="text" value="{{ $user->txtEmail or old('txtEmail') }}" id="txtEmail" class="form-input" placeholder="someone@gmail.com" name="txtEmail" autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <label class="fas fa-lock icon"></label>
                        <input type="password" value="{{ $user->txtPassword or old('txtPassword') }}" id="txtPassword" class="form-input" placeholder="password" autocomplete="off" name="txtPassword"/>
                    </div>
                    <div class="form-group">
                        <div class="remember">
                            <input class="remember-me" id="RememberMe" type="checkbox" value="remember">
                            <label for="RememberMe">Remember Me</label>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button class="btn-login btn-disabled" id="btnLogin">Sign In</button>
                        <div id="box-loader">
                            <div class="loader"></div>
                        </div>
                    </div>
                    <div class="register-link">No account yet? <a href="{{ url('/register') }}">Create one</a></div>
                </div>
            </form>
        </div>
    </body>
    <script>
    $('#txtEmail, #txtPassword').keyup(function(){
        if( $('#btnLogin').hasClass('btn-disabled') && 
            $('#txtEmail').val() != "" &&
            $('#txtPassword').val() != ""
            )
        {
            $('#btnLogin').removeClass('btn-disabled');
        }else if(
            $('#txtEmail').val() == "" ||
            $('#txtPassword').val() == ""
        ){
            $('#btnLogin').addClass('btn-disabled');
        }
    });
    </script>
</html>
