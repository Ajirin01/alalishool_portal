<li style="list-style: none">
    <span data-toggle="modal" data-target="#modal-xl-add{{$id}}subjects"><i class="fa fa-plus" ></i> click to assign subjects </span>
    <div class="modal fade" id="modal-xl-add{{$id}}subjects">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Assign subjects</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Subjectes</label>
                                    <select class="select2" id="teacher-assign{{$id}}subjects" multiple="multiple" data-placeholder="Select a subjects" style="width: 100%;" onchange="handleAssignSubjectChange({{$id}})">
                                        @foreach ($subjects as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                    <input id="teacher{{ $id }}" type="hidden" name="" value="{{ json_encode($teacher) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-->
                </div>
                <!-- ./row -->
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="closeadd{{$id}}teacher_subject">Close</button>
                <button type="button" id="{{ $id }}" class="btn btn-primary" onclick="assignSubjects({{$id}}, 'teacher_subject')">Save changes</button>
            </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
</li>

<script>
    var subject_ids = []
    var class_names = []

    function handleAssignSubjectChange(id){
        subject_ids = $("#teacher-assign"+ id +"subjects").val()

        console.log(subject_ids)
    }

    function getSubjectsByIDs(_subject, _IDs){
        var subjects = []
        _IDs.forEach(id => {
            const _class = _subject.filter(cls => {
                if(cls.id == id){
                    return cls
                }
            })

            subjects.push(_class[0])
        });

        return subjects
    }


    function assignSubjects(teacherID, noun){ 
        const teacher= JSON.parse($("#teacher"+teacherID).val())
        const teacher_id = teacher.id
        var teacher_name = teacher.name

        console.log(teacher['id'], "teacher ID")

        let subjects = {{ Js::from($subjects) }}
        

        console.log(getSubjectsByIDs(subjects, subject_ids))

        let selectedSubjectObjects = getSubjectsByIDs(subjects, subject_ids)

        let data = []

        selectedSubjectObjects.forEach(selectedSubject => {
            let teacherSubject = {
                teacher_id,
                subject_id: selectedSubject.id,
                subject_name: selectedSubject.name,
                teacher_name
            }

            data.push(teacherSubject)
        });

        console.log("assignSubjects", "data", data)
        
        $('.modal').css('opacity', 0)
        document.getElementById('ajax-loader').style.display = 'block'

        fetch("{{URL::to('')}}"+"/api/teacher_subjects", {
            method: "POST",
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify(data)
        }).
        then(response => response.json()).
        then(res => {

            console.log(res)

            res.data.forEach((teacherSubject, index) => {
                component_url = "{{URL::to('')}}"+"/components/teacher-subjects-area"
                params = "?id=" + teacher_id + "& name= " + teacherSubject.subject_name


                fetch(component_url + params, {
                    method: "GET",
                    headers: {
                        'Content-type': 'application/json'
                    }
                }).then(comRes => comRes.text()).then(component => {
                    document.getElementById("teacher_subject"+teacher_id+"area").innerHTML += component
                    // console.log(component)

                    successAlert("<h5>"+ res.message +"</h5>")

                    $('.modal').css('opacity', 1)
                    $("#teacher-assign"+ teacher_id +"subjects").val('')
                    document.getElementById("closeadd"+ teacher_id +"teacher_subject").click()
                    document.getElementById('ajax-loader').style.display = 'none'
                })
            })
            
            data = []

            
        })

        // console.log($("#"+textAreaID).summernote('code'))
    }
</script>