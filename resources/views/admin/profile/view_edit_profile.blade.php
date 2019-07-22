@include('admin.panel_header')
<div class="panel card">
<form method="post" action="{{ url('user/profile/update') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-field flex-group">
        <div class="form-group column-50">
            <label class="form-label">Name</label>
            <input type="text" disabled value="{{ Auth::user()->data_employee->name }}" id="name" class="form-input disabled {{ $errors->has('name') ? 'has-error' :'' }}" name="name" placeholder="" autocomplete="off" />
            <div class="error-message" id="NameErrorMessage"></div>    
        </div>
        <div class="form-group column-50">
            <label class="form-label">Email</label>
            <input type="email" disabled value="{{ Auth::user()->email }}" id="email" class="form-input disabled {{ $errors->has('email') ? 'has-error' :'' }}" name="email" placeholder="" autocomplete="off" />
            <div class="error-message" id="EmailErrorMessage"></div>    
        </div>
        <div class="form-group column-50">
            <label class="form-label">Phone</label>
            <input type="tel" value="{{ Auth::user()->data_employee->phone }}" id="phone" class="form-input {{ $errors->has('phone') ? 'has-error' :'' }}" name="phone" placeholder="" autocomplete="off" />
            <div class="error-message" id="PhoneErrorMessage"></div>    
        </div>
        <div class="form-group column-50">
            <label class="form-label">Avatar Image</label>
            <div class="upload-group">  
                <label class="filename">Choose Image</label>
                <div class="btn btn-upload browse-button">
                    <span class="browse-button-text">
                    <i class="fa fa-folder-open"></i> Browse...</span>
                    <input type="file" name="file_upload" accept="image/jpeg, image/x-png"/>
                </div>
            </div>
            <p class="note">Only PNG, JPG &amp; JPEG files are allowed.</p>
        </div>
        <div class="form-group column-50">
            <label class="form-label">Address</label>
            <textarea name="address" class="form-input-area {{ $errors->has('address') ? 'has-error' :'' }}">{{ Auth::user()->data_employee->address }}</textarea>
            <div class="error-message" id="AddressErrorMessage"></div>    
        </div>
        <div class="form-group column-50">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-input-area {{ $errors->has('description') ? 'has-error' :'' }}">{{ Auth::user()->data_employee->description }}</textarea>
            <div class="error-message" id="DescriptionErrorMessage"></div>    
        </div>
    </div>
    <div class="card-footer border-top">
        <div class="btn-group">
            <button type="submit" name="btnUpdate" class="btn-action" id="btnRegister"><i class="fas fa-pencil-alt"></i> Update Profile</button>
            <a href="{{ url('dashboard') }}" class="btn-default">Cancel</a>
            <div id="box-loader">
                <div id="loader"></div>
            </div>
        </div>
    </div>
</form>

</div>
<script>
    $(".browse-button input:file").change(function() {
        $("input[name='file_upload']").each(function() {
            var fileName = $(this).val().split('/').pop().split('\\').pop();
            $(".filename").html(fileName);
            $(".browse-button-text").html('<i class="fa fa-sync-alt"></i> Change');
        });

    });
</script>