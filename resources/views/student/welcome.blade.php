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
                    {{-- exam exist and student can take exam --}}
                    @if ($message === 'exam and no result')
                        <div class="card-body" id="exam-paper-exist">
                            <h6 class="card-title">Exam is ready</h6>

                            <p class="card-text">Please read instructions before attempting exams questions</p> 

                            <h4>Instructions</h4>
                            <p id="instruction"></p>

                            {{-- <form action="{{ route('student-exam') }}" method="POST"> --}}
                            <form action="{{ route('set-exam') }}" method="POST">
                                @csrf
                                <input type="hidden" name="classes_id" id="classes_id">
                                <input type="hidden" name="exam_paper_id" id="exam_paper_id">
                                <input type="submit" class="btn btn-primary" value="Start exam">
                            </form>
                        </div>
                    @endif

                    {{-- no exam at the moment --}}
                    @if ($message === 'no exam and result')
                        <div class="card-body" id="exam-paper-not-exist">
                            <h6 class="card-title">No exam questions found!</h6>

                            <p class="card-text">Please there is no exam for you at the moment</p>
                            <a href="{{ route('student-logout') }}" class="btn btn-primary">Logout</a>
                        </div>
                    @endif

                
                    {{-- exam already taken --}}
                    @if ($message === 'exam and result')
                        <div class="card-body" id="result-exist">
                            <h6 class="card-title">Exam already taken!</h6>

                            <p class="card-text">Please note that you have already taken this exam</p>
                            <a href="{{ route('student-logout') }}" class="btn btn-primary">Logout</a>
                        </div>
                    @endif
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

   
@endsection