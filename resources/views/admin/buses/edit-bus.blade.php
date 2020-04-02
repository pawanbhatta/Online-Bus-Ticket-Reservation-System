@include('layouts.app')

{{-- <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"> --}}
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLongTitle" align="center">
            <i class="glyphicon glyphicon-log-in">Update Bus Info</i></h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">



        {!! Form::open(['action' => ['BusController@update', $bus->bus_id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}

        {{ csrf_field() }}
        <fieldset>
            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                {{-- <label for="operator_name">Operator Name</label> --}}
                <input value="{{ $bus->bus_name }}" name="bus_name" id="bus_name" class="form-control" aria-describedby="emailHelp"
                    placeholder="Enter Bus Name" type="text">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                {{-- <label for="operator_email">Operator Email</label> --}}
                <input value="{{$bus->bus_code}}" name="bus_code" id="bus_code" class="form-control" aria-describedby="emailHelp" 
                    placeholder="Enter Bus Number" type="email">
                </div>
            </div>
                {{-- </div> --}}
                <div class="form-group">
                {{-- <label for="operator_phone">Operator Phone</label> --}}
                <input value="{{$bus->total_seats}}" name="total_seats" id="total_seats" class="form-control" aria-describedby="emailHelp"
                    placeholder="Enter Total Number of seats" type="text">
                </div>
                <div class="form-group">
                {{-- <label for="operator_address">Operator Address</label> --}}
                <textarea value="{{$operator->operator_address}}" name="operator_address" id="operator_address" rows="2" cols="20" class="form-control" 
                placeholder="Enter Operator Address" type="text"></textarea>
                </div>
                {{-- <div class="form-group">
                    <!-- <label for="exampleInputPassword1">Seat No</label> -->
                    <textarea name="operator_description" rows="2" cols="20" class="form-control" 
                    placeholder="Enter Operator Description" type="text"></textarea>
                </div> --}}
                <div class="col-md-3">
                <div class="form-group">
                    <input value="{{$bus->status}}" name="status"  aria-describedby="emailHelp" type="checkbox">
                    <label for="exampleInputEmail1">Available</label>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                        <label class="control-label">Image</label>
                        <input value="{{$bus->bus_image}}" type="file" name="bus_image">
            </div>
            </div>
        </fieldset>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update Bus</button>
        {{Form::hidden('_method','PUT')}}
        {{-- {{Form::submit('submit', ['class' => 'btn btn-primary'])}} --}}
        {!! Form::close() !!}



        {{-- <form method="put" action="/operator/{{ $operator->operator_id }}" enctype="multipart/form-data"> --}}
        {{-- <form method="post" action="/store" enctype="multipart/form-data"> --}}

        
        {{-- </form>  --}}
        </div>
    </div>
    </div>
{{-- </div> --}}

