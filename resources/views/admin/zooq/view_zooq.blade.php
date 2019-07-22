@include('admin.panel_header')
<div class="panel card">
    <form method="post" action="{{ url('/update_zooq/'.$zooq[0]['zooq_id']) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-field flex-group">
            <div class="form-group column-50">
                <label class="form-label">Website Name<sup class="sup-required">*</sup></label>
                <input type="text" value="{{ $zooq[0]['name'] }}" id="WebsiteName" value="{{ old('') }}" class="form-input {{ $errors->has('name') ? 'has-error' :'' }}" name="name" placeholder="" autocomplete="off" />
                <div class="checkbox-group">
                    <input class="checkbox" id="displayWebsiteName" type="checkbox" value="1" name="chkName" {{ ($zooq[0]['isNameActive'] == true) ? 'checked' :'' }} value="remember">
                    <label for="displayWebsiteName">Display the name on the website</label>
                </div>
                <div class="error-message" id="WebsiteNameErrorMessage"></div>    
            </div>
            <div class="form-group column-50">
                <label class="form-label">Contact<sup class="sup-required">*</sup></label>
                <input type="text" class="form-input" value="{{ $zooq[0]['contact'] }}" name="contact" placeholder="Contact" />
            </div>
            <div class="form-group column-25">
                <label class="form-label">Background Color<sup class="sup-required">*</sup></label>
                <div class="ColorBox">
                    <div class="color" id="color" style="background-color: {{ $zooq[0]->hex_colors->hex_color }} ;"></div>
                    <select name="primary_color" id="PrimaryColor">
                        @foreach ($colors as $color)
                        @if ($zooq[0]->primary_color == $color->color_id)
                        <option selected data-color="{{ $color->hex_color }}" value="{{ $color->color_id }}" class="colorItem">{{ $color->color_name }}</option>
                        @else
                        <option data-color="{{ $color->hex_color }}" value="{{ $color->color_id }}" class="colorItem">{{ $color->color_name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group column-25">
                <label class="form-label">Text Color<sup class="sup-required">*</sup></label>
                <div class="ColorBox">
                    <div class="color" id="textcolor" style="background-color: {{ ($zooq[0]->text_color == false) ? '#dfe6e9' : '#636e72' }} ;"></div>
                    <select name="text_color" id="TextColor">
                        @if($zooq[0]->text_color == false)
                        <option data-color="#dfe6e9" selected value="0">Lighten</option>
                        <option data-color="#636e72" value="1">Darken</option>
                        @else
                        <option data-color="#dfe6e9" value="0">Lighten</option>
                        <option data-color="#636e72" selected value="1">Darken</option>
                        @endif
                    </select>
                </div>
            </div>


            <div class="form-group column-50">
                <label class="form-label">Email<sup class="sup-required">*</sup></label>
                <input type="text" class="form-input" value="{{ $zooq[0]['email'] }}" name="email" placeholder="someone@example.com" autocomplete="off" /></td>
            </div>
            <div class="form-group column-50">
                <label class="form-label">About<sup class="sup-required">*</sup></label>
                <textarea name="about" class="form-input-area">{{ $zooq[0]['about'] }}</textarea></td>
            </div>
            <div class="form-group column-50">
                <label class="form-label">Address<sup class="sup-required">*</sup></label>
                <textarea name="address" class="form-input-area">{{ $zooq[0]['address'] }}</textarea></td>
            </div>

            <div class="form-group column-50">
                <label class="form-label">Favicon<sup class="sup-required">*</sup></label>
                <img src="{{ url('/assets/images/web/'.$zooq[0]['favicon']) }}" class="favicon-logo" />
                <div class="upload-group">  
                    <label class="filenamefavicon">Choose Image</label>
                    <div class="btn btn-upload browse-button-favicon">
                        <span class="browse-button-favicon-text">
                        <i class="fa fa-folder-open"></i> Browse...</span>
                        <input type="file" name="file_upload_favicon" accept="image/ico, image/jpeg, image/x-png"/>
                    </div>
                </div>
                <p class="note">Only ICO, PNG, JPG &amp; JPEG files are allowed.</p>
            </div>
            <div class="form-group column-50">
                <label class="form-label">Logo<sup class="sup-required">*</sup></label>
                <img src="{{ url('/assets/images/web/'.$zooq[0]['logo']) }}" class="brand-logo" />
                <div class="upload-group">  
                    <label class="filename">Choose Image</label>
                    <div class="btn btn-upload browse-button">
                        <span class="browse-button-text">
                        <i class="fa fa-folder-open"></i> Browse...</span>
                        <input type="file" name="file_upload" accept="image/svg, image/jpeg, image/x-png"/>
                    </div>
                </div>
                <div class="radio-group">
                    <div class='rdb-group'>
                        <div class='custom-control custom-radio'>
                            <input type="radio" {{ ($zooq[0]['isLogoActive'] == true) ? 'checked' :'' }} value="1" class='custom-control-input' id="rdbBrandOn" name="rdbBrand"><label class='custom-control-label' for="rdbBrandOn">ON</label>
                        </div>
                        <div class='custom-control custom-radio'>
                            <input type="radio" {{ ($zooq[0]['isLogoActive'] == false) ? 'checked' :'' }} value="0" class='custom-control-input' id="rdbBrandOff" name="rdbBrand"><label class='custom-control-label' for="rdbBrandOff">OFF</label>
                        </div>
                    </div>
                </div>
                <p class="note">Only SVG, PNG, JPG &amp; JPEG files are allowed.</p>
            </div>

        </div>
        <div class="card-footer border-top">
            <div class="btn-group">
                <button type="submit" name="btnUpdate" class="btn-action" id="btnRegister"><i class="fas fa-pencil-alt"></i> Save Changes</button>
                <a class="btn-default" href="{{ url('/')  }}" target="_blank"><i class="fas fa-globe"></i> Visit the website.</a>
                <div id="box-loader">
                    <div id="loader"></div>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    $("#PrimaryColor").on('change', function() {
        var color = $('option:selected', this).attr('data-color');
        $('#color').css({ "background-color": color });
    });
    $("#TextColor").on('change', function() {
        var color = $('option:selected', this).attr('data-color');
        $('#textcolor').css({ "background-color": color });
    });

    $(".browse-button input:file").change(function() {
        $("input[name='file_upload']").each(function() {
            var fileName = $(this).val().split('/').pop().split('\\').pop();
            $(".filename").html(fileName);
            $(".browse-button-text").html('<i class="fa fa-sync-alt"></i> Change');
        });

    });

    $(".browse-button-favicon input:file").change(function() {
        $("input[name='file_upload_favicon']").each(function() {
            var fileNameFavicon = $(this).val().split('/').pop().split('\\').pop();
            $(".filenamefavicon").html(fileNameFavicon);
            $(".browse-button-favicon-text").html('<i class="fa fa-sync-alt"></i> Change');
        });

    });
</script>
