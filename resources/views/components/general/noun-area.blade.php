<td>
    <span id="{{$noun}}{{$id}}output">
        {{$name}}
    </span>
</td>
<td>
    <div>
        {{-- {{$noun}} edit model --}}
        <div class="modal fade" id="modal-xl{{$id}}{{$noun}}">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit {{$noun}}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                            <div class="card card-outline card-info">
                                <div class="card-body">
                                    <input type="text" name="" id="text{{$id}}{{$noun}}" class="form-control" value="{{ $name }}">
                                </div>
                            </div>
                            </div>
                            <!-- /.col-->
                        </div>
                        <!-- ./row -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="closeupdate{{$id}}{{$noun}}">Close</button>
                        <button type="button" class="btn btn-primary" onclick="update({{$id}}, {{json_encode($noun)}})">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <span data-toggle="modal" data-target="#modal-xl{{$id}}{{$noun}}"><i class="fa fa-edit" ></i></span>
    
        {{-- {{$noun}} delete model --}}
        <div class="modal fade" id="modal-danger{{$id}}{{$noun}}">
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
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal" id="closedelete{{$id}}{{$noun}}">Close</button>
                    <button type="button" class="btn btn-outline-light" onclick="deleteRecord({{$id}}, {{json_encode($noun)}}, 'row')">Yes</button>
                </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <span data-toggle="modal" data-target="#modal-danger{{$id}}{{$noun}}"><i class="fa fa-trash"></i></span>
        <!-- /.modal -->
    
        {{-- /. {{$noun}} modal --}}
    
    </div>
</td>






