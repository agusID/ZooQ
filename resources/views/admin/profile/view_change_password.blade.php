@include('admin.panel_header')
<div class="panel card">
<form method="post" action="{{ url('user/profile/do_change_password') }}">
    @csrf
    <div class="form-field">
        <div class="form-group">                
            <label class="form-label">Current Password<sup class="sup-required">*</sup></label>
            <input type="password" value="{{ old('current_password') }}" id="current_password" class="form-input {{ $errors->has('current_password') ? 'has-error' :'' }}" name="current_password" placeholder="" maxlength="50"  autocomplete="off" />
            <div class="error-message" id="PasswordErrorMessage"></div>
        </div>
        <div class="form-group">                
            <label class="form-label">New Password<sup class="sup-required">*</sup></label>
            <meter max="4" id="password-strength-meter"></meter>
            <span id="password-strength-text"></span>
            <input type="password" value="{{ old('password') }}" id="password" class="form-input {{ $errors->has('password') ? 'has-error' :'' }}" id="password" name="password" placeholder="" maxlength="50"  autocomplete="off" />
            <p class="note">Use 6 or more characters with a mix of letters, numbers &amp; symbols</p>
            <div class="error-message" id="NewPasswordErrorMessage"></div>
        </div>
        <div class="form-group">                
            <label class="form-label">Confirm New Password<sup class="sup-required">*</sup></label>
            <input type="password" value="{{ old('password_confirmation') }}" id="password_confirmation" class="form-input {{ $errors->has('password_confirmation') ? 'has-error' :'' }}" id="password_confirmation" name="password_confirmation" placeholder="" maxlength="50"  autocomplete="off" />
            <div class="error-message" id="ConfirmPasswordErrorMessage"></div>
        </div>
    </div>
    <div class="card-footer border-top">
        <div class="btn-group">
            <button type="submit" name="btnUpdate" class="btn-action btn-disabled" id="btnChangePassword"><i class="fas fa-pencil-alt"></i> Change Password</button>
            <a href="{{ url('dashboard') }}" class="btn-default">Cancel</a>
            <div id="box-loader">
                <div id="loader"></div>
            </div>
        </div>
    </div>
</form>

</div>
<script>
       var strength = {
            0: "Worst",
            1: "Bad",
            2: "Weak",
            3: "Good",
            4: "Strong",

        }
        var password = document.getElementById('password');
        var meter = document.getElementById('password-strength-meter');
        var text = document.getElementById('password-strength-text');
        
        password.addEventListener('input', function() {
            var val = password.value;
            var result = zxcvbn(val);
        
            // Update the password strength meter
            meter.value = result.score;
        
            // Update the text indicator
            if (val !== "") {
            text.innerHTML = "Strength: " + strength[result.score]; 
            } else {
            text.innerHTML = "";
            }
        });

    $('#current_password, #password, #password_confirmation').keyup(function(){
        if( 
            $('#btnChangePassword').hasClass('btn-disabled') &&
            $('#current_password').val() != '' &&
            $('#password').val() != '' &&
            $('#password_confirmation').val() != ''

        ){
            $('#btnChangePassword').removeClass('btn-disabled');
        }else if(
            $('#current_password').val() == '' ||
            $('#password').val() == '' ||
            $('#password_confirmation').val() == ''
        ){
            $('#btnChangePassword').addClass('btn-disabled');
        }
    });
</script>