<li style="list-style: none">
    <div class="modal fade" id="modal-xl-add{{$questionId}}question_answer">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add answer</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-body">
                        <textarea id="summernote-add{{$questionId}}question_answer" required>
                            
                        </textarea>

                        <div>
                            <input type="radio" id="correct{{$questionId}}" value="1" name="correct{{$questionId}}" onchange="handCorrectChanged()">
                            <label for="correct">Correct</label>
                        </div>
                        <div>
                            <input type="radio" id="incorrect{{$questionId}}" value="0" name="correct{{$questionId}}" onchange="handCorrectChanged()">
                            <label for="incorrect">Incorrect</label>
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- /.col-->
                </div>
                <!-- ./row -->
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="closeadd{{$questionId}}question_answer">Close</button>
                <button type="button" id="{{ $questionId }}" class="btn btn-primary" onclick="addAnswer({{$questionId}}, 'question_answer')">Save changes</button>
            </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <span data-toggle="modal" data-target="#modal-xl-add{{$questionId}}question_answer" onclick="initTextArea('summernote-add'+{{$questionId}}+'question_answer')"><i class="fa fa-plus" ></i> click to add answers </span>
</li>

<script>
    function addAnswer(questionID, noun){
        let textAreaID = "summernote-add" + questionID + noun
        let answer = $("#"+textAreaID).summernote('code')

        let data = [
            {
                answer,
                question_id: questionID,
                correct: Number(correct)
            }
        ]

        if($("#"+textAreaID).summernote('code').trim().length == 0){
            errorAlert("<h5>Answer can not be empty!</h5>")
        }else{
            $('.modal').css('opacity', 0)
            document.getElementById('ajax-loader').style.display = 'block'

            fetch("/api/"+noun+"s/", {
                method: "POST",
                headers: {
                    'Content-type': 'application/json'
                },
                body: JSON.stringify(data)
            }).
            then(response => response.json()).
            then(res => {
                document.getElementById("closeadd" + questionID + noun).click()

                let component_url = ""
                let params = ""
                
                component_url = "/components/question-answer-area"
                params = "?answer=" + answer + "&answerId=" + res.data[0].id + "&correct=" + Number(correct)

                fetch(component_url + params, {
                    method: "GET",
                    headers: {
                        'Content-type': 'application/json'
                    }
                }).then(comRes => comRes.text()).then(component => {
                    document.getElementById("answer-list" + questionID).innerHTML += component
                })
                
                // console.log(res.message)
                successAlert("<h5>"+ res.message +"</h5>")
                document.getElementById('ajax-loader').style.display = 'none'
                $('.modal').css('opacity', 1)
                $("#"+textAreaID).summernote('code', '')
                correct = false
            })

            // console.log($("#"+textAreaID).summernote('code'))
        }
    }
</script>