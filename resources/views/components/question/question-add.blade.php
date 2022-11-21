@for ($i = 1; $i <= 5; $i++)
    <div class="card card-default">
        <div class="card-header">
        <h3 class="card-title">Question {{ $i }}</h3>

        <div class="card-tools">
            <button type="button" id="collapse-question-area{{$i}}" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="card-body">
                    <textarea id="summernote{{$i}}addquestion">
                    </textarea>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
@endfor

<button class="btn btn-primary" onclick="addQuestions('question')">Submit</button>

<script>
    $(document).ready(function(){
        for(let i= 1; i <= 5; i++){
            $("#collapse-question-area"+i).click()
        }
        
    })

    var exam_id = 2
    var classes_id = 4
    var subject_id = 2
    var exam_paper_id = 3

    function addQuestions(noun){
        var data = []
        for (let i = 1; i <= 5; i++) {
            let question = $("#summernote"+i+"addquestion").summernote('code')

            if (question.trim().length !== 0) {
                data.push({
                    exam_id: options.exam_id,
                    classes_id: options.classes_id,
                    subject_id: options.subject_id,
                    exam_paper_id: options.exam_paper_id,
                    question
                })
            }
        }
        console.clear()
        console.log(data)

        // if(data.length > 0){
        //     $('#custom-tabs-five-normal2').css('opacity', 0)
        //     document.getElementById('ajax-loader2').style.display = 'block'

        //     fetch("/api/"+noun+"s/", {
        //         method: "POST",
        //         headers: {
        //             'Content-type': 'application/json'
        //         },
        //         body: JSON.stringify(data)
        //     }).
        //     then(response => response.json()).
        //     then(res => {

        //         let component_url = ""
        //         let params = ""

        //         res.data.forEach((questionObjeect, index) => {
        //             component_url = "/components/question-table-body-row"
        //             params = "?id=" + questionObjeect.id


        //             fetch(component_url + params, {
        //                 method: "GET",
        //                 headers: {
        //                     'Content-type': 'application/json'
        //                 }
        //             }).then(comRes => comRes.text()).then(component => {
        //                 document.getElementById("question-table-body").innerHTML += component
        //                 // console.log(component)

        //                 successAlert("<h5>"+ res.message +"</h5>")
                        
        //                 $("#summernote"+ (index + 1) +"addquestion").summernote('code', '')
        //                 $('#custom-tabs-five-normal2').css('opacity', 1)
        //                 document.getElementById('ajax-loader2').style.display = 'none'
        //             })
        //         })
                
        //         data = []
        //     })
        // }else{
        //     errorAlert("<h5>Can not submit!</h5> <p>Please Fill one or more questions</p>")
        // }

        let componentUrl = "/components/question-table-body-row"

        addRecords(noun, componentUrl, data)
        
    }
</script>