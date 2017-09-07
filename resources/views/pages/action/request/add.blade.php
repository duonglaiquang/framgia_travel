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
            <h2>About Your Tour</h2>
            <span></span>
        </div>
        <div class="centeredDiv">
            <h3>Tell us about your tour requirements</h3>
            <hr>
            <form action="{{ route('requestPost') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label>Tour Name</label> &nbsp;
                    <i class="fa fa-commenting-o"></i>
                    <input class="form-control" name="title" required autocomplete="off"
                           placeholder="Please Enter Tour Name"/>
                </div>
                <div class="form-group">
                    <label>Visiting provinces</label> &nbsp;
                    <i class="fa fa-location-arrow"></i>
                    <select name="proChoice[]" class="form-control select2" multiple>
                        @foreach($provinces as $province)
                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 date">
                        <label>From</label> &nbsp;
                        <i class="fa fa-calendar"></i>
                        <input name="time_from" type="text" class="form-control" id="datepicker">
                    </div>
                    <div class="form-group col-md-6 date">
                        <label>To</label> &nbsp;
                        <i class="fa fa-calendar"></i>
                        <input name="time_to" type="text" class="form-control" id="datepicker2">
                    </div>
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
                <button type="submit" class="btn btn-success" name="btn" id="btnt" disabled>Create</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
@endsection

@section('script')
    {{ HTML::script('bower_components/AdminLTE/plugins/select2/select2.full.js') }}
    {{ HTML::script('bower_components/AdminLTE/plugins/datepicker/bootstrap-datepicker.js') }}
    {{ HTML::script('bower_components/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.js') }}
    <script>
        (function ($) {
            $("#dayup").on("click", function () {
                $("#days").val(parseInt($("#days").val(), 10) + 1);
            });
            $("#daydown").on("click", function () {
                if ($("#days").val() > 0)
                    $("#days").val(parseInt($("#days").val(), 10) - 1);
            });
            $(".select2").select2();
            $('#datepicker').datepicker({
                autoclose: true
            });
            $('#datepicker2').datepicker({
                autoclose: true
            });
        })(jQuery);
    </script>
@endsection
