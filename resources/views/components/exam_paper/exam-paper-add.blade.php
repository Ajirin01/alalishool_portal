<div class="card card-default">
    <div class="card-header">
    <h3 class="card-title">Exam Paper Details</h3>

    <div class="card-tools">
        <button type="button" id="collapse-exam-paper-area" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
        </button>
    </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Name</label>
                    <input type="text" name="" id="name-add" class="form-control" placeholder="enter exam name" onchange="handleNameChange()">
                </div>

                <div class="form-group">
                    <label for="title">Instructions</label>
                    <textarea name="" id="instruction-add" class="form-control" placeholder="enter exam instructions" cols="30" rows="5" onchange="handleInstructionsChange()"></textarea>
                    {{-- <input type="text" name="" id="instruction-add" class="form-control" placeholder="enter exam name" onchange="handleInstructionsChange()"> --}}
                </div>

                <div class="form-group">
                    <label for="title">Duration</label>
                    <input type="number" name="" id="duration-add" min="0" class="form-control" placeholder="enter exam duration" onchange="handleDurationChange()">
                </div>

                <div class="form-group">
                    <label for="title">Start date and time</label>
                    <input type="datetime-local" class="form-control" name="" id="start-time-add" onchange="handleStartTimeChange()">
                </div>

                <div class="form-group">
                    <label for="title">Status</label>
                    <select name="" id="status-add" class="form-control" onchange="handleStatusChange()">
                        <option value="">Select Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>

<button class="btn btn-primary" onclick="addExamPaper('exam-paper')">Submit</button>

