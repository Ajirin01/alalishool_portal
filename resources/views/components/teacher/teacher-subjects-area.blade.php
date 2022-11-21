<li id="teacher_subject{{$id}}li">
  <span id="teacher_subjects{{$id}}output">{{ $name }}</span>

  {{-- delete subjects --}}
  <div class="modal fade" id="modal-danger{{$id}}subjects">
      <div class="modal-dialog">
        <div class="modal-content bg-danger">
          <div class="modal-header">
            <h4 class="modal-title">Delete Warning</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to unassign this class?</p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-dismiss="modal" id="closedelete{{$id}}teacher_subject">Close</button>
            <button type="button" class="btn btn-outline-light" onclick="deleteRecord({{$id}}, 'teacher_subject', 'li')">Yes</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  <span data-toggle="modal" data-target="#modal-danger{{$id}}subjects"><i class="fa fa-times"></i></span>
  <!-- /.modal -->
  {{-- /. delete anser --}}
</li>