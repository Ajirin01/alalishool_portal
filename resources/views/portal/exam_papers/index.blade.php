@extends('layouts.admin_layout')

@section('portal-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-five-overlay-dark-tab" data-toggle="pill" href="#custom-tabs-five-overlay-dark" role="tab" aria-controls="custom-tabs-five-overlay-dark" aria-selected="true">Exam Papers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-five-overlay-dark-tab2" data-toggle="pill" href="#custom-tabs-five-overlay-dark2" role="tab" aria-controls="custom-tabs-five-overlay-dark2">Add Exam Papers</a>
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
                                        <h3 class="card-name">Switch between tabs to manage exams</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Exam Papers</th>
                                                    <th>Duration</th>
                                                    <th>Start Time</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="exam-paper-table-body">
                                                @foreach ($exam_papers as $i =>  $exam_paper)
                                                    @php
                                                        $sn =  $i + 1 ;
                                                        // echo $sn;
                                                    @endphp
                                                    <tr id="exam_paper{{$exam_paper->id}}row">
                                                        <td>{{ $i + 1 }}</td>
                                                        {{-- render exam component --}}
                                                        <x-exam_paper.exam-paper-area :id="$exam_paper->id" :name="$exam_paper->name"
                                                            :duration="$exam_paper->duration" :startTime="$exam_paper->start_time"
                                                            :status="$exam_paper->status" :instruction="$exam_paper->instruction" />
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Exam Papers</th>
                                                    <th>Duration</th>
                                                    <th>Start Time</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>

                        {{-- Add exams --}}
                        <div class="tab-pane fade show" id="custom-tabs-five-overlay-dark2" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-dark-tab2">
                            <div class="overlay-wrapper">
                                {{-- add exam component --}}
                                <div style="display: none; text-align: center" class="overlay dark" id="ajax-loader2"><i style="position: fixed; margin-top: 20vh" class="fas fa-3x fa-sync-alt fa-spin"></i></div>
                                <x-exam_paper.exam-paper-add />
                            </div>
                            {{-- /. Add exam --}}
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>


    <script>
        const options = {{Js::from($options)}};

        var name = ""
        var duration = ""
        var start_time = ""
        var instruction = ""
        var status = ""

        var data = {}

        function handleNameChange(){
            name = event.target.value
        }

        function handleDurationChange(){
            duration = event.target.value
        }

        function handleStartTimeChange(){
            start_time = event.target.value
        }

        function handleStatusChange(){
            status = event.target.value
        }

        function handleInstructionsChange(){
            instruction = event.target.value
        }

        function addExamPaper(noun){
            const options = {{Js::from($options)}}
            data = {
                name,
                duration,
                instruction,
                start_time,
                status,
                classes_id: options.classes_id,
                subject_id: options.subject_id,
                exam_id: options.exam_id
            }
            
            const oneOrMoreFieldEmpty = ($("#name-add").val() == "" || $("#duration-add").val() == "" || $("#start-time-add").val()  == "" || $("#status-add").val() == "")

            console.clear()
            console.log(data)

            if(!oneOrMoreFieldEmpty){
                $('#custom-tabs-five-normal2').css('opacity', 0)
                document.getElementById('ajax-loader2').style.display = 'block'

                fetch("{{URL::to('')}}"+"/api/exam_papers", {
                    method: "POST",
                    headers: {
                        'Content-type': 'application/json'
                    },
                    body: JSON.stringify(data)
                }).
                then(response => response.json()).
                then(res => {
                    successAlert("<h5>"+ res.message +"</h5>")
                    location.reload()
                })
                    
                data = []
            }else{
                errorAlert("<h5>Can not submit!</h5> <p>Please Fill all fields</p>")
            }
        }

        function updateExamPaper(id){
            name = $("#name-edit"+id).val()
            duration = $("#duration-edit"+id).val()
            instruction =  $("#instruction-edit"+id).val()
            start_time = $("#start-time-edit"+id).val()
            status = $("#status-edit"+id).val()

            var data = {
                name,
                duration,
                instruction,
                start_time,
                status,
                classes_id: options.classes_id,
                subject_id: options.subject_id,
                exam_id: options.exam_id
            }

            // console.log(data)

            $('.modal').css('opacity', 0)
            document.getElementById('ajax-loader').style.display = 'block'

            fetch("{{URL::to('')}}"+"/api/exam_papers/" + id, {
                method: "PUT",
                headers: {
                    'Content-type': 'application/json'
                },
                body: JSON.stringify(data)
            }).
            then(response => response.json()).
            then(res => {
                successAlert("<h5>"+ res.message +"</h5>")
                setTimeout(() => {
                    location.reload()
                }, 500);
            })
        }
    </script>
@endsection