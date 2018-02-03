<select id="degree" type="text" class="form-control" name="degree" required>
  @foreach(App\Degree::all() as $degree)
    <option value="{{$degree->id}}">{{$degree->name}}</option>
  @endforeach
</select>
