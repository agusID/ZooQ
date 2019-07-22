@include('admin.panel_header')
<div class="panel card">
    <form method="post" action="{{ url('/quiz/store') }}">
        @csrf
        <div class="form-field">
            <table>
            @php 
            $no = 0
            @endphp
            @foreach($questions as $question)
            @php 
            $no++;
            @endphp
                <tr>
                    <td width="25px" align="center" style="display: flex; text-align:center"><h2 style="padding: 10px 0 !important; font-weight: 200; text-align:center">{{ $no }}.</h2></td>
                    <td>
                        <div class="form-group" style="padding: 15px !important">
                            <img width="100%" onmousedown="return false;" class="question-image" src="{{ URL::asset('assets/images/question/'.$question->image) }}"/>
                            <br>
                                <label for="" class="form-label"><strong>{{ $question->question }}</strong></label>
                                <input type='hidden' name='questionCheckboxes[]' value='{{ $question->question_id }}'/>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" name="{{ 'QuizID'.$question->question_id }}" id="{{ 'QuizID'.$question->question_id.'1' }}" value="1">
                                    <label class="custom-control-label" for="{{ 'QuizID'.$question->question_id.'1' }}">{{ $question->answer_1 }}</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" name="{{ 'QuizID'.$question->question_id }}" id="{{ 'QuizID'.$question->question_id.'2' }}" value="2">
                                    <label class="custom-control-label" for="{{ 'QuizID'.$question->question_id.'2' }}">{{ $question->answer_2 }}</label>
                                </div>
                                <div class="custom-control custom-radio">   
                                    <input class="custom-control-input" type="radio" name="{{ 'QuizID'.$question->question_id }}" id="{{ 'QuizID'.$question->question_id.'3' }}" value="3">
                                    <label class="custom-control-label" for="{{ 'QuizID'.$question->question_id.'3' }}">{{ $question->answer_3 }}</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" name="{{ 'QuizID'.$question->question_id }}" id="{{ 'QuizID'.$question->question_id.'4' }}" value="4">
                                    <label class="custom-control-label" for="{{ 'QuizID'.$question->question_id.'4' }}">{{ $question->answer_4 }}</label>
                                </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="form-group" style="padding: 15px">
                <div class="btn-group">
                    @if ($errors->any())
                        <div class="error-message">
                            <i class="fas fa-exclamation-triangle"></i> {{ $errors->first() }}
                        </div>
                    @endif
                    <button type="submit" name="btnSave" class="btn-submit-answer" id="btnSave"><i class="fas fa-send"></i> Submit Answer</button>
                    <div id="box-loader">
                        <div id="loader"></div>
                    </div>
                </div>
            </div>    
        </div>
    </form>
</div>