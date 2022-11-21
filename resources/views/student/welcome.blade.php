@extends('layouts.exam_layout')
@section('header-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Welcome Back!</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
                    <span>
                        {{date("Y-m-d")}} 
                    </span>
                     <span id="clock"></span>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection

@section('main-content')
    <!-- Main content -->
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0">Welcome {{ Auth::user()->name }}</h5>
                    </div>

                    <div id="loading">Loading...</div>

                    {{-- exam exist and student can take exam --}}
                    <div class="card-body" id="exam-paper-exist" style="display: none">
                        <h6 class="card-title">Exam is ready</h6>

                        <p class="card-text">Please read instructions before attempting exams questions</p> 

                        <h4>Instructions</h4>
                        <p id="instruction"></p>

                        <form action="{{ route('student-exam') }}" method="POST">
                            @csrf
                            <input type="hidden" name="classes_id" id="classes_id">
                            <input type="submit" class="btn btn-primary" value="Start exam">
                        </form>
                    </div>

                    {{-- no exam at the moment --}}
                    <div class="card-body" id="exam-paper-not-exist" style="display: none">
                        <h6 class="card-title">No exam questions found!</h6>

                        <p class="card-text">Please there is not exam for you at the moment</p>
                        <a href="{{ route('student-logout') }}" class="btn btn-primary">Logout</a>
                    </div>

                    {{-- exam already taken --}}
                    <div class="card-body" id="result-exist" style="display: none">
                        <h6 class="card-title">Exam already taken!</h6>

                        <p class="card-text">Please note that you have already taken this exam</p>
                        <a href="{{ route('student-logout') }}" class="btn btn-primary">Logout</a>
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <script>
        var span = document.getElementById('clock');

        function time() {
            var d = new Date();
            var s = d.getSeconds();
            var m = d.getMinutes();
            var h = d.getHours();
            span.textContent =  "_____" + ("0" + h).substr(-2) + ":" + ("0" + m).substr(-2) + ":" + ("0" + s).substr(-2);
        }

        setInterval(time, 1000);
    </script>

    <script>
        const student = {{ Js::from(Auth::user())}}

        // check if exam exist for student
        fetch("/api/get_exam_papers_by_class_timerange", {
            method: "POST",
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify({
                classes_id: student.student.classes_id
            })
        }).
        then(response => response.json()).
        then(res => {
            let exam_paper = res[0]
            let exam_paper_not_exist = (exam_paper == null)

            // console.log("exam_paper", exam_paper)

            if(exam_paper_not_exist){
                document.getElementById("exam-paper-not-exist").style.display = "block"
                document.getElementById("loading").style.display = "none"
            }else{
                // check if student has already taken exam
                fetch("/api/query_results_table", {
                    method: "POST",
                    headers: {
                        'Content-type': 'application/json'
                    },
                    body: JSON.stringify({
                        classes_id: student.student.classes_id,
                        student_id: student.student.id,
                        subject_id: exam_paper.subject_id,
                        exam_paper_id: exam_paper.id
                    })
                }).
                then(response => response.json()).
                then(res => {
                    let result = res[0]
                    let result_not_exist = (result == null)

                    if(result_not_exist){
                        document.getElementById("exam-paper-exist").style.display = "block"
                        document.getElementById("instruction").innerText = exam_paper.instruction
                        document.getElementById("loading").style.display = "none"
                        document.getElementById("classes_id").value= student.student.classes_id
                    }else{
                        document.getElementById("result-exist").style.display = "block"
                        document.getElementById("loading").style.display = "none"
                    }

                })


            }
        })

        // console.log(user)
    </script>
@endsection