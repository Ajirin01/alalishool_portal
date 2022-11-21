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

        <form action="{{ route('manage-questions') }}" method="get">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Year</label>
                            <select name="year_id" id="year-id" class="form-control select2" style="width: 100%;" onchange="loadExams()" required>
                                {{-- <option selected="selected">option comes here</option> --}}
                                <option value="">Select Year</option>
                                @foreach ($years as $year)
                                    <option value="{{ $year->id }}">{{ $year->year }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Class</label>
                            <select name="classes_id" id="classes-id" class="form-control select2" style="width: 100%;" required>
                                {{-- <option selected="selected">option comes here</option> --}}
                                <option value="">Select class</option>
                                @if (Auth::user()->role == "admin")
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                @endif

                                @if (Auth::user()->role == "teacher")
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->classes_id }}">{{ $class->classes_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Exam</label>
                            <select name="exam_id" id="exam-id" class="form-control select2" style="width: 100%;" onchange="setExam()" required>
                                {{-- <option selected="selected">option comes here</option> --}}
                                <option value="">Select Exam</option>
                            </select>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Subject</label>
                            <select name="subject_id" id="subject-id" class="form-control select2" style="width: 100%;" onchange="loadExamPapers()" required>
                                {{-- <option selected="selected">option comes here</option> --}}
                                <option value="">Select Subjects</option>
                                @if (Auth::user()->role == "admin")
                                   @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}"> {{ $subject->name  }} </option>
                                    @endforeach
                                @endif

                                @if (Auth::user()->role == "teacher")
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->subject_id }}"> {{ $subject->subject_name  }} </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Exam Paper</label>
                            <select name="exam_paper_id" id="exam-paper-id" class="form-control select2" style="width: 100%;" required>
                                {{-- <option selected="selected">option comes here</option> --}}
                                <option value="">Select Exam Paper</option>
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
    
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

    <script>
        var years = {{ Js::from($years) }}
        var exams = []
        var exam = {}
        var exam_papers = []
        var exam_paper = {}

        // console.log(years)

        function getDataById(obj, id){
            const data = obj.filter(item => {
                if(item.id == id){
                    return item
                }
            })

            return data
        }
        
        function loadExams(){
            let selected = event.target.id.split('-')
            let value = selected[selected.length - 1]
            let year = getDataById(years, value)

            document.getElementById("exam-id").innerHTML = ""
            $("#exam-id").append("<option value=''>Select Exam</option>")
            
            year.forEach(yr => {
                let _exams = yr.exams
                

                _exams.forEach(exam=> {
                    exams.push(exam)
                    console.log(exam)
                    $("#exam-id").append("<option value='"+ exam.id +"'>"+ exam.title +"</option>")
                })
            });
            // console.log(year, value)
            $('#claases-id').val(null).trigger('change')
            $('#exam-id').val(null).trigger('change')
            $('#subject-id').val(null).trigger('change')
        }

        function setExam(){
            let selected = event.target.id.split('-')
            let id = selected[selected.length - 1]
            exam = getDataById(exams, id)
            // console.log("Exam from setExam" , exam , id)

            $('#subject-id').val(null).trigger('change')
        }

        function loadExamPapers(){
            let selected_subject = event.target.id.split('-')
            let subject_id = selected_subject[selected_subject.length - 1]

            let selected_exam = document.getElementById("exam-id").value

            let selected_class = document.getElementById("classes-id").value

            const fields = {
                classes_id: selected_class,
                subject_id,
                exam_id: selected_exam
            }
            
            // console.log("exam from loadExamPapers ", exam)

            const queryObject = new ArrayQuery(exam[0].exam_papers)

            if(fields.classes_id != "" && fields.subject_id != "" && fields.exam_id != ""){
                let exam_papers = queryObject.selectWhere(fields)
            
                document.getElementById("exam-paper-id").innerHTML = ""
                $("#exam-paper-id").append("<option value=''>Select Exam Paper</option>")
                
                exam_papers.forEach(exm_pp => {
                    $("#exam-paper-id").append("<option value='"+ exm_pp.id +"'>"+ exm_pp.name +"</option>")
                })
            }
        }
    </script>
@endsection 