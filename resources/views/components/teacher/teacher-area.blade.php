<td>
    <span id="teacherName{{$id}}output" style="float: left">
        {{$name}}
    </span>
    <div style="float: right">
        {{-- teacher View model --}}
        <div class="modal fade" id="modal-xl{{$id}}teacher-view">
            <div class="modal-dialog modal-xl{{$id}}teacher">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-name">View teacher</h4>
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
                                            <label for="name">Name</label>
                                            <input type="text" name="" class="form-control" value="{{ $name }}" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="name">Email</label>
                                            <input type="email" name="" class="form-control" value="{{ $email }}" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="name">Phone Number</label>
                                            <input type="tel" name="" class="form-control" value="{{ $phone }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-->
                        </div>
                        <!-- ./row -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-primary form-control" data-dismiss="modal" id="closeview{{$id}}teacher">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <span data-toggle="modal" data-target="#modal-xl{{$id}}teacher-view"><i class="fa fa-eye" ></i></span>


        {{-- teacher edit model --}}
        <div class="modal fade" id="modal-xl{{$id}}teacher">
            <div class="modal-dialog modal-xl{{$id}}teacher">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-name">Edit teacher</h4>
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
                                            <label for="name">Name</label>
                                            <input type="text" name="" id="name-edit{{$id}}" class="form-control" placeholder="enter teacher name" value="{{ $name }}" onchange="handleNameChange()">
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="" id="email-edit{{$id}}" class="form-control" placeholder="enter teacher email" value="{{ $email }}" onchange="handleEmailChange()">
                                        </div>

                                        <div class="form-group">
                                            <label for="phone">Phone Number</label>
                                            <input type="tel" name="" id="phone-edit{{$id}}" class="form-control" placeholder="enter teacher phone number" value="{{ $phone }}" onchange="handlePhoneChange()">
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password  <small>N.B. leave empty to retain old password</small> </label>
                                            <input type="text" name="" id="password-edit{{$id}}" class="form-control" onchange="handlePasswordChange()">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-->
                        </div>
                        <!-- ./row -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="closeupdate{{$id}}teacher">Close</button>
                        <button type="button" class="btn btn-primary" onclick="updateTeacher({{$id}}, 'teacher')">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <span data-toggle="modal" data-target="#modal-xl{{$id}}teacher"><i class="fa fa-edit" ></i></span>
    
        {{-- teacher delete model --}}
        <div class="modal fade" id="modal-danger{{$id}}teacher">
            <div class="modal-dialog">
                <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-name">Delete Warning</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this record?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal" id="closedelete{{$id}}teacher">Close</button>
                    <button type="button" class="btn btn-outline-light" onclick="deleteRecord({{$id}}, 'teacher', 'row')">Yes</button>
                </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <span data-toggle="modal" data-target="#modal-danger{{$id}}teacher"><i class="fa fa-trash"></i></span>
        <!-- /.modal -->
    
        {{-- /. teacher modal --}}
    
    </div>
</td>






