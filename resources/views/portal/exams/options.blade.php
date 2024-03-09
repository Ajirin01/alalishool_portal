@extends('layouts.admin_layout')

@section('portal-content')
    
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

        <form action="{{ route('manage-exams') }}" method="get">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Year</label>
                            <select name="year_id" id="year-id" class="form-control select2" style="width: 100%;" required>
                                {{-- <option selected="selected">option comes here</option> --}}
                                <option value="">Select Year</option>
                                @foreach ($years as $year)
                                    <option value="{{ $year->id }}">{{ $year->year }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Term</label>
                            <select name="term_id" id="term-id" class="form-control select2" style="width: 100%;" required>
                                {{-- <option selected="selected">option comes here</option> --}}
                                <option value="">Select Term</option>
                                @foreach ($terms as $term)
                                    <option value="{{ $term->id }}"> {{ $term->name  }} </option>
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