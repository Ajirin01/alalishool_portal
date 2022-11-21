@extends('layouts.admin_layout')

@section('admin-content')
    
     <!-- SELECT2 EXAMPLE -->
    <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Please Select Class</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->

        <form action="{{ route('manage-students') }}" method="get">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Class</label>
                            <select name="classes_id" id="year-id" class="form-control select2" style="width: 100%;" required>
                                {{-- <option selected="selected">option comes here</option> --}}
                                <option value="">Select Class</option>
                                @if (Auth::user()->role == "teacher")
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->classes_id }}">{{ $class->classes_name }}</option>
                                    @endforeach
                                @endif
                                @if (Auth::user()->role == "admin")
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
    
                    <div class="col-md-12">
                        <input type="submit" value="Manage students" class="btn btn-primary form-control">
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </form>
        
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection 