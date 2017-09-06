@extends('layouts.master')

@section('style')
    {{ HTML::style('css/userPF.css', ['rel' => 'stylesheet']) }}
    {{ HTML::style('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}
@endsection

@section('header')
    @include('includes.header')
@endsection

@section('content')
    <div class="container" id="content">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img id="img" class="profile-user-img img-responsive img-circle"
                                 src="{{ asset('bower_components/AdminLTE/dist/img/user3-128x128.jpg') }}"
                                 alt="User profile picture">

                            <h2 class="profile-username text-center">{{Auth::user()->name}}</h2>

                            <p class="text-muted text-center">Tourist</p>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Plan</b> <a class="pull-right"></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Gallery</b> <a class="pull-right"></a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h2 class="box-title">About Me</h2>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <strong>Biography</strong>
                            <p class="text-muted">
                                {{Auth::user()->self_describe}}
                            </p>
                            <hr>

                            <strong>Email</strong>
                            <p class="text-muted">
                                {{Auth::user()->email}}
                            </p>
                            <hr>

                            <strong>Birthday</strong>
                            <p class="text-muted">{{Auth::user()->date_of_birth}}</p>
                            <hr>

                            <strong>Gender</strong>
                            <p class="text-muted">{{Auth::user()->gender}}</p>
                            <hr>

                            <strong>Phone</strong>
                            <p class="text-muted">{{Auth::user()->phone}}</p>
                            <hr>

                            <strong>Address</strong>
                            <p class="text-muted">{{Auth::user()->address}}</p>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs" id="tabMenu">
                            <li class="active"><a href="#gallery" data-toggle="tab">Gallery</a></li>
                            <li><a href="#plans" data-toggle="tab">Plans</a></li>
                            <li><a href="#RS" data-toggle="tab">Requested Service</a></li>
                            <li><a href="#settings" data-toggle="tab">Settings</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="active tab-pane" id="gallery">
                                <div class="container">
                                    <div class="row">
                                        <div class="gallery">
                                            <figure>
                                                <img id="img" src="http://lorempixel.com/500/500/nature"
                                                     class="resize"/>
                                                <figcaption>Daytona Beach
                                                    <small>United States</small>
                                                </figcaption>
                                            </figure>
                                            <figure>
                                                <img id="img" src="http://lorempixel.com/500/500/nature"
                                                     class="resize"/>
                                                <figcaption>Териберка, gorod Severomorsk
                                                    <small>Russia</small>
                                                </figcaption>
                                            </figure>
                                            <figure>
                                                <img id="img" src="http://lorempixel.com/500/500/nature"
                                                     class="resize"/>
                                                <figcaption>
                                                    Bad Pyrmont
                                                    <small>Deutschland</small>
                                                </figcaption>
                                            </figure>
                                            <figure>
                                                <img id="img" src="http://lorempixel.com/500/500/nature"
                                                     class="resize"/>
                                                <figcaption>Yellowstone National Park
                                                    <small>United States</small>
                                                </figcaption>
                                            </figure>
                                            <figure>
                                                <img id="img" src="http://lorempixel.com/500/500/nature"
                                                     class="resize"/>
                                                <figcaption>Quiraing, Portree
                                                    <small>United Kingdom</small>
                                                </figcaption>
                                            </figure>
                                            <figure>
                                                <img id="img" src="http://lorempixel.com/500/500/nature"
                                                     class="resize"/>
                                                <figcaption>Highlands
                                                    <small>United States</small>
                                                </figcaption>
                                            </figure>
                                            <figure>
                                                <img id="img" src="http://lorempixel.com/500/500/nature"
                                                     class="resize"/>
                                                <figcaption>Daytona Beach
                                                    <small>United States</small>
                                                </figcaption>
                                            </figure>
                                            <figure>
                                                <img id="img" src="http://lorempixel.com/500/500/nature"
                                                     class="resize"/>
                                                <figcaption>Териберка, gorod Severomorsk
                                                    <small>Russia</small>
                                                </figcaption>
                                            </figure>
                                            <figure>
                                                <img id="img" src="http://lorempixel.com/500/500/nature"
                                                     class="resize"/>
                                                <figcaption>
                                                    Bad Pyrmont
                                                    <small>Deutschland</small>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div>
                            <div class="tab-pane" id="plans">
                                <div class="wrap">
                                    @foreach($plans as $plan)
                                        @php
                                            $img = '';
                                            $location = $plan->plan_location->random(1)->first();
                                            if ($location) {
                                                $img = $location->province->img_url;
                                            }
                                        @endphp
                                        <a href="{{ route('requestEditGet', $plan->id) }}">
                                            <div class="tile">
                                                <img src='{{ $img }}'/>
                                                <div class="text">
                                                    <h2>{{ $plan->title }}</h2>
                                                    <h5 class="animate-text">{{ $plan->time_from }} >>> {{ $plan->time_to }}</h5>
                                                    @foreach($plan->plan_location as $planLocation)
                                                        <h5 class="animate-text">
                                                            <i class="fa fa-hand-o-right"></i>
                                                            {{ $planLocation->province->name }}
                                                        </h5>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane" id="RS">
                                <input type="checkbox" class="checkbox1" id="all" value="all">All
                                <input type="checkbox" class="checkbox1" id="hotel" value="hotel">Hotel
                                <input type="checkbox" class="checkbox1" id="restaurant" value="restaurant">Restaurant
                                <input type="checkbox" class="checkbox1" id="activity" value="activity">Activity<br>
                                <input type="checkbox" class="checkbox1" id="all1" value="all1">All
                                <input type="checkbox" class="checkbox1" id="pending" value="pending">Pending
                                <input type="checkbox" class="checkbox1" id="approved" value="approved">Approved
                                <input type="checkbox" class="checkbox1" id="canceled" value="canceled">Canceled
                                @foreach($RServices as $RService)
                                    <div class="item">
                                        <div class='list-card'>
                                            <input type="hidden" class="categoryID"
                                                   value={{$RService->category_id}}>
                                            <input type="hidden" class="status"
                                                   value={{$RService->status}}>
                                            <button type="button" class="abc"></button>
                                            <button type="button" class="abcd"></button>
                                            <div class='list-label hotel'>Hotel</div>
                                            <div class='list-label restaurant'>Restaurant</div>
                                            <div class='list-label activity'>Activity</div>
                                            <div class='list-label pending'>Pending</div>
                                            <div class='list-label canceled'>Cancel</div>
                                            <div class='list-label approved'>Approved</div>
                                            <div class='list-label modified'>Modified</div>
                                            <img alt='' src={{$RService->profile_pic}}>
                                            <div class='list-details' id="list-details">
                                                <div class='list-location'>
                                                    {{ $RService->address }}
                                                </div>
                                                <div class='list-name'>
                                                    <a>
                                                        <strong>{{ $RService->name }}</strong>
                                                    </a>
                                                </div>

                                                <div class='list-location'>
                                                    <span class="fa fa-map-marker"></span>
                                                    {{ $RService->address }}
                                                </div>

                                                <div class='list-location'>
                                                    <span class="fa fa-map"></span>
                                                    @foreach($provinces as $province)
                                                        @if($province->id == $RService->province_id)
                                                            {{ $province->name }}
                                                        @endif
                                                    @endforeach
                                                </div>

                                                @if($RService->category_id == 1 || $RService->category_id == 2)
                                                    <div class='list-location'>
                                                        <span class=" fa fa-phone"></span>
                                                        {{ $RService->phone }}
                                                    </div>
                                                @endif

                                                @if($RService->category_id == 2 || $RService->category_id == 3)
                                                    <div class='list-location'>
                                                        <span class="fa  fa-clock-o"></span>
                                                        {{ $RService->open_time }}
                                                    </div>
                                                @endif

                                                <div class='list-price'>{{ $RService->description }}</div>
                                                <div class='list-location'>
                                                    <span>{{ $RService->expected_price }} $ AVG</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="tab-pane" id="settings">
                                <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Name</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name"
                                                   value="{{Auth::user()->name}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Email</label>

                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="email"
                                                   value="{{Auth::user()->email}}" readonly="true">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">{{ __('Gender') }}</label>
                                        <div class="col-sm-10">
                                            <div class="col-sm-2">
                                                <input type="radio" name="gender" value="Male"
                                                       id="male" {{ Auth::user()->gender == 'Male' ? 'checked' : '' }}>
                                                Male<br>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="radio" name="gender" value="Female"
                                                       id="female" {{ Auth::user()->gender == 'Female' ? 'checked' : '' }}>
                                                Female<br>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="radio" name="gender" value="Other"
                                                       id="other" {{ Auth::user()->gender == 'Other' ? 'checked' : '' }}>
                                                Other<br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="date_of_birth" class="col-sm-2 control-label">Birthday</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="pickyDate" class="form-control" name="date_of_birth"
                                                   value="{{ Auth::user()->date_of_birth }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="address" class="col-sm-2 control-label">Address</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="address"
                                                   value="{{Auth::user()->address}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="col-sm-2 control-label">Phone</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="phone"
                                                   value="{{Auth::user()->phone}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="self_describe" class="col-sm-2 control-label">Biography</label>

                                        <div class="col-sm-10"><textarea class="form-control" rows="3"
                                                                         name="self_describe">{{Auth::user()->self_describe}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"
                                                           onchange="document.getElementById('btnt').disabled = !this.checked"/>
                                                    I agree to the <a href="#">terms and conditions</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <input type="submit" name="btn" id="btnt" value="Submit"
                                                   class="btn btn-danger"
                                                   disabled/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.nav-tabs-custom -->
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </section>
    </div>
@endsection

@section('script')
    {{ HTML::script('bower_components/AdminLTE/dist/js/app.min.js') }}
    {{ HTML::script('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}
    {{ HTML::script('js/userPF.js', ['type' => 'text/javascript']) }}
    <script>
        //redirect to specific tab
        $(document).ready(function () {
            $('#tabMenu a[href="#{{ old('tab') }}"]').tab('show')
        });
    </script>
@endsection
