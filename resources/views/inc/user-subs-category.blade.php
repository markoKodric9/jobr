<label class="checkbox-inline">
    <input type="checkbox" value="{{$category->id}}" name="categories[{{$category->id}}]"
    {{in_array($category->id, $categorySubs) ? 'checked' : ''}}
    >{{$category->category}}
</label>
