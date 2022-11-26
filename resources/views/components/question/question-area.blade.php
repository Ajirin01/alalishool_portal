<div>
    <span id="question{{$questionId}}output">
        @php
            echo $question;
        @endphp
        {{-- {{ $question }} --}}
    </span>

    {{-- question modal --}}
    {{-- question edit model --}}
    <div class="modal fade" id="modal-xl{{$questionId}}question">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit question</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="card card-outline card-info">
                            <div class="card-body">
                                <div class="textArea" id="summernote{{$questionId}}question">
                                    @php
                                        echo $question;
                                    @endphp
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- /.col-->
                    </div>
                    <!-- ./row -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="closeupdate{{$questionId}}question">Close</button>
                    <button type="button" class="btn btn-primary" onclick="updateQuestion({{$questionId}}, 'question')">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <span data-toggle="modal" data-target="#modal-xl{{$questionId}}question"><i class="fa fa-edit" ></i></span>

    {{-- question delete model --}}
    <div class="modal fade" id="modal-danger{{$questionId}}question">
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
                <button type="button" class="btn btn-outline-light" data-dismiss="modal" id="closedelete{{$questionId}}question">Close</button>
                <button type="button" class="btn btn-outline-light" onclick="deleteRecord({{$questionId}}, 'question', 'row')">Yes</button>
            </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <span data-toggle="modal" data-target="#modal-danger{{$questionId}}question"><i class="fa fa-trash"></i></span>
    <!-- /.modal -->

    {{-- /. question modal --}}

</div>