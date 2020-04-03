@include('layouts.app')

<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
    <div class="modal-header">
    <h2 class="modal-title" id="exampleModalLongTitle" align="center">
        <i class="glyphicon glyphicon-log-in">Update Schedule</i></h2>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">



    {!! Form::open(['action' => ['BusScheduleController@update', $schedule->schedule_id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}

    {{ csrf_field() }}
    <fieldset>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                        <select name="operator_id" class="form-control">
                            <option value="">Select Operator</option>
                            @foreach ($operators as $operator)
                            <option value="{{$operator->operator_id}}">{{$operator->operator_name}}</option>
                            @endforeach
                        </select>
                </div>
                </div>
            <div class="col-md-6">
                <div class="form-group">
                        <!-- <label for="exampleInputPassword1">Seat No</label> -->
                        <select name="bus_id" class="form-control">
                            <option value="">Select Bus</option>
                            @foreach ($buses as $bus)
                            <option value="{{$bus->bus_id}}">{{$bus->bus_name}}</option>
                            @endforeach
                        </select>
                </div>
            </div>
        </div>
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                        <!-- <label for="exampleInputPassword1">Seat No</label> -->
                        <select name="region_id" class="form-control">
                            <option value="">Select Region</option>
                            @foreach ($regions as $region)
                            <option value="{{$region->region_id}}">{{$region->region_name}}</option>
                            @endforeach
                        </select>
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                            <!-- <label for="exampleInputPassword1">Seat No</label> -->
                            <select name="sub_region_id" class="form-control">
                                <option value="">Select Sub Region</option>
                                @foreach ($subregions as $subregion)
                                <option value="{{$subregion->sub_region_id}}">{{$subregion->sub_region_name}}</option>
                                @endforeach
                            </select>
                      </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <label for="depart_date">Depart Date</label>
                    <input name="depart_date" id="depart_date"  class="form-control" aria-describedby="emailHelp"
                    placeholder="Enter Depart Date" type="date">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label for="depart_time">Depart Time</label>
                    <input name="depart_time" id="depart_time" rows="2" cols="20" class="form-control" 
                    placeholder="Enter Depart Time" type="time">
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <label for="return_date">Return Date</label>
                    <input name="return_date" id="return_date"  class="form-control" aria-describedby="emailHelp"
                    placeholder="Enter Return Date" type="date">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label for="return_time">Return Time</label>
                    <input name="return_time" id="return_time" rows="2" cols="20" class="form-control" 
                    placeholder="Enter Return Time" type="time">
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <!-- <label for="exampleInputEmail1">Bus Name</label> -->
                    <textarea name="pickup_address"  class="form-control" aria-describedby="emailHelp"
                    placeholder="Enter Pickup Address" type="text"></textarea>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <!-- <label for="exampleInputPassword1">Seat No</label> -->
                    <textarea name="dropoff_address" rows="2" cols="20" class="form-control" 
                    placeholder="Enter Dropoff Address" type="text"></textarea>
                </div>
                </div>
            </div>
          <div class="col-md-3">
          <div class="form-group">
                <input name="status"  aria-describedby="emailHelp" type="checkbox">
                <label for="exampleInputEmail1">Book</label>
          </div>
          </div>

      </fieldset>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Update Operator</button>
    {{Form::hidden('_method','PUT')}}
    {{-- {{Form::submit('submit', ['class' => 'btn btn-primary'])}} --}}
    {!! Form::close() !!}
    </div>
</div>
</div>