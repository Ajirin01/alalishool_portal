<td>
    <span id="examTitle{{$id}}output">
        {{$title}}
    </span>
</td>
<td>
    <span id="examDescription{{$id}}output">
        {{$description}}
    </span>
</td>

<td>
    <span id="examStartDate{{$id}}output">
        {{$startDate}}
    </span>
</td>

<td>
    <span id="examEndDate{{$id}}output">
        {{$endDate}}
    </span>
</td>

<td>
    <span id="examStatus{{$id}}output">
        {{$status}}
    </span>
</td>

<td>
    <div>
        {{-- exam edit model --}}
        <div class="modal fade" id="modal-xl{{$id}}exam">
            <div class="modal-dialog modal-xl{{$id}}exam">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit exam</h4>
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
                                            <label for="title">Title</label>
                                            <input type="text" name="" id="title-edit{{$id}}" class="form-control" placeholder="enter exam title" value="{{ $title }}" onchange="handleTitleChange()">
                                        </div>
                        
                                        <div class="form-group">
                                            <label for="title">Descriptions</label>
                                            <textarea name="" id="description-edit{{$id}}" cols="30" rows="3" class="form-control" onchange="handleDescriptionChange()">{{ $description }}</textarea>
                                        </div>
                        
                                        <div class="form-group">
                                            <label for="title">Start Date</label>
                                            <input type="date" class="form-control" name="" id="start-date-edit{{$id}}" value="{{ $startDate }}" onchange="handleStartDateChange()">
                                        </div>
                        
                                        <div class="form-group">
                                            <label for="title">End Date</label>
                                            <input type="date" class="form-control" name="" id="end-date-edit{{$id}}" value="{{ $endDate }}" onchange="handleEndDateChange()">
                                        </div>
                        
                                        <select name="" id="status-edit{{$id}}" class="form-control" onchange="handleStatusChange()">
                                            <option value="{{ $status == 'active' ? 'active' : 'inactive' }}">{{ $status == 'active' ? 'Active' : 'Inactive' }}</option>
                                            <option value="{{ $status == 'active' ? 'inactive' : 'active' }}">{{ $status == 'active' ? 'Inactive' : 'Active' }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-->
                        </div>
                        <!-- ./row -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="closeupdate{{$id}}exam">Close</button>
                        <button type="button" class="btn btn-primary" onclick="updateExam({{$id}}, 'exam')">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <span data-toggle="modal" data-target="#modal-xl{{$id}}exam"><i class="fa fa-edit" ></i></span>
    
        {{-- exam delete model --}}
        <div class="modal fade" id="modal-danger{{$id}}exam">
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
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal" id="closedelete{{$id}}exam">Close</button>
                    <button type="button" class="btn btn-outline-light" onclick="deleteRecord({{$id}}, 'exam', 'row')">Yes</button>
                </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <span data-toggle="modal" data-target="#modal-danger{{$id}}exam"><i class="fa fa-trash"></i></span>
        <!-- /.modal -->
    
        {{-- /. exam modal --}}
    
    </div>
</td>
<script>

</script>






