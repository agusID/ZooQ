@include('admin.panel_header')
<div class="panel card">
    <form method="post" action="{{ url('gallery/slideshow/store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-field">
            <div class="form-group">
                <label class="form-label">Title<sup class="sup-required">*</sup></label>
                <input type="text" value="{{ old('title') }}" id="title" class="form-input {{ $errors->has('title') ? 'has-error' :'' }}" name="title" placeholder="" autocomplete="off" />
                <div class="error-message" id="TitleErrorMessage"></div>    
            </div>
            <div class="form-group">
                <label class="form-label">Desciption<sup class="sup-required">*</sup></label>
                <textarea name="description" id="description" class="form-input-area">{{ old('description') }}</textarea></td>
            </div>
            <div class="form-group">
                <label class="form-label">Upload Image<sup class="sup-required">*</sup></label>
                <div class="upload-group">  
                    <label class="filename">Choose Image</label>
                    <div class="btn btn-upload browse-button">
                        <span class="browse-button-text">
                        <i class="fa fa-folder-open"></i> Browse...</span>
                        <input type="file" name="file_upload" id="file_upload" accept="image/jpeg, image/x-png"/>
                    </div>
                </div>
                <p class="note">Only PNG, JPG &amp; JPEG files are allowed.</p>
            </div>
            <div class="form-group">
                <div class="btn-group">
                    @if ($errors->any())
                        <div class="error-message">
                            <i class="fas fa-exclamation-triangle"></i> {{ $errors->first() }}
                        </div>
                    @endif
                    <button type="submit" name="btnSave" class="btn-action btn-disabled" id="btnSave"><i class="fas fa-plus"></i> Add Data</button>
                    <div id="box-loader">
                        <div id="loader"></div>
                    </div>
                </div>
            </div>
        </div>
    </form>

	<table class="table">
		<thead>
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th width="400px">Desciption</th>
                <th>Image</th>
                <th>Created at</th>
                <th colspan="2" colspan="2" align="center"></th>
            </tr>
		</thead>
		<tbody>
            @if($slideshows->count() == 0)
            <tr>
                <td colspan="6">No data available.</td>
            </tr>
            @else
            @foreach($slideshows as $s)
            <tr>
                <td>{{ $s->slideshow_id }}</td>
                <td>{{ $s->title }}</td>
                <td>{{ $s->description }}</td>
                <td>
                    <img width="150px" onmousedown="return false;" src="{{ URL::asset('assets/images/slideshow/'.$s->image) }}"/>
                </td>
                <td>{{ $s->created_at->format('l, d M Y') }}</td>
                <td>
                    <div class="action-group">
                        <a id="update-data" class="btn btn-white tooltip" href="{{ url('/gallery/slideshow/edit/'. $s->slideshow_id)}}"> <i class="fas fa-pencil-alt"></i> <span class="tooltiptext">Edit</span></a>
                        <a data-msg="You have selected data : <strong>{{ $s->title }}</strong>. Do you want to delete this Slide? You can't undo this action" data-title="Slide Delete Confirmation" href="{{ url('/gallery/slideshow/delete/' . $s->slideshow_id) }}" class="btn delete-data btn-danger tooltip navDeleteLink"> <i class="fas fa-trash"></i> <span class="tooltiptext">Delete</span></a>  
                    </div>                    
                </td>
            </tr>
            @endforeach
            @endif
		</tbody>
	</table>
	<div class="boxPagination">
        {{ $slideshows->links() }}
    </div>

</div>
<script>
    $(".browse-button input:file").change(function() {
        $("input[name='file_upload']").each(function() {
            var fileName = $(this).val().split('/').pop().split('\\').pop();
            $(".filename").html(fileName);
            $(".browse-button-text").html('<i class="fa fa-sync-alt"></i> Change');
        });
    });
    $(".navDeleteLink").click(function(e){
        e.preventDefault();
        console.log(this);
        $('#ModalDelete').css({'display':'block'});
        $('#ModalDelete').show().addClass('fadeInDown');
        $('#ModalDelete #delete-form').attr("action", $(this).attr('href'));
        $('#ModalDelete .ModalLabel').html($(this).attr('data-title'));
        $('#ModalDelete .modal-body').html($(this).attr('data-msg'));
        $('#backdrop').html('<div class="modal-backdrop"></div>');
    });

    $("#ModalDelete .close, #ModalDelete .btn-cancel").click(function(){
        $('#ModalDelete').fadeOut();
        $('#ModalDelete .btn-ok').attr("href", $(this).attr('href'));
        $('.modal-backdrop').fadeOut();
        $('#backdrop').html('');
    });
    $('#file_upload').change(function(){
        if( $('#btnSave').hasClass('btn-disabled') && 
            $('#title').val() != "" &&
            $('#description').val() != "" &&
            $('#file_upload').val() != ""
            )
        {
            $('#btnSave').removeClass('btn-disabled');
        }else if(
            $('#title').val() == "" ||
            $('#description').val() == "" ||
            $('#file_upload').val() == ""
        ){
            $('#btnSave').addClass('btn-disabled');
        }
    });
    $('#title, #description, #file_upload').keyup(function(){
        if( $('#btnSave').hasClass('btn-disabled') && 
            $('#title').val() != "" &&
            $('#description').val() != "" &&
            $('#file_upload').val() != ""
            )
        {
            $('#btnSave').removeClass('btn-disabled');
        }else if(
            $('#title').val() == "" ||
            $('#description').val() == "" ||
            $('#file_upload').val() == ""
        ){
            $('#btnSave').addClass('btn-disabled');
        }
    });
    
</script>
