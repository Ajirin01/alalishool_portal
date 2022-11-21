<tr id="question{{$question->id}}row">
    <td class="text-danger">New</td>
    <td>
        {{-- render question component --}}
        <x-question.question-area :questionId="$question->id" :question="$question->question"  />

        <ul id="answer-list{{ $question->id }}">
            @foreach ($question->question_answers as $j =>  $answer)
                {{-- render answer component --}}
                <x-question.question-answer-area :answerId="json_decode($answer)->id" :answer="json_decode($answer)->answer" :correct="json_decode($answer)->correct" />
            @endforeach
        </ul>

        {{-- add new answer item --}}
        <x-question.question-answer-add :questionId="$question->id" />
        {{-- /. add new andwer item  --}}
    </td>
</tr>