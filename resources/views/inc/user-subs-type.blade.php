<label class="checkbox-inline">
    <input type="checkbox" value="{{$type->id}}" name="types[{{$type->id}}]"
    {{in_array($type->id, $typeSubs) ? 'checked' : ''}}
    >{{$type->type}}
</label>
