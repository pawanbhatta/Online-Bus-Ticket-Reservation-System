@include('layouts.app')
@include('admin.message')

{{-- <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"> --}}
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLongTitle" align="center">
            <i class="glyphicon glyphicon-log-in">Update Operator</i></h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">



        {!! Form::open(['action' => ['OperatorController@update', $operator->operator_id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}

        {{ csrf_field() }}
        <fieldset>
            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                {{-- <label for="operator_name">Operator Name</label> --}}
                <input value="{{ $operator->operator_name }}" name="operator_name" id="operator_name" class="form-control" aria-describedby="emailHelp"
                    placeholder="Enter Operator Name" type="text">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                {{-- <label for="operator_email">Operator Email</label> --}}
                <input value="{{$operator->operator_email}}" name="operator_email" id="operator_email" class="form-control" aria-describedby="emailHelp" 
                    placeholder="Enter Email" type="email">
                </div>
            </div>
                {{-- </div> --}}
                <div class="form-group">
                {{-- <label for="operator_phone">Operator Phone</label> --}}
                <input value="{{$operator->operator_phone}}" name="operator_phone" id="operator_phone" class="form-control" aria-describedby="emailHelp"
                    placeholder="Enter Mobile Number" type="text">
                </div>
                <div class="form-group">
                {{-- <label for="operator_address">Operator Address</label> --}}
                <textarea value="{{$operator->operator_address}}" name="operator_address" id="operator_address" rows="2" cols="20" class="form-control" 
                placeholder="Enter Operator Address" type="text"></textarea>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                    <input value="{{$operator->status}}" name="status"  aria-describedby="emailHelp" type="checkbox">
                    <label for="exampleInputEmail1">Active</label>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                        <label class="control-label">Image</label>
                        <input value="{{$operator->operator_logo}}" type="file" name="operator_logo">
            </div>
            </div>
        </fieldset>
        </div>
        <div class="modal-footer">
        <a href="{{ url('/operator') }}" type="button" class="btn btn-sm btn-primary">Go Back</a>
        <button type="submit" class="btn btn-sm btn-success">Update Operator</button>
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

