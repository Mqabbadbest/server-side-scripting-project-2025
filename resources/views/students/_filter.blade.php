<div class="row">
    <div class="col">
        <label for="companyFilter" class="form-label">Filter by College</label>
        <div class="input-group mb-3">
            <select class="custom-select bg-dark text-white" id="filter_colleges">
                @foreach ($colleges as $id => $name)
                    <option {{ $id == request('college_id') ? 'selected' : '' }} value="{{$id}}">{{$name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>