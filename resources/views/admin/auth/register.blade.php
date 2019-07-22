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
            <form method="POST" id="FormRegister" class="form-register">
                @csrf
                <div id="Message"></div>
                <div class="form-login-body">
                    <div class="form-logo">
                        <img onmousedown="return false" src="{{ URL::asset('assets/images/web/'.$zooq[0]['logo']) }}"/>
                    </div>
                    <div class="form-title">
                        Join Free
                    </div>

                    <div class="form-group">
                        <label class="fas fa-user icon"></label>
                        <input type="text" value="{{ $user->txtEmail or old('txtName') }}" id="txtName" class="form-input" placeholder="Full Name" name="txtName" autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <i class="fas fa-transgender icon"></i>
                        <div class="rdb-group">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" name="rdbGender" id="rdbMale" value="Male">
                                <label class="custom-control-label" for="rdbMale">Male</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" name="rdbGender" id="rdbFemale" value="Female">
                                <label class="custom-control-label" for="rdbFemale">Female</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="fas fa-at icon"></label>
                        <input type="text" value="{{ $user->txtEmail or old('txtEmail') }}" id="txtEmail" class="form-input" placeholder="E-mail" name="txtEmail" autocomplete="off" />
                    </div>

                    <div class="form-group">
                        <label class="fas fa-lock icon"></label>
                        <input type="password" value="{{ $user->txtPassword or old('txtPassword') }}" id="txtPassword" class="form-input" placeholder="Password" autocomplete="off" name="txtPassword"/>
                    </div>             
                    <div class="form-group">
                        <div class="remember">
                            <input class="remember-me" id="RememberMe" type="checkbox" value="remember">
                            <label for="RememberMe">I agree with term and condition.</label>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button class="btn-login btn-disabled" id="btnRegister">Register</button>
                        <div id="box-loader">
                            <div class="loader"></div>
                        </div>
                    </div>
                    <div class="register-link">Already have account? <a href="{{ url('/login') }}">Sign In</a></div>
                </div>
            </form>
        </div>
    </body>
    <script>
    $('#txtEmail, #txtPassword').keyup(function(){
        if( $('#btnRegister').hasClass('btn-disabled') && 
            $('#txtEmail').val() != "" &&
            $('#txtPassword').val() != ""
            )
        {
            $('#btnRegister').removeClass('btn-disabled');
        }else if(
            $('#txtEmail').val() == "" ||
            $('#txtPassword').val() == ""
        ){
            $('#btnRegister').addClass('btn-disabled');
        }
    });
    </script>
</html>
