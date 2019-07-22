
@include('admin.panel_header')
<div class="panel card">
@if (Auth::user()->roles->role_name == 'administrator')
<form method="post" action="{{ url('question/store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-field flex-group">
        <div class="form-group column-50">
            <label class="form-label">Question<sup class="sup-required">*</sup></label>
            <input type="text" maxlength="150" value="{{ old('question') }}" id="question" class="form-input {{ $errors->has('question') ? 'has-error' :'' }}" name="question" placeholder="" autocomplete="off" />
            <p class="note">Maximum input 150 characters, doesn't contain special characters.</p>
            <div class="error-message" id="QuestionErrorMessage"></div>    
        </div>   
        <div class="form-group column-50">
            <label class="form-label">Question Image<sup class="sup-required">*</sup></label>
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

        <div class="form-group column-25">
            <label class="form-label">Answer 1<sup class="sup-required">*</sup></label>
            <input type="text" maxlength="50" value="{{ old('answer_1') }}" id="answer_1" class="form-input {{ $errors->has('answer_1') ? 'has-error' :'' }}" name="answer_1" placeholder="" autocomplete="off" />
            <p class="note">Maximum input 50 characters, doesn't contain special characters.</p>
            <div class="error-message" id="AnswerOneErrorMessage"></div>    
        </div>   
        <div class="form-group column-25">
            <label class="form-label">Answer 2<sup class="sup-required">*</sup></label>
            <input type="text" maxlength="50" value="{{ old('answer_2') }}" id="answer_2" class="form-input {{ $errors->has('answer_2') ? 'has-error' :'' }}" name="answer_2" placeholder="" autocomplete="off" />
            <p class="note">Maximum input 50 characters, doesn't contain special characters.</p>
            <div class="error-message" id="AnswerOneErrorMessage"></div>    
        </div>   
        <div class="form-group column-25">
            <label class="form-label">Answer 3<sup class="sup-required">*</sup></label>
            <input type="text" maxlength="50" value="{{ old('answer_3') }}" id="answer_3" class="form-input {{ $errors->has('answer_3') ? 'has-error' :'' }}" name="answer_3" placeholder="" autocomplete="off" />
            <p class="note">Maximum input 50 characters, doesn't contain special characters.</p>
            <div class="error-message" id="AnswerThirdErrorMessage"></div>    
        </div>   
        <div class="form-group column-25">
            <label class="form-label">Answer 4<sup class="sup-required">*</sup></label>
            <input type="text" maxlength="50" value="{{ old('answer_4') }}" id="answer_4" class="form-input {{ $errors->has('answer_4') ? 'has-error' :'' }}" name="answer_4" placeholder="" autocomplete="off" />
            <p class="note">Maximum input 50 characters, doesn't contain special characters.</p>
            <div class="error-message" id="AnswerFourthErrorMessage"></div>    
        </div>   
        <div class="form-group column-50">
            <label class="form-label">Correct Answer<sup class="sup-required">*</sup></label>
            <select name="correct_answer" id="correct_answer" class="form-select {{ $errors->has('correct_answer') ? 'has-error' :'' }}">
                <option value="" disabled selected>Choose Answer</option>
                <option value="1">Answer 1</option>
                <option value="2">Answer 2</option>
                <option value="3">Answer 3</option>
                <option value="4">Answer 4</option>
            </select>    
            <div class="error-message" id="CorrectAnswerErrorMessage"></div>  
        </div>   
        <div class="form-group column-50">
            <label class="form-label">Desciption<sup class="sup-required">*</sup></label>
            <textarea name="description" id="description" class="form-input-area">{{ old('description') }}</textarea></td>
        </div>
    </div>
    <div class="form-group">
        <div class="btn-group">
            @if ($errors->any())
                <div class="error-message">
                    <i class="fas fa-exclamation-triangle"></i> {{ $errors->first() }}
                </div>
            @endif
            <button type="submit" name="btnSave" class="btn-action btn-disabled" id="btnSave"><i class="fas fa-plus"></i> Add Question</button>
            <div id="box-loader">
                <div id="loader"></div>
            </div>
        </div>
    </div>    
</form>

@endif
	<table class="table">
		<thead>
            <tr>
                <th width="300px">Question</th>
                <th>Image</th>
                <th width="400px">Desciption</th>
                @if (Auth::user()->roles->role_name == 'administrator')
                <th align="center"></th>
                @endif
            </tr>
		</thead>
		<tbody>
            @foreach($questions as $question)
            <tr>
                
                <td>
                    {{ $question->question }}<br>
                    <strong>Answers :</strong><br>
                    <div class="{{ ($question->correct_answer) == 1 ? 'green-label' : '' }}">A. {{ $question->answer_1 }} </div>
                    <div class="{{ ($question->correct_answer) == 2 ? 'green-label' : '' }}">B. {{ $question->answer_2 }} </div>
                    <div class="{{ ($question->correct_answer) == 3 ? 'green-label' : '' }}">C. {{ $question->answer_3 }} </div>
                    <div class="{{ ($question->correct_answer) == 4 ? 'green-label' : '' }}">D. {{ $question->answer_4 }} </div>
                </td>
                <td>
                    @if($question->image == NULL)
                        No Image.
                    @else
                    <img width="200px" onmousedown="return false;" src="{{ URL::asset('assets/images/question/'.$question->image) }}"/>
                    @endif
                </td>
                <td>{{ $question->description }}</td>
                @if (Auth::user()->roles->role_name == 'administrator')
                <td class="w150">
                    <form id="delete-form" method="post" action="{{ url('/question/delete/' . $question->question_id) }}">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <a id="update-data" class="btn-default tooltip" href="{{ url('/question/edit/'. $question->question_id)}}"> <i class="fas fa-edit"></i> <span class="tooltiptext">Edit Question</span></a>
                        <button class="delete-data btn-delete tooltip" onclick="return confirm('Are you sure?')"> <i class="fas fa-trash"></i><span class="tooltiptext">Delete this Question</span> </button>  
                    </form>    
                </td>
                @endif
            </tr>
            @endforeach
		</tbody>
	</table>
	<div class="boxPagination">
         {{ $questions->links() }} 
    </div>

</div>
<script>

    $('#description, #question').keyup(function(){
        if( $('#btnSave').hasClass('btn-disabled') && 

            $('#description').val() != "" &&
            $('#question').val() != ""
            )
        {
            $('#btnSave').removeClass('btn-disabled');
        }else if(

            $('#description').val() == "" ||
            $('#question').val() == ""
        ){
            $('#btnSave').addClass('btn-disabled');
        }
    });
</script>
