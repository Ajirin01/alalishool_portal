@extends('layouts.admin_layout')

@section('admin-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-five-overlay-dark-tab" data-toggle="pill" href="#custom-tabs-five-overlay-dark" role="tab" aria-controls="custom-tabs-five-overlay-dark" aria-selected="true">Questions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-five-overlay-dark-tab2" data-toggle="pill" href="#custom-tabs-five-overlay-dark2" role="tab" aria-controls="custom-tabs-five-overlay-dark2">Questions</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-five-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-five-overlay-dark" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-dark-tab">
                            <div class="overlay-wrapper">
                                <div style="display: none; text-align: center" class="overlay dark" id="ajax-loader"><i style="position: fixed; margin-top: 20vh" class="fas fa-3x fa-sync-alt fa-spin"></i></div>

                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Switch between tabs to manage your question and andwers</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Question and answers</th>
                                                </tr>
                                            </thead>
                                            <tbody id="question-table-body">
                                                @foreach ($questions as $i =>  $question)
                                                    <tr id="question{{$question->id}}row">
                                                        <td>{{ $i + 1 }}</td>
                                                        <td>
                                                            {{-- render question component --}}
                                                            <x-question.question-area :questionId="$question->id" :question="$question->question"  />

                                                            <ul id="answer-list{{ $question->id }}">
                                                                @foreach ($question->question_answers as $j =>  $answer)
                                                                    {{-- render answer component --}}
                                                                    <x-question.question-answer-area :answerId="json_decode($answer)->id" :answer="json_decode($answer)->answer" :correct="json_decode($answer)->correct" />
                                                                @endforeach
                                                            </ul>

                                                            {{-- add new answer item --}}
                                                            <x-question.question-answer-add :questionId="$question->id" />
                                                            {{-- /. add new andwer item  --}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Question and answers</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>

                        {{-- Add Questions --}}
                        <div class="tab-pane fade show" id="custom-tabs-five-overlay-dark2" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-dark-tab2">
                            <div class="overlay-wrapper">
                                {{-- add question component --}}
                                <div style="display: none; text-align: center" class="overlay dark" id="ajax-loader2"><i style="position: fixed; margin-top: 20vh" class="fas fa-3x fa-sync-alt fa-spin"></i></div>
                                <x-question.question-add />
                            </div>
                            {{-- /. Add Question --}}
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>

    <script>
        var correct = 0
        const options = {{Js::from($options)}}; 
        console.log(options)

        function handCorrectChanged(){
            correct = event.target.value
        }

        function changeAnswerOutputStyle(noun, updateID, res){
            if(res.data.correct != undefined){
                if(res.data.correct){
                    $("#" + noun + updateID + "output").removeClass("text-danger")
                    $("#" + noun + updateID + "output").addClass("text-success")
                }else{
                    $("#" + noun + updateID + "output").removeClass("text-success")
                    $("#" + noun + updateID + "output").addClass("text-danger") 
                }
            }
        }

        function updateAnswer(id, noun){
            let textAreaID = "summernote" + id + noun

            let data = {
                answer: $("#"+textAreaID).summernote('code'),
                correct: Number(correct)
            }

            updateData(data, id, noun)
        }

        function updateQuestion(id, noun){
            let textAreaID = "summernote" + id + noun

            let data = {
                question: $("#"+textAreaID).summernote('code')
            }

            updateData(data, id, noun)
        }
    </script>
@endsection