@extends('layouts.master')

@section('style')
    {{ HTML::style('bower_components/AdminLTE/plugins/select2/select2.min.css') }}
    {{ HTML::style('bower_components/AdminLTE/plugins/datepicker/datepicker3.css') }}
    {{ HTML::style('bower_components/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.css') }}
    {{ HTML::style('css/requestTour.css') }}
@endsection


@section('header')
    @include('includes.header')
@endsection

@section('content')
    <div class="container">
        <div class="w3agile-about-section-head text-center">
            <h2>Service Request</h2>
            <span></span>
        </div>
        <div class="centeredDiv">
            <h3>Tell us about your service detail</h3>
            <hr>
            <form action="{{ route('service.request.post') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label>Service Name</label> &nbsp;
                    <i class="fa fa-commenting-o"></i>
                    <input class="form-control" name="name" required autocomplete="off"
                           placeholder="Please Enter Service Name"/>
                </div>

                <div class="form-group">
                    <label>Service Category</label> &nbsp;
                    <i class="fa fa-location-arrow"></i>
                    <select name="category_id" class="form-control select2" id="category">
                        <option disabled selected value>Select Service Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Province</label> &nbsp;
                    <i class="fa fa-map"></i>
                    <select name="province_id" class="form-control select2">
                        <option disabled selected value>Select Province</option>
                        @foreach($provinces as $province)
                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Address</label> &nbsp;
                    <i class="fa fa-map-marker"></i>
                    <textarea class="form-control" rows="1" name="address" autocomplete="off"
                              placeholder="Please Enter Address"></textarea>
                </div>
                <div class="form-group" id="phone">
                    <label>Phone Contact</label> &nbsp;
                    <i class="fa fa-phone"></i>
                    <textarea class="form-control" rows="1" name="phone" autocomplete="off"
                              placeholder="Please Enter Contact Number Of Service"></textarea>
                </div>
                <div class="form-group" id="price">
                    <label>Expected Price</label> &nbsp;
                    <i class="fa fa-usd"></i>
                    <textarea class="form-control" rows="1" name="expected_price" autocomplete="off"
                              placeholder="Average Price"></textarea>
                </div>
                <div class="form-group" id="opentime">
                    <label>Open Time</label> &nbsp;
                    <i class="fa fa-clock-o"></i>
                    <textarea class="form-control" rows="1" name="open_time" autocomplete="off"
                              placeholder="From ... To ..."></textarea>
                </div>
                <div class="form-group" id="profile_pic">
                    <label>Image Url</label> &nbsp;
                    <i class="fa fa-link"></i>
                    <textarea class="form-control" rows="1" name="profile_pic" autocomplete="off"
                              placeholder="Image Url For Profile Picture"></textarea>
                </div>
                <div class="form-group">
                    <label>Description</label> &nbsp;
                    <i class="fa fa-pencil"></i>
                    <textarea class="form-control" rows="3" name="description" autocomplete="off"
                              placeholder="Please Enter Description"></textarea>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"
                                   onchange="document.getElementById('btnt').disabled = !this.checked"/>
                            I will agree to Framgia Trip <a href="#">Term & Condition</a>
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-success" name="btn" id="btnt" disabled>Submit</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
@endsection

@section('script')
    <script>
        $('#category').change(function () {
            if ($('#category').val() == 1) {
                $('#opentime').css('display', 'none');
                $('#opentime').val('');
                $('#price').css('display', 'inherit');
                $('#phone').css('display', 'inherit');
            }

            if ($('#category').val() == 2) {
                $('#opentime').css('display', 'inherit');
                $('#price').css('display', 'inherit');
                $('#phone').css('display', 'inherit');
            }

            if ($('#category').val() == 3) {
                $('#opentime').css('display', 'inherit');
                $('#price').css('display', 'inherit');
                $('#phone').css('display', 'none');
                $('#phone').val('');
            }

        });
    </script>
@endsection
