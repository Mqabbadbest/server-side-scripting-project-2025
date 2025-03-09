<div class="row">
    <div class="col-md-12">
        <div class="form-group row mb-5">
            <label for="name" class="col-md-3 col-form-label">Name</label>
            <div class="col-md-9">
                <input type="text" name="name" id="name"
                    class="form-control bg-dark text-white @error('name') is-invalid @enderror"
                    placeholder="Enter College Name..." value="{{ old('name', $college->name) }}">
                <div class="invalid-feedback">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group row mb-5">
            <label for="address" class="col-md-3 col-form-label">Address</label>
            <div class="col-md-9">
                <input type="text" name="address" id="address"
                    class="form-control bg-dark text-white @error('address') is-invalid @enderror"
                    placeholder="Enter College Address..." value="{{ old('address', $college->address) }}">
                <div class="invalid-feedback">
                    @error('address')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <hr style="border-top: 1px solid #fff;">
        <div class="row justify-content-around">
            <button type="submit" class="btn btn-primary">Save College</button>
            <a onclick="window.history.back()" class="btn btn-outline-secondary">Cancel</a>
        </div>
    </div>
</div>