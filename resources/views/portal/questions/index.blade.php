@extends('layouts.admin_layout')

@section('portal-content')
    @push('typemath-scripts')
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
        <script type="text/javascript" src="{{URL::to('/typemath/tinymce6/tinymce.min.js')}}"></script>
    @endpush
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-five-overlay-dark-tab" data-toggle="pill" href="#custom-tabs-five-overlay-dark" role="tab" aria-controls="custom-tabs-five-overlay-dark" aria-selected="true">Questions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-five-overlay-dark-tab2" data-toggle="pill" href="#custom-tabs-five-overlay-dark2" role="tab" aria-controls="custom-tabs-five-overlay-dark2">Add Questions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-five-overlay-dark-tab3" data-toggle="pill" href="#custom-tabs-five-overlay-dark3" role="tab" aria-controls="custom-tabs-five-overlay-dark3">Import Questions</a>
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

                                                            <ul id="answer-list{{ $question->id }}" style="list-style: circle">
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

                        {{-- Import Questions --}}
                        <div class="tab-pane fade show" id="custom-tabs-five-overlay-dark3" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-dark-tab2">
                            <div class="overlay-wrapper">
                                {{-- add question component --}}
                                <div style="display: none; text-align: center" class="overlay dark" id="ajax-loader2"><i style="position: fixed; margin-top: 20vh" class="fas fa-3x fa-sync-alt fa-spin"></i></div>
                                <x-question.question-import :options="$options" />
                            </div>
                            {{-- /. Add Question --}}
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ URL::to('typemath/tinymce6/plugins/tiny_mce_wiris/integration/WIRISplugins.js?viewer=image') }}"></script>
	<script>
		tinymce.init({
			selector: '.textArea',
			language: 'en',
			directionality : 'ltr',
			auto_focus:true,
			menu: {
				mathtype: {title: 'Maths', items: 'tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry'}
			},
			menubar : 'mathtype',
			plugins: 'tiny_mce_wiris image table lists',
			/* enable title field in the Image dialog*/
			image_title: true,
			/* enable automatic uploads of images represented by blob or data URIs*/
			automatic_uploads: true,
			/*
				URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
				images_upload_url: 'postAcceptor.php',
				here we add custom filepicker only to Image dialog
			*/
			file_picker_types: 'image',
			/* and here's our custom image picker*/
			file_picker_callback: function (cb, value, meta) {
				var input = document.createElement('input');
				input.setAttribute('type', 'file');
				input.setAttribute('accept', 'image/*');

				/*
				Note: In modern browsers input[type="file"] is functional without
				even adding it to the DOM, but that might not be the case in some older
				or quirky browsers like IE, so you might want to add it to the DOM
				just in case, and visually hide it. And do not forget do remove it
				once you do not need it anymore.
				*/

				input.onchange = function () {
				var file = this.files[0];

				var reader = new FileReader();
				reader.onload = function () {
					/*
					Note: Now we need to register the blob in TinyMCEs image blob
					registry. In the next release this part hopefully won't be
					necessary, as we are looking to handle it internally.
					*/
					var id = 'blobid' + (new Date()).getTime();
					var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
					var base64 = reader.result.split(',')[1];
					// var base64 = "data:"+file.type+";base64, " + reader.result.split(',')[1];
					var blobInfo = blobCache.create(id, file, base64);
					blobCache.add(blobInfo);

					// console.log(blobCache)

					/* call the callback and populate the Title field with the file name */
					cb(blobInfo.blobUri(), { title: file.name });
					// cb(base64, { title: file.name });
				};
				reader.readAsDataURL(file);
				};

				input.click();
			},
			content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
			toolbar: 'bold italic underline | image table | align fontSize bullist numlist | outdent indent lists | cut copy paste | undo redo |fontselect fontsizeselect',
			mathTypeParameters : {'editorParameters' : {'fontSize' : '26px'}},
			setup : function(ed)
			{
				ed.on('init', function()
				{
					this.getDoc().body.style.fontSize = '16px';
					this.getDoc().body.style.fontFamily = 'Arial, "Helvetica Neue", Helvetica, sans-serif';
				});
			},

		});
	</script>

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
                answer: tinymce.get(textAreaID).getContent(),
                correct: Number(correct)
            }

            updateData(data, id, noun)
        }

        function updateQuestion(id, noun){
            let textAreaID = "summernote" + id + noun

            let data = {
                question: tinymce.get(textAreaID).getContent()
            }

            updateData(data, id, noun)
        }
    </script>
@endsection