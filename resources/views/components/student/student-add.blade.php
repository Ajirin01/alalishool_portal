<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Exam Details</h3>

        <div class="card-tools">
            <button type="button" id="collapse-exam-area" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="" id="name-add" class="form-control" placeholder="enter student name" onchange="handleNameChange()">
                </div>

                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="email" name="" id="email-add" class="form-control" placeholder="enter student email" onchange="handleEmailChange()">
                </div>

                <div class="form-group">
                    <label for="name">Phone Number</label>
                    <input type="tel" name="" id="phone-add" class="form-control" placeholder="enter student phone number" onchange="handlePhoneChange()">
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>

<button class="btn btn-primary" onclick="addStudent('student')">Submit</button>

