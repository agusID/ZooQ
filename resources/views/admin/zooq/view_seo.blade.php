@include('admin.panel_header')
<div class="panel card">
<form method="post" action="{{ url('/update_seo/'.$zooq[0]['school_id']) }}">
    @csrf
    <div class="form-group">
        <label class="form-label">Meta Keywords</label>
        <input type="text" value="{{ $zooq[0]['seo_keywords'] }}" class="form-input {{ $errors->has('seo_keywords') ? 'has-error' :'' }}" id="seo_keywords" name="seo_keywords" placeholder="" autocomplete="off" />
        <div class="error-message" id="SEOKeywordsErrorMessage"></div>
    </div>
    <div class="form-group">
        <label class="form-label">Meta Descriptions</label>
        <textarea class="form-input-area" id="seo_descriptions" name="seo_descriptions">{{ $zooq[0]['seo_descriptions'] }}</textarea>
        <div class="error-message" id="SEODescriptionErrorMessage"></div>
    </div>
    <div class="form-group">
        <div class="btn-group">
            <button type="submit" name="btnUpdate" class="btn-action btn-disabled" id="btnUpdate"><i class="fas fa-pencil-alt"></i> Update Data</button>
            <div id="box-loader">
                <div id="loader"></div>
            </div>
        </div>
    </div>
</form>
</div>
<script>
    $('#seo_keywords, #seo_descriptions').keyup(function(){
        if( $('#btnUpdate').hasClass('btn-disabled') && 
            $('#seo_keywords').val() != "" &&
            $('#seo_descriptions').val() != ""
            )
        {
            $('#btnUpdate').removeClass('btn-disabled');
        }
    });
</script>
    