@extends('admin.layouts.master')

@section('contents')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="text-align: center">Add Provinces
                    </h1>
                </div>
                <div class="col-lg-9" style="padding-bottom:120px;float: none;margin: auto">
                    <form action="{{ route('provincePostAdd') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" name="name" required autocomplete="off"
                                   placeholder="Please Enter Province"/>
                        </div>
                        <div class="form-group">
                            <label>Background Image</label>
                            <input class="form-control" name="bg_url" autocomplete="off"
                                   placeholder="Add Url"/>
                        </div>
                        <div class="form-group">
                            <label>Profile Image</label>
                            <input class="form-control" name="img_url" required autocomplete="off"
                                   placeholder="Add Url"/>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="5" name="description" autocomplete="off"
                                      placeholder="Please Enter Description"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"
                                           onchange="document.getElementById('btnt').disabled = !this.checked"/>
                                    Are you sure to add this province
                                </label>
                            </div>

                        <button type="submit" class="btn btn-success" name="btn" id="btnt" disabled>Add</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
