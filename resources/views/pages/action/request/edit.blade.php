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
    <div class="page-wrap">
        <div class="container">
            <div class="w3agile-about-section-head text-center">
                <h2>Tour Detail</h2>
                <span></span>
            </div>
            <div class="centeredDiv">
                <h3>Plan Your Tour Here </h3>
                <hr>
                <form action="" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="numb" id="numb" value="">
                    <div class="form-group">
                        <label>Tour Name</label> &nbsp;
                        <i class="fa fa-commenting-o"></i>
                        <input class="form-control" name="title" required autocomplete="off"
                               value="{{ $plann->title }}"/>
                    </div>
                    <div class="form-group">
                        <label>Visiting provinces</label> &nbsp;
                        <i class="fa fa-location-arrow"></i>
                        @php
                            $choiceSArr = [];
                            foreach ($choices as $choice) {
                                $choiceSArr[] = $choice->province_id;
                            }
                        @endphp
                        <select name="proChoice[]" class="form-control select2" id="mySelectBox" multiple required>
                            @foreach($provinces as $province)
                                <option value="{{ $province->id }}"
                                        {{ in_array($province->id, $choiceSArr) ? 'selected' : '' }}
                                >{{ $province->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 date">
                            <label>From</label> &nbsp;
                            <i class="fa fa-calendar"></i>
                            <input name="time_from" type="text" class="form-control datepicker" required
                                   value="{{ $plann->time_from }}">
                        </div>
                        <div class="form-group col-md-6 date">
                            <label>To</label> &nbsp;
                            <i class="fa fa-calendar"></i>
                            <input name="time_to" type="text" class="form-control datepicker" required
                                   value="{{ $plann->time_to }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description</label> &nbsp;
                        <i class="fa fa-pencil"></i>
                        <textarea class="form-control" rows="3" name="description" required
                                  autocomplete="off">{{ $plann->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <span><b>Detail</b></span> &nbsp;
                        <i class="fa fa-location-arrow"></i>
                        @php
                            $tab = '&nbsp;&nbsp;&nbsp;&nbsp;';
                        @endphp
                        <div class="details">
                            @foreach($details as $detail)
                                <?php
                                switch ($detail->type) {
                                    case 1:
                                        $route_namePF = 'hotelPF';
                                        break;

                                    case 2:
                                        $route_namePF = 'restaurantPF';
                                        break;

                                    case 3:
                                        $route_namePF = 'activityPF';
                                        break;

                                    default:
                                        $route_namePF = '';
                                        break;
                                }
                                ?>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5><b>Date</b>{{ $tab }}{{ $detail->date }}</h5>
                                    </div>
                                    <div class="col-md-3">
                                        <h5><b>From</b>{{ $tab }}{{ $detail->started_at }}</h5>
                                    </div>
                                    <div class="col-md-3">
                                        <h5><b>To</b>{{ $tab }}{{ $detail->end_at }}</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5><b>Province</b>{{ $tab }}{{ $detail->pro_name }}</h5>
                                    </div>
                                    <div class="col-md-3">
                                        <h5><b>Type</b>{{ $tab }}{{ $detail->cat_name }}</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <h5><b>Service</b>{{ $tab }}<a target="_blank"
                                                                       href="{{ route($route_namePF, [$detail->pro_name, $detail->type, $detail->ser_name]) }}">{{ $detail->ser_name }}</a>
                                        </h5>
                                    </div>
                                </div>
                                <div><h5><b>Detail</b>{{ $tab }}{{ $detail->detail }}</h5></div>
                                <hr>
                            @endforeach
                        </div>
                    </div>
                    <div id="expand"></div>
                    <button type="button" id="add"><i class="fa fa-plus"></i></button>
                    <button type="button" id="minus"><i class="fa fa-minus"></i></button>
                    <span><b><em>Press <i class="fa fa-plus"></i> to add plan</em></b></span>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"
                                       onchange="document.getElementById('btnt').disabled = !this.checked"/>
                                I will agree to Framgia Trip <a href="#">Term & Condition</a>
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success" name="btn" id="btnt" disabled>Save</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
                    <a id="delete" class="pull-right" href="{{ route('requestDelete', $plann->id) }}">DELETE THIS
                        PLAN</a>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection

@section('script')
    {{ HTML::script('bower_components/AdminLTE/plugins/select2/select2.full.js') }}
    {{ HTML::script('bower_components/AdminLTE/plugins/datepicker/bootstrap-datepicker.js') }}
    {{ HTML::script('bower_components/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.js') }}
    <script>
        (function ($) {
            $(".select2").select2();
            $('.datepicker').datepicker({
                autoclose: true
            });
            $("#timepicker").timepicker({
                showInputs: false
            });
        })(jQuery);
        var number = 0;
        var i = 0;
        var select = [];
        $("#mySelectBox").change(function () {
            var province = [];
            $.each($("#mySelectBox option:selected"), function () {
                province.push({
                    id: $(this).val(),
                    name: $(this).text()
                });
            });
            var change = '';
            for (i = 0; i < province.length; i++) {
                change += '<option value = "' + province[i].id + '"> ' + province[i].name + '</option>';
            }
            $(".detail").html(change);
        });
        $("#add").click(function () {
            var changes = '';
            var province = [];
            $.each($("#mySelectBox option:selected"), function () {
                province.push({
                    id: $(this).val(),
                    name: $(this).text()
                });
            });
            var change = '';
            change += '<option disabled selected>SELECT</option>';
            for (j = 0; j < province.length; j++) {
                change += '<option value = "' + province[j].id + '"> ' + province[j].name + '</option>';
            }
            number++;
            $("#numb").val(number)
            changes += '<div class="indent"><b>' + number + '</b></div>';
            changes += '<div class="row">';
            changes += '<div class=" form-group col-md-3 date">';
            changes += '<label>Date</label> &nbsp;';
            changes += ' <i class="fa fa-calendar"></i>';
            changes += '<input type="text" value="Date of service" class="form-control datepicker" required name="date[]">';
            changes += '</div>';
            changes += '<div class="col-md-3 bootstrap-timepicker form-group">';
            changes += '<label>From</label> &nbsp;';
            changes += '<i class="fa fa-clock-o"></i>';
            changes += '<input type="text" class="form-control timepicker" required name="sta[]">';
            changes += '</div>';
            changes += '<div class="col-md-3 bootstrap-timepicker form-group">';
            changes += '<label>To</label> &nbsp;';
            changes += '<i class="fa fa-clock-o"></i>';
            changes += '<input type="text" class="form-control timepicker" required name="end[]">';
            changes += '</div></div>';
            changes += '<div class="group">';
            changes += '<div class="form-group">';
            changes += '<div class="row">';
            changes += '<div class="form-group col-md-4"> <label>Province</label> &nbsp;';
            changes += '<select name="pro' + number + '" class="form-group select2 detail" id="pro' + number + '" required data-id="' + number + '">';
            changes += '</select>';
            changes += '</div>';
            changes += '<div class="form-group col-md-4"> <label>Type</label> &nbsp;';
            changes += '<select name="type' + number + '" class="form-group select2 detaill" id="type' + number + '" required data-id="' + number + '">';
            changes += '<option disabled selected>SELECT</option>';
            changes += '@foreach($types as $type)';
            changes += '<option value="{{ $type->id }}" required>{{ $type->name }}</option>';
            changes += '@endforeach';
            changes += '</select>';
            changes += '</div>';
            changes += '<div class="form-group col-md-4"> <label>Service</label> &nbsp;';
            changes += '<select name="ser[]" class="form-group select2 detaill" id="ser' + number + '" required data-id="' + number + '">';
            changes += '<option disabled selected>SELECT</option>';
            changes += '@foreach($services as $service)';
            changes += '@if($service->category_id == 1)';
            changes += '<option value="{{ $service->id }}" required>{{ $service->name }}</option>';
            changes += '@endif';
            changes += '@endforeach';
            changes += '</select>';
            changes += '</div></div>';
            changes += '<label>Detail</label> &nbsp;';
            changes += '<i class="fa fa-pencil"></i>';
            changes += '<textarea class="form-control" name="des[]" id="des' + number + '" rows="2" autocomplete="off"></textarea>';
            changes += '</div></div>';
            i = number;
            $("#expand").append(changes);
            $("#pro" + i).html(change);
            $('.datepicker').datepicker({
                autoclose: true
            });
            $(".timepicker").timepicker({
                showInputs: false
            });
        });
        $("#minus").click(function () {
            $("#expand > div").last().remove();
            $("#expand > div").last().remove();
            $("#expand > div").last().remove();
            $("#expand > div").last().remove();
            number = (number > 0) ? number - 1 : 0;
            $("#numb").val(number)
        })
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        function call_service(province_id, type_id, id) {
            $.ajax({
                url: '/service/' + province_id + '/' + type_id,
                type: 'GET',
                data: {
                    province_id: province_id,
                    type_id: type_id
                },
            })
                .done(function (data) {
                    var html = '';
                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id + '" required>' + data[i].name + '</option>';
                    }
                    $('#ser' + id).html(html);
                });
        }

        $(document).on('change', 'select[name^=pro]', function () {
            var id = $(this).data('id');
            var province_id = $(this).val();
            var type_id = $('select[name=type' + id + ']').val();

            call_service(province_id, type_id, id);
        });
        $(document).on('change', 'select[name^=type]', function () {
            var id = $(this).data('id');
            var type_id = $(this).val();
            var province_id = $('select[name=pro' + id + ']').val();

            call_service(province_id, type_id, id);
        });
    </script>
@endsection
