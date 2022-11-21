@extends('layouts.admin_layout')

@section('admin-content')
    
     <!-- SELECT2 EXAMPLE -->
    <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Please Select options</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->

        <form action="{{ route('manage-exam-papers') }}" method="get">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Class</label>
                            <select name="classes_id" id="class-id" class="form-control select2" style="width: 100%;" required>
                                {{-- <option selected="selected">option comes here</option> --}}
                                <option value="">Select Class</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Subject</label>
                            <select name="subject_id" id="subject-id" class="form-control select2" style="width: 100%;" required>
                                {{-- <option selected="selected">option comes here</option> --}}
                                <option value="">Select Subject</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}"> {{ $subject->name  }} </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Exam</label>
                            <select name="exam_id" id="subject-id" class="form-control select2" style="width: 100%;" required>
                                {{-- <option selected="selected">option comes here</option> --}}
                                <option value="">Select Exam</option>
                                @foreach ($exams as $exam)
                                    <option value="{{ $exam->id }}"> {{ $exam->title  }} ({{ $exam->descripton }}) </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
    
                    <div class="col-md-12">
                        <input type="submit" value="Manage questions" class="btn btn-primary form-control">
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </form>
        
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection 