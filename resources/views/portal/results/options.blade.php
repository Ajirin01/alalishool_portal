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

        <form action="{{ route('manage-results') }}" method="get">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Exam</label>
                            <select name="exam_id" id="exam-id" class="form-control select2" style="width: 100%;" onchange="loadExamPapers()" required>
                                {{-- <option selected="selected">option comes here</option> --}}
                                <option value="">Select Exam</option>
                                @foreach ($exams as $exam)
                                    <option value="{{$exam->id}}">{{$exam->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Exam Paper</label>
                            <select name="exam_paper_id" id="exam-paper-id" class="form-control select2" style="width: 100%;" required>
                                {{-- <option selected="selected">option comes here</option> --}}
                                <option value="">Select Exam Paper</option>
                            </select>
                        </div>
                        <!-- /.form-group -->
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
    
    
                    <div class="col-md-12">
                        <input type="submit" value="Manage results" class="btn btn-primary form-control">
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </form>
        
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <script>
        function loadExams(){
            let selected = event.target.id.split('-')
            let value = selected[selected.length - 1]

            fetch("{{ URL::to('') }}/api/query_exams_table", {
                method: "POST",
                headers: {
                    'Content-type': 'application/json'
                },
                body: JSON.stringify({year_id: value})
            }).
            then(response => response.json()).
            then(exam =>{
                exam.forEach(exam => {
                    $("#exam-id").append("<option value='"+ exam.id +"'>"+ exam.title +"</option>")
            
                });
                // console.log(year, value)
                $('#claases-id').val(null).trigger('change')
                $('#exam-id').val(null).trigger('change')
                $('#subject-id').val(null).trigger('change')
            })
        }


        function loadExamPapers(){
            document.getElementById("exam-paper-id").innerHTML = ""
            $("#exam-paper-id").append("<option value=''>Select Exam Paper</option>")

            let selected_exam = event.target.id.split('-')
            let value = selected_exam[selected_exam.length - 1]

            fetch("{{ URL::to('') }}/api/query_exam_papers_table", {
                method: "POST",
                headers: {
                    'Content-type': 'application/json'
                },
                body: JSON.stringify({exam_id: value})
            }).
            then(response => response.json()).
            then(exam_papers =>{
                exam_papers.forEach(exm_pp => {
                    $("#exam-paper-id").append("<option value='"+ exm_pp.id +"'>"+ exm_pp.name +"</option>")
                })
            })
            
        }
    </script>
@endsection 