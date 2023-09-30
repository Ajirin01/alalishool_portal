@extends('layouts.admin_layout')

@section('admin-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-five-overlay-dark-tab" data-toggle="pill" href="#custom-tabs-five-overlay-dark" role="tab" aria-controls="custom-tabs-five-overlay-dark" aria-selected="true">Exams</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-five-overlay-dark-tab2" data-toggle="pill" href="#custom-tabs-five-overlay-dark2" role="tab" aria-controls="custom-tabs-five-overlay-dark2">Add Exams</a>
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
                                        <h3 class="card-title">Switch between tabs to manage exams</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Exams</th>
                                                    <th>Description</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="exam-table-body">
                                                @foreach ($exams as $i =>  $exam)
                                                    @php
                                                        $sn =  $i + 1 ;
                                                        // echo $sn;
                                                    @endphp
                                                    <tr id="exam{{$exam->id}}row">
                                                        <td>{{ $i + 1 }}</td>
                                                        {{-- render exam component --}}
                                                        <x-exam.exam-area :id="$exam->id" :title="$exam->title"
                                                            :description="$exam->descripton" :startDate="$exam->start_date"
                                                            :endDate="$exam->end_date" :status="$exam->status"/>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Exams</th>
                                                    <th>Description</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
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
                                <x-exam.exam-add />
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

        var title = ""
        var descripton = ""
        var start_date = ""
        var end_date = ""
        var status = ""

        var data = {}

        function handleTitleChange(){
            title = event.target.value
        }

        function handleDescriptionChange(){
            descripton = event.target.value
        }

        function handleStartDateChange(){
            start_date = event.target.value
        }

        function handleEndDateChange(){
            end_date = event.target.value
        }

        function handleStatusChange(){
            status = event.target.value
        }

        function addExam(noun){
            const options = {{Js::from($options)}}
            data = {
                title,
                descripton,
                start_date,
                end_date,
                status,
                year_id: options.year_id,
                term_id: options.term_id,
            }
            
            const oneOrMoreFieldEmpty = ($("#title-add").val() == "" || $("#description-add").val() == "" || $("#start-date-add").val()  == "" || $("#end-date-add").val() == "" || $("#status-add").val() == "")

            console.clear()
            console.log(data)

            if(!oneOrMoreFieldEmpty){
                $('#custom-tabs-five-normal2').css('opacity', 0)
                document.getElementById('ajax-loader2').style.display = 'block'

                fetch("{{URL::to('')}}"+"/api/"+noun+"s", {
                    method: "POST",
                    headers: {
                        'Content-type': 'application/json'
                    },
                    body: JSON.stringify(data)
                }).
                then(response => response.json()).
                then(res => {
                    let params = ""
                    let componentUrl = ""

                    componentUrl = "{{URL::to('')}}"+"/components/exam-table-body-row"
                    params = "?id=" + res.data.id + "& noun= " + noun

                    fetch(componentUrl + params, {
                        method: "GET",
                        headers: {
                            'Content-type': 'application/json'
                        }
                    }).then(comRes => comRes.text()).then(component => {
                        document.getElementById(noun+"-table-body").innerHTML += component
                        // console.log(component)

                        successAlert("<h5>"+ res.message +"</h5>")
                        
                        $("#title-add").val('')
                        $("#description-add").val('')
                        $("#start-date-add").val('')
                        $("#end-date-add").val('')
                        $("#status-add").val('')


                        $('#custom-tabs-five-normal2').css('opacity', 1)
                        document.getElementById('ajax-loader2').style.display = 'none'
                    })
                })
                    
                data = []
            }else{
                errorAlert("<h5>Can not submit!</h5> <p>Please Fill all fields</p>")
            }
        }

        function updateExam(id){
            title = $("#title-edit"+id).val()
            descripton = $("#description-edit"+id).val()
            start_date = $("#start-date-edit"+id).val()
            end_date = $("#end-date-edit"+id).val()
            status = $("#status-edit"+id).val()

            var data = {
                title,
                descripton,
                start_date,
                end_date,
                status,
                year_id: options.year_id,
                term_id: options.term_id,
            }

            $('.modal').css('opacity', 0)
            document.getElementById('ajax-loader').style.display = 'block'

            fetch("{{URL::to('')}}"+"/api/exams/" + id, {
                method: "PUT",
                headers: {
                    'Content-type': 'application/json'
                },
                body: JSON.stringify(data)
            }).
            then(response => response.json()).
            then(res => {
                document.getElementById("examTitle" + id + "output").innerHTML =   res.data.title
                document.getElementById("examDescription" + id + "output").innerHTML =   res.data.descripton
                document.getElementById("examStartDate" + id + "output").innerHTML =   res.data.start_date
                document.getElementById("examEndDate" + id + "output").innerHTML =   res.data.end_date
                document.getElementById("examStatus" + id + "output").innerHTML =   res.data.status

                document.getElementById("closeupdate" + id + "exam").click() 
                // console.log(res.message)
                successAlert("<h5>"+ res.message +"</h5>")
                document.getElementById('ajax-loader').style.display = 'none'
                $('.modal').css('opacity', 1)
            })
        }
    </script>
@endsection