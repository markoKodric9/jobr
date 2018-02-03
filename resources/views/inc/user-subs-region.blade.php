<label class="checkbox-inline">
    <input type="checkbox" value="{{$region->id}}" name="regions[{{$region->id}}]"
    {{in_array($region->id, $regionSubs) ? 'checked' : ''}}
    >{{$region->region}}
</label>
