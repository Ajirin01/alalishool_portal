@extends('layouts.admin_layout')

@section('admin-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                        <li class="nav-item" style="width: 100%;">
                            @if (count($results) > 0)
                                <div style="float: left; padding-left: 20px">
                                    <h3>Results</h3>
                                    <span><b>Exam: </b></span> <span class="text-default">{{$results[0]->exam->title}}</span> <br>
                                    <span><b>Exam Paper: </b></span> <span class="text-default">{{$results[0]->exam_paper->name}}</span> <br>
                                </div>
                                <div style="float: right; padding-right: 20px">
                                    <span><b>Class: </b></span> <span class="text-default">{{$results[0]->classes->name}}</span> <br>
                                    <span><b>Subject: </b></span> <span class="text-default">{{$results[0]->subject->name}}</span> <br>
                                    <span><b>Year: </b></span> <span class="text-default">{{$results[0]->year->year}}</span> <br>
                                    <span><b>Term: </b></span> <span class="text-default">{{$results[0]->term->name}}</span> <br>
                                </div>
                            @endif
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-five-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-five-overlay-dark" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-dark-tab">
                            <div class="overlay-wrapper">
                                <div style="display: none; text-align: center" class="overlay dark" id="ajax-loader"><i style="position: fixed; margin-top: 20vh" class="fas fa-3x fa-sync-alt fa-spin"></i></div>

                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Students result for: {{strtoupper($exam_paper->name)}}</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Student</th>
                                                    <th>Over</th>
                                                    @if (Auth::user()->role == "admin" || Auth::user()->role == "teacher")
                                                        <th>Score</th>
                                                        <th>Actions</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody id="result-table-body">
                                                @foreach ($results as $i =>  $result)
                                                    <tr id="result{{$result->id}}row">
                                                        <td>{{ $i + 1 }}</td>
                                                        <td>
                                                            {{$result->student->name}}
                                                        </td>
                                                        <td>{{$result->over}}</td>
                                                        
                                                        @if (Auth::user()->role == "admin" || Auth::user()->role == "teacher")
                                                            <x-general.noun-area :id="$result->id" :name="$result->score" :noun="'result'"/>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Student</th>
                                                    <th>Over</th>
                                                    @if (Auth::user()->role == "admin" || Auth::user()->role == "teacher")
                                                        <th>Score</th>
                                                        <th>Actions</th>
                                                    @endif
                                                    
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>

                        
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>

    <script>
        function update(id, noun){
            let input = "text" + id + noun

            let data = {
                score: $("#"+input).val()
            }

            updateData(data, id, noun)
        }
    </script>
@endsection