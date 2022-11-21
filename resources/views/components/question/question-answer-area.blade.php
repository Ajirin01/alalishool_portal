<li id="question_answer{{$answerId}}li">
    <span class="{{ $correct ? 'text-success' : 'text-danger' }}" id="question_answer{{$answerId}}output">{{ $answer }}</span>

    {{-- edit question answer modal --}}
    <div class="modal fade" id="modal-xl{{$answerId}}question_answer">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit answer</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                      <div class="card card-outline card-info">
                        <div class="card-body">
                          <textarea id="summernote{{$answerId}}question_answer">
                            {{ $answer }}
                          </textarea>

                          <div>
                            <input type="radio" id="correct{{$answerId}}" value="1" name="correct{{$answerId}}" onchange="handCorrectChanged()">
                            <label for="correct">Correct</label>
                          </div>
                          <div>
                            <input type="radio" id="incorrect{{$answerId}}" value="0" name="correct{{$answerId}}" onchange="handCorrectChanged()">
                            <label for="incorrect">Incorrect</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.col-->
                  </div>
                  <!-- ./row -->
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="closeupdate{{$answerId}}question_answer">Close</button>
                <button type="button" id="{{ $answerId }}" class="btn btn-primary" onclick="updateAnswer({{$answerId}}, 'question_answer')">Save changes</button>
            </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <span data-toggle="modal" data-target="#modal-xl{{$answerId}}question_answer" onclick="initTextArea('summernote'+{{$answerId}}+'question_answer')"><i class="fa fa-edit" ></i></span>
    {{-- /. edit question answer modal --}}

    {{-- delete answer --}}
    <div class="modal fade" id="modal-danger{{$answerId}}question_answer">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Delete Warning</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete this record?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal" id="closedelete{{$answerId}}question_answer">Close</button>
              <button type="button" class="btn btn-outline-light" onclick="deleteRecord({{$answerId}}, 'question_answer', 'li')">Yes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    <span data-toggle="modal" data-target="#modal-danger{{$answerId}}question_answer"><i class="fa fa-trash"></i></span>
    <!-- /.modal -->
    {{-- /. delete anser --}}
</li>