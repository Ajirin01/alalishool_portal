<td>
    <span id="studentName{{$id}}output">
        {{$name}}
    </span>
    
</td>

<td>
    <span id="studentAdmissionNumber{{$id}}output">
        {{$email}}
    </span>
</td>

<td>
    <div>
        {{-- student View model --}}
        <div class="modal fade" id="modal-xl{{$id}}student-view">
            <div class="modal-dialog modal-xl{{$id}}student">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-name">View student</h4>
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
                                            <label for="name">Admission Number</label>
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
                        <button type="button" class="btn btn-primary form-control" data-dismiss="modal" id="closeview{{$id}}student">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <span data-toggle="modal" data-target="#modal-xl{{$id}}student-view"><i class="fa fa-eye" ></i></span>


        {{-- student edit model --}}
        <div class="modal fade" id="modal-xl{{$id}}student">
            <div class="modal-dialog modal-xl{{$id}}student">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-name">Edit student</h4>
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
                                            <input type="text" name="" id="name-edit{{$id}}" class="form-control" placeholder="enter student name" value="{{ $name }}" onchange="handleNameChange()">
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="" id="email-edit{{$id}}" class="form-control" placeholder="enter student email" value="{{ $email }}" onchange="handleEmailChange()">
                                        </div>

                                        <div class="form-group">
                                            <label for="phone">Phone Number</label>
                                            <input type="tel" name="" id="phone-edit{{$id}}" class="form-control" placeholder="enter student phone number" value="{{ $phone }}" onchange="handlePhoneChange()">
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
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="closeupdate{{$id}}student">Close</button>
                        <button type="button" class="btn btn-primary" onclick="updateStudent({{$id}}, 'student')">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <span data-toggle="modal" data-target="#modal-xl{{$id}}student"><i class="fa fa-edit" ></i></span>
    
        {{-- student delete model --}}
        <div class="modal fade" id="modal-danger{{$id}}student">
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
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal" id="closedelete{{$id}}student">Close</button>
                    <button type="button" class="btn btn-outline-light" onclick="deleteRecord({{$id}}, 'student', 'row')">Yes</button>
                </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <span data-toggle="modal" data-target="#modal-danger{{$id}}student"><i class="fa fa-trash"></i></span>
        <!-- /.modal -->
    
        {{-- /. student modal --}}
        
        {{-- result view --}}
        <a href="{{ route('report', ['studentId'=> $id]) }}"><i class="fa fa-book"></i></a>
    </div>
</td>






