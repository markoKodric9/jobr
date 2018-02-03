<select id="category" type="text" class="form-control" name="category" required>
  @foreach(App\Category::all() as $category)
    <option value="{{$category->id}}">{{$category->category}}</option>
  @endforeach
</select>
