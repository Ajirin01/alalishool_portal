<div class="overlay-wrapper">
    <div style="display: none; text-align: center" class="overlay dark" id="ajax-loader"><i style="position: fixed; margin-top: 40vh" class="fas fa-3x fa-sync-alt fa-spin"></i></div>


<div>
    {{-- profile View model --}}
    <div class="modal fade" id="modal-xl-profile-view">
        <div class="modal-dialog modal-xl-profile-view">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-name">My Profile</h4>
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
                                        <input type="text" name="" class="form-control" value="{{ Auth::user()->name }}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Login ID/Email</label>
                                        <input type="email" name="" class="form-control" value="{{ Auth::user()->email }}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Phone Number</label>
                                        <input type="tel" name="" class="form-control" value="{{ Auth::user()->phone }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-->
                    </div>
                    <!-- ./row -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-primary form-control" data-dismiss="modal" id="closeviewprofile">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- profile edit model --}}
    <div class="modal fade" id="modal-xl-profile-edit">
        <div class="modal-dialog modal-xl-profile-edit">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-name">Edit Profile</h4>
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
                                        <input type="text" name="" id="name-edit-profile" class="form-control" placeholder="enter name" value="{{ Auth::user()->name }}" onchange="handleNameChange()">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Login ID / Email</label>
                                        <input type="email" name="" id="email-edit-profile" class="form-control" placeholder="enter email" value="{{ Auth::user()->email }}" onchange="handleEmailChange()">
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input type="tel" name="" id="phone-edit-profile" class="form-control" placeholder="enter phone number" value="{{ Auth::user()->phone }}" onchange="handlePhoneChange()">
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password  <small>N.B. leave empty to retain old password</small> </label>
                                        <input type="text" name="" id="password-edit-profile" class="form-control" onchange="handlePasswordChange()">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-->
                    </div>
                    <!-- ./row -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="closeupdate-profile">Close</button>
                    <button type="button" class="btn btn-primary" onclick="updateProfile({{Auth::user()->id}}, {{json_encode(Auth::user()->role)}})">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>

</div>

</div>