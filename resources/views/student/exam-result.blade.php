@extends('layouts.exam_layout')
@section('main-content')
    <div class="tab-pane fade show" id="custom-tabs-five-overlay-dark2" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-dark-tab2">
        <div class="overlay-wrapper">
            {{-- add exam component --}}

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-primary card-outline">
                                <div class="plot-area" id="plot-area">
                                    <h1>Exam submitted! Result Summary</h1> <br>
                                    <canvas class="paint-container" id="paint-container"></canvas>
                            
                                    <br><br>
                                    <ul>
                                        <li>
                                            <ul>
                                                <li class="unanswered-box" id="unanswered-box"></li>
                                                <li> <b> Not answered </b> ===> <b id="not-answered-percent-area">{{$over - $total_answered}}</b> </li>
                                            </ul>
                                        </li> <br>
                            
                                        <li>
                                            <ul>
                                                <li class="correct-box" id="correct-box"></li>
                                            <li> <b>Correct Answers </b> ===> <b id="correct-percent-area">{{$score}}</b> </li>
                                            </ul>
                                        </li> <br>
                            
                                        <li>
                                            <ul>
                                                <li class="wrong-box" id="wrong-box"></li>
                                                <li> <b>Wrong Answers </b> ===> <b id="wrong-percent-area">{{$total_wrong}}</b> </li>
                                            </ul>
                                        </li>
                                        <br>
                                        <br>
                                        <li>
                                            <ul>
                                                <li> 
                                                    <b> NOTE THAT: </b>
                                                    <li class="wrong-box" id="wrong-box"></li>
                                                    <b>intercept</b>  
                                                    <li class="unanswered-box" id="unanswered-box"></li>
                                                    <b>=</b>
                                                    <li class="intercept-box" id="intercept-box"></li>
                                                </li>
                                            </ul>
                                        </li>
                                        <br>
                                        
                                    </ul>
                                </div>
                                
                                <div class="exam-section" id="exam-section" style="margin-left: 200px">
                                    
                                    <a href="{{ route('student-logout') }}" class="btn btn-primary text-center">Logout</a>
                                    <br>
                                    <br>
                                    <br>
                            
                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->

        </div>
    </div>
    

    <script type="text/javascript" src="{{ URL::to('typemath/tinymce6/plugins/tiny_mce_wiris/integration/WIRISplugins.js?viewer=image') }}"></script>

    <script src="{{ asset('adminlte/paginator.js') }}"></script>
    <script src="{{ asset('adminlte/query-object.js') }}"></script>
    <script>
        const student = {{ Js::from(Auth::user()->student) }}
        const URL = "{{URL::to('')}}"

        // console.log(sessionStorage.getItem('questions'))
    </script>

    <script>
        sessionStorage.clear()
        const plot_area = document.getElementById('plot-area')
        const paint_container = document.getElementById('paint-container')
        const exam_section = document.getElementById('exam-section')
        
        plot_area.style.display = 'block'

        let percentage_score =  ("{{$score}}" / "{{$over}}") * 100
        let percentage_answered = ("{{$total_answered}}" / "{{$over}}") * 100

        let hundred_percent = 2 * Math.PI
        let one_percent=  hundred_percent / 100
        let pass_parcent = percentage_score
        let fail_parcent = 100 - pass_parcent

        let answered_percent = percentage_answered
        let unanswered_percent = 100  - answered_percent 

        // console.log("Pie", unanswered_percent * one_percent)


        const ctx = paint_container.getContext('2d')

        // draw failed arc
        ctx.strokeStyle = "red"
        ctx.lineWidth = 40
        ctx.beginPath()
        ctx.arc(100, 75, 50, 0, hundred_percent, false)
        ctx.stroke()

        

        // // draw unanswered arc
        ctx.strokeStyle = "rgba(4, 4, 190, 0.4)"
        ctx.beginPath()
        ctx.arc(100, 75, 50, 0, unanswered_percent * one_percent, false)
        ctx.stroke()

        // draw passed arc
        ctx.strokeStyle = "green"
        ctx.beginPath()
        ctx.arc(100, 75, 50, 0, pass_parcent * one_percent, false)
        ctx.stroke()
    </script>
@endsection