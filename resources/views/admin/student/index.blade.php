@extends('layouts.admin_layout')

@section('admin-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-five-overlay-dark-tab" data-toggle="pill" href="#custom-tabs-five-overlay-dark" role="tab" aria-controls="custom-tabs-five-overlay-dark" aria-selected="true">Students (Class => {{$class->name}})</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-five-overlay-dark-tab2" data-toggle="pill" href="#custom-tabs-five-overlay-dark2" role="tab" aria-controls="custom-tabs-five-overlay-dark2">Add Students</a>
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
                                                    <!-- Add this within the thead -->
                                                    <th>
                                                        <input type="checkbox" id="select-all">
                                                    </th>
                                                    <th>S/N</th>
                                                    <th>Name</th>
                                                    <th>Admission Number</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="student-table-body">
                                                @foreach ($students as $i =>  $student)
                                                    @php
                                                        $sn =  $i + 1 ;
                                                    @endphp
                                                    @if ($student->user !== null)
                                                        <tr id="student{{$student->id}}row">
                                                            <td>
                                                                <input type="checkbox" class="student-checkbox" data-student-id="{{ $student->id }}">
                                                            </td>
                                                            <td>{{ $i + 1 }}</td>
                                                            {{-- render student component --}}
                                                            <x-student.student-area :id="$student->id" :name="$student->name"
                                                            :phone="$student->user->phone" :email="$student->user->email" />
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Name</th>
                                                    <th>Admission Number</th>
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
                                {{-- add student component --}}
                                <div style="display: none; text-align: center" class="overlay dark" id="ajax-loader2"><i style="position: fixed; margin-top: 20vh" class="fas fa-3x fa-sync-alt fa-spin"></i></div>
                                <x-student.student-add />
                            </div>
                            {{-- /. Add student --}}
                        </div>
                    </div>
                    <!-- /.card -->
                    <input type="hidden" id="options" value="{{ json_encode($options) }}">
                    <select name="class" id="classes_id">
                        <option value="">Select Class</option>
                        @foreach (App\Models\Classes::all() as $class)
                            <option value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-primary" onclick="promotStudents()">Promote Students</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        var name = ""
        var phone = ""
        var email = ""
        var password = ""
        var role = "student"
        var options = JSON.parse($("#options").val())
        var data = {}

        // console.log(options.classes_id)

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

        function addStudent(noun){
            console.clear()
            console.log(options)
            data = [{
                name,
                phone,
                email,
                password: email,
                classes_id: options.classes_id,
                role
            }]
            
            const oneOrMoreFieldEmpty = ($("#name-add").val() == "" || $("#email-add").val()  == "")

            console.log(data)

            if(!oneOrMoreFieldEmpty){
                $('#custom-tabs-five-normal2').css('opacity', 0)
                document.getElementById('ajax-loader2').style.display = 'block'

                fetch("{{URL::to('')}}"+"/api/user/register", {
                    method: "POST",
                    headers: {
                        'Content-type': 'application/json'
                    },
                    body: JSON.stringify(data)
                }).
                then(user_response => user_response.json()).
                then(user_res => {
                    console.log(user_res.data[0])
                    fetch("{{URL::to('')}}"+"/api/"+noun+"s", {
                        method: "POST",
                        headers: {
                            'Content-type': 'application/json'
                        },
                        body: JSON.stringify({
                            user_id: user_res.data[0].id,
                            classes_id: options.classes_id,
                            name: user_res.data[0].name
                            
                        })
                    }).
                    then(student_response => student_response.json()).
                    then(student_res => {
                        console.log(student_res)
                        let params = ""
                        let componentUrl = ""

                        componentUrl = "{{URL::to('')}}"+"/components/student-table-body-row"
                        params = "?id=" + student_res.data.id + "& noun= " + noun

                        fetch(componentUrl + params, {
                            method: "GET",
                            headers: {
                                'Content-type': 'application/json'
                            }
                        }).then(comRes => comRes.text()).then(component => {
                            document.getElementById(noun+"-table-body").innerHTML += component
                            // console.log(component)

                            successAlert("<h5>"+ student_res.message +"</h5>")
                            
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

        function updateStudent(id){
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

            fetch("{{URL::to('')}}"+"/api/students/" + id, {
                method: "PUT",
                headers: {
                    'Content-type': 'application/json'
                },
                body: JSON.stringify(data)
            }).
            then(student_response => student_response.json()).
            then(student_res => {
                console.log(student_res)
                fetch("{{URL::to('')}}"+"/api/user/update/" + student_res.data.user.id, {
                    method: "PUT",
                    headers: {
                        'Content-type': 'application/json'
                    },
                    body: JSON.stringify(data)
                }).
                then(response => response.json()).
                then(res => {
                    document.getElementById("studentName" + id + "output").innerHTML =   res.data.name

                    document.getElementById("closeupdate" + id + "student").click() 
                    // console.log(res.message)
                    successAlert("<h5>"+ res.message +"</h5>")
                    document.getElementById('ajax-loader').style.display = 'none'
                    $('.modal').css('opacity', 1)
                })
            })

            
        }
    </script>

    <script>
        var selectAllCheckbox = document.getElementById('select-all');
        var studentCheckboxes = document.querySelectorAll('.student-checkbox');
        

        document.addEventListener('DOMContentLoaded', function () {
            // Select All checkbox
           

            selectAllCheckbox.addEventListener('change', function () {
                studentCheckboxes.forEach(checkbox => {
                    checkbox.checked = selectAllCheckbox.checked;
                });
            });

            // Individual checkboxes
            studentCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    // Check if all individual checkboxes are checked and update the Select All checkbox
                    selectAllCheckbox.checked = [...studentCheckboxes].every(checkbox => checkbox.checked);
                });
            });
        });


        function promotStudents() {
            var classes_id =document.getElementById('classes_id').value
            const selectedIds = [];
            studentCheckboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    const studentId = checkbox.dataset.studentId;
                    selectedIds.push(studentId);
                }
            });
            
            if(selectedIds.length === 0 || classes_id === ""){
                errorAlert("<h5> Please make sure you select Class and Students to promote</h5>")
            }else{
                // Now you have an array (selectedIds) containing the IDs of the selected students
                console.log('Selected IDs:', selectedIds);

                fetch("{{URL::to('')}}"+"/api/students/promote", {
                    method: "POST",
                    headers: {
                        'Content-type': 'application/json'
                    },
                    body: JSON.stringify({
                        ids: selectedIds,
                        classes_id: classes_id
                        
                    })
                }).
                then(response => response.json()).
                then(res => {
                    successAlert("<h5>"+ res.message +"</h5>")
                    location.reload()
                })
            }

            
        }
    </script>


@endsection