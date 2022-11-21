<tr id="exam_paper{{$exam_paper->id}}row">
    <td class="text-danger">New</td>
    <x-exam_paper.exam-paper-area :id="$exam_paper->id" :name="$exam_paper->name"
        :duration="$exam_paper->duration" :startTime="$exam_paper->start_time"
        :status="$exam_paper->status"/>
</tr>