<div class="indent"><b> + number + </b></div>;
<div class="row">;
    <div class=" form-group col-md-6 date">;
        <label>Date</label> &nbsp;;
        <i class="fa fa-calendar"></i>;
        <input type="text" value="Date of service" class="form-control datepicker" required name="sta[]">;
    </div>
    ;
    <div class="col-md-6 bootstrap-timepicker form-group">;
        <label>Time</label> &nbsp;;
        <i class="fa fa-clock-o"></i>;
        <input type="text" class="form-control timepicker" required name="end[]">;
    </div>
</div>;
<div class="group">;
    <div class="form-group"><label>Title</label> &nbsp;;
        <i class="fa fa-pencil"></i>;
        <textarea class="form-control" name="tit[]" id="tit + number + " rows="1" autocomplete="off"></textarea>;
    </div>
    ;
    <div class="form-group">;
        <label>Detail</label> &nbsp;;
        <i class="fa fa-pencil"></i>;
        <textarea class="form-control" name="des[]" id="des + number + " rows="2" autocomplete="off"></textarea>;
    </div>
</div>;
<div class="row">;
    <div class="form-group col-md-4"><label>Province</label> &nbsp;;
        <select name="pro + number + " class="form-group select2 detail" id="pro + number + " required
                data-id=" + number + ">;
        </select>;
    </div>
    ;
    <div class="form-group col-md-4"><label>Type</label> &nbsp;;
        <select name="type + number + " class="form-group select2 detaill" id="type + number + " required
                data-id=" + number + ">;
            <option disabled selected>SELECT</option>
            ;
            @foreach($types as $type);
            <option value="{{ $type->id }}" required>{{ $type->name }}</option>;
            @endforeach;
        </select>;
    </div>
    ;
    <div class="form-group col-md-4"><label>Service</label> &nbsp;;
        <select name="ser[]" class="form-group select2 detaill" id="ser + number + " required data-id=" + number + ">;
            <option disabled selected>SELECT</option>
            ;
            @foreach($services as $service);
            @if($service->category_id == 1);
            <option value="{{ $service->id }}" required>{{ $service->name }}</option>;
            @endif;
            @endforeach;
        </select>;
    </div>
</div>;