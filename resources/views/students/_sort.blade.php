<div class="row">
    <div class="col">
        <label for="sortingFilter" class="form-label">Sorting by</label>
        <div class="input-group mb-3" >
            <select class="custom-select bg-dark text-white" id="sortingFilter">
                @foreach ($sort_options as $key => $value)
                    <option {{ $key == request('sort') ? 'selected' : '' }} value="{{$key}}">{{$value}}</option>
                @endforeach
            </select>
        </div>
    </div>

</div>