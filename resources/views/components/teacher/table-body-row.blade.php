<tr id="teacher{{$teacher->id}}row">
    <td class="text-danger">New</td>
    {{-- render teacher component --}}
    <x-teacher.teacher-area :id="$teacher->id" :name="$teacher->name"
    :phone="$teacher->user->phone" :email="$teacher->user->email" />
    <td>
        <ul id="teacher_classes{{$teacher->id}}area">
            @foreach ($teacher->teacher_classes as $class)
                <x-teacher.teacher-classes-area :id="$class->id" :name="$class->classes_name"/>
            @endforeach
        </ul>
        <x-teacher.teacher-classes-add :id="$teacher->id" :classes="$classes" :teacher="$teacher"/>
    </td>

    <td>
        <ul id="teacher_subject{{$teacher->id}}area">
            @foreach ($teacher->teacher_subjects as $subject)
                <x-teacher.teacher-subjects-area :id="$subject->id" :name="$subject->subject_name"/>
            @endforeach
        </ul>
        <x-teacher.teacher-subjects-add :id="$teacher->id" :subjects="$subjects" :teacher="$teacher"/>
    </td>
</tr>