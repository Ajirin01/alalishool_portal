@extends('layouts.exam_layout')
@section('main-content')
    <div class="tab-pane fade show" id="custom-tabs-five-overlay-dark2" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-dark-tab2">
        <div class="overlay-wrapper">
            {{-- add exam component --}}
            <div style="display: none; text-align: center" class="overlay dark" id="ajax-loader2"><i style="position: fixed; margin-top: 20vh" class="fas fa-3x fa-sync-alt fa-spin"></i></div>


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
                                                <li> <b> Percentage not answered </b> ===> <b id="not-answered-percent-area"></b> </li>
                                            </ul>
                                        </li> <br>
                            
                                        <li>
                                            <ul>
                                                <li class="correct-box" id="correct-box"></li>
                                                <li> <b> Percentage Correct Answers </b> ===> <b id="correct-percent-area"></b> </li>
                                            </ul>
                                        </li> <br>
                            
                                        <li>
                                            <ul>
                                                <li class="wrong-box" id="wrong-box"></li>
                                                <li> <b> Percentage Wrong Answers </b> ===> <b id="wrong-percent-area"></b> </li>
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
                                        <h4 class="text-center">logging out in 10 seconds...</h4>
                                        
                                    </ul>
                                </div>
                                
                                <div class="exam-section" id="exam-section">
                                    <h1 style="float: left; margin-left: 5px">Questions</h1>
                            
                                    <h2 class="timer" id="timer" style="float: right; margin-right:5px"></h2>
                                    <h3 class="start-end-info" id="start-end-info"></h3> <br><br><br>
                                
                                    <div class="questions-container" id="questions-container">
                                        <!-- Inner element coming from javacript -->
                                    </div>
                            
                                    <div class="pager-container">
                                        <ul id="next-previous"></ul>
                                    </div>
                            
                                    <div class="submit-btn-container">
                                        <input class="submit-btn" type="button" id="submit-btn" value="Submit" onclick="totalCorrect()">
                                    </div>

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
    

    <script type="text/javascript" src="{{ asset('typemath/tinymce6/plugins/tiny_mce_wiris/integration/WIRISplugins.js?viewer=image') }}"></script>

    <script src="{{ asset('adminlte/paginator.js') }}"></script>
    <script src="{{ asset('adminlte/query-object.js') }}"></script>
    <script>
        const student = {{ Js::from(Auth::user()->student) }}
    </script>
    <script src="{{ asset('adminlte/exam-handler.js') }}"></script>
@endsection