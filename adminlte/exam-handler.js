// document.getElementById('ajax-loader2').style.display = 'block'

const questions_container = document.getElementById('questions-container')
const timer = document.getElementById('timer')
const submit_button = document.getElementById('submit-btn')
const start_end_info  = document.getElementById('start-end-info')

const not_answered_percent_area = document.getElementById('not-answered-percent-area')
const correct_percent_area = document.getElementById('correct-percent-area')
const wrong_percent_area = document.getElementById('wrong-percent-area')
const next_previous = document.getElementById('next-previous')

const answered_questions_el = document.getElementById('answered_questions')

const questions_el = document.getElementById('questions_el')

var answerd_question = []
var pagination_questions
var current_question_number = 1
var temp_questions = []
var exam_paper

var stop_watch

String.prototype.toHHMMSS = function () {
    var sec_num = parseInt(this, 10) // don't forget the second param
    var hours   = Math.floor(sec_num / 3600)
    var minutes = Math.floor((sec_num - (hours * 3600)) / 60)
    var seconds = sec_num - (hours * 3600) - (minutes * 60)

    if (hours   < 10) {hours   = "0"+hours}
    if (minutes < 10) {minutes = "0"+minutes}
    if (seconds < 10) {seconds = "0"+seconds}
    return hours+':'+minutes+':'+seconds
}

const date = new Date()
var start_at = date.getHours() + ":" +  date.getMinutes() + ":" + date.getSeconds()

    // console.log(exam_paper)

    var questions = JSON.parse(sessionStorage.getItem('questions'))

    
    console.log(questions)

    var duration
    const paper_duration = Number(JSON.parse(sessionStorage.getItem('exam_paper')).duration)*60
    const half_duration = paper_duration*0.5
    const low_duration = paper_duration*0.15
    

    if (sessionStorage.getItem('duration') == null) {
        var duration = Number(JSON.parse(sessionStorage.getItem('exam_paper')).duration)*60
        sessionStorage.setItem('duration', duration)
    }else{
        duration = sessionStorage.getItem('duration')
        sessionStorage.setItem('duration', duration)
    }

    questions.forEach((question, index) => {
        temp_questions.push({'question_number': (index+1), 'question_data': question})
        answerd_question.push({'question_number': (index+1), 'correct': false, 'answered': false, 'id': ""})
    });

    // paginatopn starts here
    var paginator = new Paginator(temp_questions)
    pagination_questions = paginator.paginate(1)

    //paginaton data
    
    let pager = document.getElementById('pager')
    
    // pre-render the component at initial page load
    renderComponents(pagination_questions[current_question_number-1])

    stop_watch = setInterval(function(){
        duration--
        timer.innerText = String(duration).toHHMMSS()
        // console.log(duration)
        sessionStorage.setItem('duration', duration)
        if(duration == 0){
            clearInterval(stop_watch)
            sessionStorage.clear()
            submit_button.click()
        }

        if(duration <= half_duration){
            submit_button.style.margin = '0 auto'
            submit_button.style.display = 'block'
        }

        if(duration <= low_duration){
            timer.style.color = 'red'
        }

    }, 1000)



// get current question from question_answered obj give the number of question
function getCurrentQuestionFromAnswered(number, obj){
    let current_question_array = obj.filter(item => {
        return item.question_number == number
    })

    return current_question_array[0]
}


// get answers list for a given question and return the list element(Component)
function getAnswers(question_number, answers){
    let answer_element = ""

    // get answered from session if exists
    if(sessionStorage.getItem('answerd_question') !== null){
        answerd_question = JSON.parse(sessionStorage.getItem('answerd_question'))
    }

    answers.forEach(answer => {
        answer_element += '<ul>'

        if(String(getCurrentQuestionFromAnswered(question_number, answerd_question).id) == answer.id){
            answer_element += '    <li class="answer-item"><div><input type="radio" checked value="" name=answer"' + question_number + '" id="' + answer.id + '"' + 'onchange="getSelectedAnswer(' + question_number + ')"></div> <div class="answer-content"><span>' + answer.answer + '</span></div></li>'
        }else{
            answer_element += '    <li class="answer-item"><div><input type="radio" value="" name=answer"' + question_number + '" id="' + answer.id + '"' + 'onchange="getSelectedAnswer(' + question_number + ')"></div> <div class="answer-content"><span>' + answer.answer + '</span></div></li>'
        }
        
        // answer_element += '    <li><span>' + answer.answer + '</span></li>'
        answer_element += '</ul>'
    })

    return answer_element
}

function renderComponents(current_page){
    var js = document.createElement("script");
    js.type = "text/javascript";
    js.src = URL+"/typemath/tinymce6/plugins/tiny_mce_wiris/integration/WIRISplugins.js?viewer=image";
    document.head.appendChild(js);
    var current_page_data = current_page.data
    // console.log(current_page.page)
    questions_container.innerHTML = ""
    next_previous.innerHTML = ""
    pager.innerHTML = ""

    for (let j = 0; j < current_page_data.length; j++) {
        let question = current_page_data[j]
        questions_container_inner_element = '<div class="question">'
        questions_container_inner_element += '   <b>' + question.question_number + '. </b><span> ' + question.question_data.question + '</span>'
        questions_container_inner_element += getAnswers(question.question_number, question.question_data.question_answers_no_correct)
        questions_container_inner_element += '</div>'

        questions_container.innerHTML += questions_container_inner_element

        // com.wiris.js.JsPluginViewer.parseDocument();

    }

    // console.log("sdvvsvvbs", answerd_question)
    
    // pager
    
    // questions clickable links
    for (let i = 0; i < pagination_questions.length; i++) {
        // set question link button class to answered if question number is answered
        if(String(getCurrentQuestionFromAnswered((i+1), answerd_question).answered) == "true"){
            pager.innerHTML += "<a class='answered' id='question-link" + i + "' href='#' onclick='goToQuestion("+(i+1)+")'> <li>"+ (i+1) +"</li></a>"
        
        // esle set the question link button class to default 
        }else{
            pager.innerHTML += "<a class='question-link' id='question-link" + i + "' href='#' onclick='goToQuestion("+(i+1)+")'> <li>"+ (i+1) +"</li></a>"

        }

        // set question link button class to active on current question number
        if(current_question_number == (i+1)){
            document.getElementById('question-link' + i).className = "active"
        }
    }

    // next previous button starts here
    next_previous.innerHTML = ""
    // pagination link min = 1
    if(current_question_number > 1){
        next_previous.innerHTML += "<a href='#' onclick='goToQuestion("+ current_page.page.previous +")'><li class='question-link'> Previous </li></a>"
    }

    // pagination link max  = {pages}max
    if(current_question_number < current_page.page.last){
        next_previous.innerHTML += "<a href='#' onclick='goToQuestion("+ current_page.page.next +")'><li class='question-link'> Next </li></a>"

    }
    // next previous button ends here

}

function goToQuestion(question_number){// got to question at a number
    current_question_number = question_number

    // set current question number
    current_page_data = pagination_questions[current_question_number-1].data
    
    //render component for current question number  
    renderComponents(pagination_questions[current_question_number-1])
}

// console.log("efqsacqscsacqcasqsvqsvsqvqsvq", answerd_question)
// get current question from question_answered obj give the number of question
function getCurrentQuestionFromAnswered(number, obj){
    let current_question_array = obj.filter(item => {
        return item.question_number == number
    })

    return current_question_array[0]
}
    

// get selected answer for a particular question given number
function getSelectedAnswer(question_number){
    const my_answer = event.target.value
    const my_answer_id = event.target.id
    // console.log(my_answer, question_number)
    let arrayQuery1 = new ArrayQuery(temp_questions)
    let question = arrayQuery1.selectWhere({question_number})
    let answers = question[0].question_data.question_answers_no_correct

    let arrayQuery2 = new ArrayQuery(answers)
    let answer = arrayQuery2.selectWhere({id: my_answer_id})
    let selected_answer_status = answer[0].correct

    answerd_question.forEach(answered => {
        if(answered.question_number == question_number){
            answered.correct = selected_answer_status
            answered.answered = true
            answered.id = my_answer_id
        }
    })

    sessionStorage.setItem('answerd_question', JSON.stringify(answerd_question))
}
// get selected and answer ends here

// console.log(answerd_question)

function totalCorrect(answered = answerd_question){
    answered_questions_el.value = JSON.stringify(answered)
    sessionStorage.clear()
    document.getElementById('exam-form').submit()
    
}
