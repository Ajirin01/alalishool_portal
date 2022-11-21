<tr id="{{$noun}}{{$data->id}}row">
    <td class="text-danger">New</td>
    
    <x-general.noun-area :id="$data->id" :name="$data[$key]" :noun="$noun" />
</tr>