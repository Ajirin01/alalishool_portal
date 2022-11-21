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
                    <label for="title">Title</label>
                    <input type="text" name="" id="title-add" class="form-control" placeholder="enter exam title" onchange="handleTitleChange()">
                </div>

                <div class="form-group">
                    <label for="title">Descriptions</label>
                    <textarea name="" id="description-add" cols="30" rows="5" class="form-control" onchange="handleDescriptionChange()"></textarea>
                </div>

                <div class="form-group">
                    <label for="title">Start Date</label>
                    <input type="date" class="form-control" name="" id="start-date-add" onchange="handleStartDateChange()">
                </div>

                <div class="form-group">
                    <label for="title">End Date</label>
                    <input type="date" class="form-control" name="" id="end-date-add" onchange="handleEndDateChange()">
                </div>

                <select name="" id="status-add" class="form-control" onchange="handleStatusChange()">
                    <option value="">Select Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>

<button class="btn btn-primary" onclick="addExam('exam')">Submit</button>

