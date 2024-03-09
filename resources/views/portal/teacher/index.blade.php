@extends('layouts.admin_layout')

@section('portal-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-five-overlay-dark-tab" data-toggle="pill" href="#custom-tabs-five-overlay-dark" role="tab" aria-controls="custom-tabs-five-overlay-dark" aria-selected="true">Teachers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-five-overlay-dark-tab2" data-toggle="pill" href="#custom-tabs-five-overlay-dark2" role="tab" aria-controls="custom-tabs-five-overlay-dark2">Add Teachers</a>
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
                                                    <th>Teachers</th>
                                                    <th>Classes</th>
                                                    <th>Subjects</th>
                                                </tr>
                                            </thead>
                                            <tbody id="teacher-table-body">
                                                @foreach ($teachers as $i =>  $teacher)
                                                    @php
                                                        $sn =  $i + 1 ;
                                                    @endphp
                                                    <tr id="teacher{{$teacher->id}}row">
                                                        <td>{{ $i + 1 }}</td>
                                                        {{-- render teacher component --}}
                                                        <x-teacher.teacher-area :id="$teacher->id" :name="$teacher->name"
                                                        :phone="$teacher->user->phone" :email="$teacher->user->email" />
                                                        <td>
                                                            <ul id="teacher_classes{{$teacher->id}}area">
                                                                @foreach ($teacher->teacher_classes as $class)
                                                                    <x-teacher.teacher-classes-area :id="$class->id" :name="$class->classes_name"/>
                                                                @endforeach
                                                            </ul>
                                                            <x-teacher.teacher-classes-add :id="$teacher->id" :classes="$classes" :teacher="$teacher"/>
                                                        </td>

                                                        <td>
                                                            <ul id="teacher_subject{{$teacher->id}}area">
                                                                @foreach ($teacher->teacher_subjects as $subject)
                                                                    <x-teacher.teacher-subjects-area :id="$subject->id" :name="$subject->subject_name"/>
                                                                @endforeach
                                                            </ul>
                                                            <x-teacher.teacher-subjects-add :id="$teacher->id" :subjects="$subjects" :teacher="$teacher"/>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Teachers</th>
                                                    <th>Classes</th>
                                                    <th>Subjects</th>
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
                                {{-- add teacher component --}}
                                <div style="display: none; text-align: center" class="overlay dark" id="ajax-loader2"><i style="position: fixed; margin-top: 20vh" class="fas fa-3x fa-sync-alt fa-spin"></i></div>
                                <x-teacher.teacher-add />
                            </div>
                            {{-- /. Add teacher --}}
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>


    <script>
        var name = ""
        var phone = ""
        var email = ""
        var password = ""
        var role = "teacher"

        var data = {}

        function handleNameChange(){
            name = event.target.value
        }

        function handlePhoneChange(){
            phone = event.target.value
        }

        function handleEmailChange(){
            email = event.target.value
        }

        function handlePasswordChange(){
            password = event.target.value
        }

        function addTeacher(noun){
            data = [{
                name,
                phone,
                email,
                password: email,
                role
            }]
            
            const oneOrMoreFieldEmpty = ($("#name-add").val() == "" || $("#phone-add").val() == "" || $("#email-add").val()  == "")

            console.clear()
            console.log(data)

            if(!oneOrMoreFieldEmpty){
                $('#custom-tabs-five-normal2').css('opacity', 0)
                document.getElementById('ajax-loader2').style.display = 'block'

                // fetch("../api/user/register/", {
                fetch("{{URL::to('api/user/register')}}", {
                    method: "POST",
                    headers: {
                        'Content-type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify(data)
                }).
                then(user_response => user_response.json()).
                then(user_res => {
                    console.log(user_res.data[0])
                    fetch("{{URL::to('')}}"+"/api/"+noun+"s", {
                        method: "POST",
                        headers: {
                            'Content-type': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: JSON.stringify({
                            user_id: user_res.data[0].id,
                            name: user_res.data[0].name
                        })
                    }).
                    then(teacher_response => teacher_response.json()).
                    then(teacher_res => {
                        console.log(teacher_res)
                        let params = ""
                        let componentUrl = ""

                        componentUrl = "{{URL::to('')}}"+"/components/teacher-table-body-row"
                        params = "?id=" + teacher_res.data.id + "& noun= " + noun

                        fetch(componentUrl + params, {
                            method: "GET",
                            headers: {
                                'Content-type': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        }).then(comRes => comRes.text()).then(component => {
                            document.getElementById(noun+"-table-body").innerHTML += component
                            // console.log(component)

                            successAlert("<h5>"+ teacher_res.message +"</h5>")
                            
                            $("#name-add").val('')
                            $("#phone-add").val('')
                            $("#email-add").val('')


                            $('#custom-tabs-five-normal2').css('opacity', 1)
                            document.getElementById('ajax-loader2').style.display = 'none'
                        })
                    })
                        
                    data = []
                })

            }else{
                errorAlert("<h5>Can not submit!</h5> <p>Please Fill all fields</p>")
            }
        }

        function updateTeacher(id){
            name = $("#name-edit"+id).val()
            phone = $("#phone-edit"+id).val()
            email = $("#email-edit"+id).val()
            password = $("#password-edit"+id).val()

            var data = {
                name,
                email,
                phone
            }

            if(password !== "" ){
                data['password'] = password
            }


            $('.modal').css('opacity', 0)
            document.getElementById('ajax-loader').style.display = 'block'

            fetch("{{URL::to('')}}"+"/api/teachers/" + id, {
                method: "PUT",
                headers: {
                    'Content-type': 'application/json'
                },
                body: JSON.stringify(data)
            }).
            then(teacher_response => teacher_response.json()).
            then(teacher_res => {
                console.log(teacher_res)
                fetch("{{URL::to('')}}"+"/api/user/update/" + teacher_res.data.user.id, {
                    method: "PUT",
                    headers: {
                        'Content-type': 'application/json'
                    },
                    body: JSON.stringify(data)
                }).
                then(response => response.json()).
                then(res => {
                    document.getElementById("teacherName" + id + "output").innerHTML =   res.data.name

                    document.getElementById("closeupdate" + id + "teacher").click() 
                    // console.log(res.message)
                    successAlert("<h5>"+ res.message +"</h5>")
                    document.getElementById('ajax-loader').style.display = 'none'
                    $('.modal').css('opacity', 1)
                })
            })

            
        }
    </script>
@endsection