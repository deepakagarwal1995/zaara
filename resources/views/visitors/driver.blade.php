@extends('visitors.layout')

@section('content')


<style>
    .col-md-6,.col-md-12 {
          padding: 10px 5px;
    }
.bookCutdtl {
    background: #c3def3;    max-width: 800px;
    margin: auto;
}
.text-danger{
    color: red;
}
    .form-control {
    display: block;
    margin-top: 6px;
    width: 100%;
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}
label{
    font-size: 13px;

    display: inline-block;
    text-transform: capitalize;
    font-weight: 600;
}
</style>

    <section>
        <div class="container">
            <form method="post" action="{{ route('driver_registration.action') }}" enctype="multipart/form-data" >
                @csrf


                <div class="clearfix">
                    <div class="col-sm-12">
                        <div class="bookCutdtl">
                            <h3>Driver Registration</h3>


                            <div class="formGrp">
                                <ul class="clearfix">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                        <input type="text" class="form-control" value="{{ old('name') }}" name="name"
                                        required />
                                    @error('name')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror

                                    </div>
                                    <div class="col-md-6">
                                        <label>Contact No.</label>
                                        <input type="number" pattern="[6789][0-9]{9}" class="form-control" value="{{ old('phone') }}" name="phone"
                                        required />
                                    @error('phone')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label>Address</label>
                                        <textarea class="form-control"
                                            name="address" required>{{ old('address') }}</textarea>
                                        @error('address')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>License</label>
                                        <input type="text" class="form-control" value="{{ old('license') }}" name="license"  required >
                                        @error('license')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>City</label>
                                    <input id="from-city" type="text" class="form-control" value="{{ old('city') }}" name="city"  required >
                                        @error('city')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                <input id="from-lat" type="hidden" />
                                <input id="from-lng" type="hidden" />
                                    </div>

                                    <div class="col-md-6">
                                        <label>Registration No</label>
                                        <input type="text" class="form-control" value="{{ old('registration') }}" name="registration"  required >
                                        @error('registration')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Year Of Manufacture</label>
                                        <input type="text" class="form-control" value="{{ old('year') }}" name="year"  required >
                                        @error('year')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Insurance Expiry Date</label>
                                        <input type="date" class="form-control" value="{{ old('lisence_exp') }}" name="lisence_exp"  required >
                                        @error('lisence_exp')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Vehicle Type</label>
                                        <select class="form-control" name="cab_id"  required>
                                            <option value="">Select Vehicle Type</option>
                                            @foreach($cabs as $cab)
                                                <option value="{{$cab->id }}">{{ $cab->title }} ({{ $cab->name }})</option>
                                            @endforeach
                                        </select>
                                        @error('cab_id')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label>Upload Driver licence (MAX 2MB)</label>
                                        <input type="file" accept="image/*" class="form-control" value="{{ old('license_img') }}" name="license_img"    >
                                        @error('license_img')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label>Upload Insurance Paper (MAX 2MB)</label>
                                        <input type="file" accept="image/*" class="form-control" value="{{ old('insuranse_img') }}" name="insuranse_img"    >
                                        @error('insuranse_img')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label>Upload RC Image (MAX 2MB)</label>
                                        <input type="file" accept="image/*" class="form-control" value="{{ old('registration_img') }}" name="registration_img"    >
                                        @error('registration_img')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <button class="bookcb" type="submit">Register</button>
                                    </div>

                                </ul>

                            </div>

                        </div>
                    </div>

                </div>
            </form>
        </div>
    </section>
@endsection

@section('script')
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
@endsection
