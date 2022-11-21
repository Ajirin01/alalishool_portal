<td>
    <span id="examPaperTitle{{$id}}output">
        {{$name}}
    </span>
</td>
<td>
    <span id="examPaperDuration{{$id}}output">
        {{$duration}}
    </span>
</td>

<td>
    <span id="examPaperStartTime{{$id}}output">
        {{$startTime}}
    </span>
</td>

<td>
    <span id="examPaperStatus{{$id}}output">
        {{$status}}
    </span>
</td>

<td>
    <div>
        {{-- exam-paper edit model --}}
        <div class="modal fade" id="modal-xl{{$id}}exam-paper">
            <div class="modal-dialog modal-xl{{$id}}exam-paper">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit exam paper</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-outline card-info">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="title">Name</label>
                                            <input type="text" name="" id="name-edit{{$id}}" class="form-control" value="{{ $name }}" placeholder="enter exam name" onchange="handleNameChange()">
                                        </div>

                                        <div class="form-group">
                                            <label for="title">Instructions</label>
                                            <textarea name="" id="instruction-edit{{$id}}" class="form-control" placeholder="enter exam instructions" cols="30" rows="5" onchange="handleInstructionsChange()">{{ $instruction }}</textarea>
                                            {{-- <input type="text" name="" id="instruction-add" class="form-control" placeholder="enter exam name" onchange="handleInstructionsChange()"> --}}
                                        </div>
                        
                                        <div class="form-group">
                                            <label for="title">Duration</label>
                                            <input type="number" name="" id="duration-edit{{$id}}" min="0" class="form-control" value="{{ $duration }}" placeholder="enter exam duration" onchange="handleDurationChange()">
                                        </div>
                        
                                        <div class="form-group">
                                            <label for="title">Start date and time</label>
                                            <input type="datetime-local" class="form-control" value="{{ $startTime }}" name="" id="start-time-edit{{$id}}" onchange="handleStartTimeChange()">
                                        </div>

                                        <div class="form-group">
                                            <label for="title">Status</label>
                                            <select name="" id="status-edit{{$id}}" class="form-control" onchange="handleStatusChange()">
                                                <option value="{{ $status == 'active' ? 'active' : 'inactive' }}">{{ $status == 'active' ? 'Active' : 'Inactive' }}</option>
                                                <option value="{{ $status == 'active' ? 'inactive' : 'active' }}">{{ $status == 'active' ? 'Inactive' : 'Active' }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-->
                        </div>
                        <!-- ./row -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="closeupdate{{$id}}exam-paper">Close</button>
                        <button type="button" class="btn btn-primary" onclick="updateExamPaper({{$id}}, 'exam_paper')">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <span data-toggle="modal" data-target="#modal-xl{{$id}}exam-paper"><i class="fa fa-edit" ></i></span>
    
        {{-- exam-paper delete model --}}
        <div class="modal fade" id="modal-danger{{$id}}exam-paper">
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
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal" id="closedelete{{$id}}exam_paper">Close</button>
                    <button type="button" class="btn btn-outline-light" onclick="deleteRecord({{$id}}, 'exam_paper', 'row')">Yes</button>
                </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <span data-toggle="modal" data-target="#modal-danger{{$id}}exam-paper"><i class="fa fa-trash"></i></span>
        <!-- /.modal -->
    
        {{-- /. exam-paper modal --}}
    
    </div>
</td>






