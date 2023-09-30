<li style="list-style: none">
    <span data-toggle="modal" data-target="#modal-xl-add{{$id}}classes"><i class="fa fa-plus" ></i> click to assign classes </span>
    <div class="modal fade" id="modal-xl-add{{$id}}classes">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Assign classes</h4>
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
                                    <label>Classes</label>
                                    <select class="select2" id="teacher-assign{{$id}}classes" multiple="multiple" data-placeholder="Select a classes" style="width: 100%;" onchange="handleAssignClassesChange({{$id}})">
                                        @foreach ($classes as $class)
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
                <button type="button" class="btn btn-default" data-dismiss="modal" id="closeadd{{$id}}teacher_classe">Close</button>
                <button type="button" id="{{ $id }}" class="btn btn-primary" onclick="assignClasses({{$id}}, 'teacher_classe')">Save changes</button>
            </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
</li>

<script>
    var class_ids = []
    var class_names = []

    function handleAssignClassesChange(id){
        class_ids = $("#teacher-assign"+ id +"classes").val()

        console.log(class_ids)
    }

    function getClassesByIDs(_classes, _IDs){
        var classes = []
        _IDs.forEach(id => {
            const _class = _classes.filter(cls => {
                if(cls.id == id){
                    return cls
                }
            })

            classes.push(_class[0])
        });

        return classes
    }


    function assignClasses(teacherID, noun){ 
        const teacher= JSON.parse($("#teacher"+teacherID).val())
        const teacher_id = teacher.id
        var teacher_name = teacher.name

        console.log(teacher['id'], "teacher ID")

        let classes = {{ Js::from($classes) }}
        

        console.log(getClassesByIDs(classes, class_ids))

        let selectedClassObjects = getClassesByIDs(classes, class_ids)

        let data = []

        selectedClassObjects.forEach(selectedClass => {
            let teacherClass = {
                teacher_id,
                classes_id: selectedClass.id,
                classes_name: selectedClass.name,
                teacher_name
            }

            data.push(teacherClass)
        });

        console.log("assignClasses", "data", data)
        
        $('.modal').css('opacity', 0)
        document.getElementById('ajax-loader').style.display = 'block'

        fetch("{{URL::to('')}}"+"/api/teacher_classes", {
            method: "POST",
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify(data)
        }).
        then(response => response.json()).
        then(res => {

            console.log(res)

            res.data.forEach((teacherClass, index) => {
                component_url = "{{URL::to('')}}"+"/components/teacher-classes-area"
                params = "?id=" + teacher_id + "& name= " + teacherClass.classes_name


                fetch(component_url + params, {
                    method: "GET",
                    headers: {
                        'Content-type': 'application/json'
                    }
                }).then(comRes => comRes.text()).then(component => {
                    document.getElementById("teacher_classes"+teacher_id+"area").innerHTML += component
                    // console.log(component)

                    successAlert("<h5>"+ res.message +"</h5>")

                    $('.modal').css('opacity', 1)
                    $("#teacher-assign"+ teacher_id +"classes").val('')
                    document.getElementById("closeadd"+ teacher_id +"teacher_classe").click()
                    document.getElementById('ajax-loader').style.display = 'none'
                })
            })
            
            data = []

            
        })

        // console.log($("#"+textAreaID).summernote('code'))
    }
</script>