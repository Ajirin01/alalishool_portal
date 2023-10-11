<div class="card card-default">
    <div class="card-header">
    <h3 class="card-title">Import Questions</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="card-body">
                <select class="form-control" name="exam-paper" id="exam-paper">
                    <option value="">Select Exam Paper</option>
                    @foreach (App\Models\ExamPaper::with('questions')->get() as $exam_paper)
                        <option value="{{json_encode($exam_paper->questions)}}">{{$exam_paper->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>

<button class="btn btn-primary" onclick="importQuestions('question')">Import</button>

<script>

    var exam_id 
    var classes_id 
    var subject_id 
    var exam_paper_id
    var questions = []

    const exam_paper = document.getElementById('exam-paper')

    exam_paper.onchange = function(){
        questions = JSON.parse(exam_paper.value)
        console.log(questions)
    }


    function importQuestions(noun){
        var data
        var questions_array = []
        var answers_array = []

        questions.forEach(question => {
            // data.push({
            //     exam_id: options.exam_id,
            //     classes_id: options.classes_id,
            //     subject_id: options.subject_id,
            //     exam_paper_id: options.exam_paper_id,
            //     question: question.question
            // })

            questions_array.push({
                exam_id: options.exam_id,
                classes_id: options.classes_id,
                subject_id: options.subject_id,
                exam_paper_id: options.exam_paper_id,
                question: question.question,
                answers: question.question_answers
            })

            // question.question_answers.forEach(answer=> {
            //     answers_array.push({
            //         answer: answer.answer,
            //         // question_id: question.id,
            //         correct: Number(answer.correct)
            //     })
            // })

            // console.log(questions_array, answers_array)
        });

        data = {questions: questions_array}

        // console.clear()
        console.log(data)

        $('#custom-tabs-five-normal2').css('opacity', 0)
        document.getElementById('ajax-loader2').style.display = 'block'

        fetch("{{URL::to('')}}"+"/api/questions/import", {
            method: "POST",
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify(data)
        }).
        then(response => response.json()).
        then(res => {
            console.log(res)
            let params = ""
            successAlert("<h5>"+ res.message +"</h5>")
                
            location.reload()
        })
        
    }
</script>