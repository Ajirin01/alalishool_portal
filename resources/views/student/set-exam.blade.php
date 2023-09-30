
<script>
    if(sessionStorage.getItem('questions') !== undefined){
        sessionStorage.setItem('questions', JSON.stringify({{ Js::from($questions) }}))
    }
    sessionStorage.setItem('exam_paper', JSON.stringify({{ Js::from($exam_paper) }}))

    window.location = "{{URL::to('/student/exam')}}"
</script>