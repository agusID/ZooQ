@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible">{{ $message }}<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>
@endif
@if ($errors->any())
<div class="alert alert-error alert-dismissible">{{ $errors->first() }}<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>
@endif
<div class="PanelContainer ">
    <section class="dashboard-cover">
        <div class="dashboard-cover-wrapper">
            <img id="choosen-image" onmousedown="return false" src="{{ URL::asset('assets/images/cover/'.Auth::user()->data_employee->profile_cover) }}" class="img-cover" />
            <div class="shadow"></div>
        </div>
    </section>
    <div class="PanelChangeCover">
        <form id="FormUploadCover" action="{{ url('user/cover/update') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="fileDialogForm">
                <label class="fileDialogLabel" for="fileDialog"><i class="fas fa-camera"></i> Change cover photo </label>
                <input type="file" name="file_upload" id="fileDialog" accept="image/jpeg, image/x-png" onchange="this.form.submit()"/>
            </div>
        </form>
    </div>
    <div class="PanelProfile">
        <div class="ProfileData card">
            <div class="ProfilePicture">
                <img onmousedown="return false" src="{{ URL::asset('assets/images/avatar/'.Auth::user()->data_employee->profile_picture) }}" />
            </div>
            <div class="ProfileName"> {{ Auth::user()->data_employee->name }}</div>
            <div class="ProfilePosition"> {{ Auth::user()->data_employee->positions->position_name }}</div>
            <div class="PersonalData">
                <div class="ProfileEmail"><i class="fas fa-envelope icon"></i> {{ Auth::user()->email }}</div>
                <div class="ProfilePhone"><i class="fas fa-phone icon"></i> {{ Auth::user()->data_employee->phone }}</div>
            </div>
            
            <a href="{{ url('user/profile/view_edit') }}" class="btnChangeProfile item-nav"><i class="fas fa-pencil-alt icon"></i> Edit Profile</a>
        </div>
    </div>
    
</div>
<script type="text/javascript">

    // let readURL = ( input ) => {

    //     if (input.files) {
    //         let reader = new FileReader();

    //         reader.onload = (e) => {
    //             $('#choosen-image').attr('src', e.target.result);
    //         };

    //         reader.readAsDataURL( input.files[0] );

    //         $('#publish-button').attr('disabled', false);
    //         $('.file-detail').slideDown();
    //     }

    // }

</script>

    