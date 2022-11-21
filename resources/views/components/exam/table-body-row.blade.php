<tr id="exam{{$exam->id}}row">
    <td class="text-danger">New</td>
    <x-exam.exam-area :id="$exam->id" :title="$exam->title"
        :description="$exam->descripton" :startDate="$exam->start_date"
        :endDate="$exam->end_date" :status="$exam->status"/>
</tr>