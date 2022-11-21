<tr id="student{{$student->id}}row">
    <td class="text-danger">New</td>
    {{-- render student component --}}
    <x-student.student-area :id="$student->id" :name="$student->name"
    :phone="$student->user->phone" :email="$student->user->email" />
</tr>