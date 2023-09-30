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
                    <textarea class="textArea" id="summernote{{$i}}addquestion">
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

    var exam_id 
    var classes_id 
    var subject_id 
    var exam_paper_id

    function addQuestions(noun){
        var data = []
        for (let i = 1; i <= 5; i++) {
            let question = tinymce.get("summernote"+i+"addquestion").getContent()

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

        let componentUrl = "{{URL::to('')}}"+"/components/question-table-body-row"

        addRecords(noun, componentUrl, data)
        
    }
</script>