<div class="row">
    <div class="col-md-12">
        <div class="form-group row mb-5">
            <label for="name" class="col-md-3 col-form-label">Name</label>
            <div class="col-md-9">
                <input type="text" name="name" id="name"
                    class="form-control bg-dark text-white @error('name') is-invalid @enderror"
                    placeholder="Enter Full Name..." value="{{ old('name', $student->name) }}">
                <div class="invalid-feedback">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group row mb-5">
            <label for="email" class="col-md-3 col-form-label">Email</label>
            <div class="col-md-9">
                <input type="text" name="email" id="email"
                    class="form-control bg-dark text-white @error('email') is-invalid @enderror"
                    placeholder="Enter Email Address..." value="{{ old('email', $student->email) }}">
                <div class="invalid-feedback">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group row mb-5">
            <label for="phone" class="col-md-3 col-form-label">Phone</label>
            <div class="col-md-9">
                <input type="text" name="phone" id="phone"
                    class="form-control bg-dark text-white @error('phone') is-invalid @enderror"
                    placeholder="Enter Phone Number..." value="{{ old('phone', $student->phone) }}">
                <div class="invalid-feedback">
                    @error('phone')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group row mb-5">
            <label for="dob" class="col-md-3 col-form-label">Date Of Birth</label>
            <div class="col-md-9">
                <input type="date" name="dob" id="dob"
                    class="form-control bg-dark text-white @error('dob') is-invalid @enderror"
                    placeholder="Enter Date Of Birth..." value="{{ old('dob', $student->dob) }}">
                <div class="invalid-feedback">
                    @error('dob')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="college_id" class="col-md-3 col-form-label">College</label>
            <div class="col-md-9">
                <select name="college_id" id="college_id" class="form-control bg-dark text-white select-no-arrow
                    @error('college_id') is-invalid @enderror">
                    @foreach ($colleges as $id => $name)
                        <option value="{{ $id }}" {{ old('college_id', $student->college_id) == $id ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    @error('college_id')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <hr style="border-top: 1px solid #fff;">
            <div class="row justify-content-around">
                <button type="submit" class="btn btn-primary">Save Student</button>
                <a onclick="window.history.back()" class="btn btn-outline-secondary">Cancel</a>
            </div>
    </div>
</div>