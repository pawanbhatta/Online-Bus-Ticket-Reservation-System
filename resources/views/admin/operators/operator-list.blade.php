
@extends('layouts.header')
@section('content') 
<!-- <div class="navbar-wrapper">
<a class="navbar-brand text-black " href="#pablo">Bus List</a>
 </div> -->
@include('admin.message')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            <span class="pull-center">
            <a href="#" data-toggle="modal" data-target="#exampleModalCenteraddbus" 
            data-toggle="tooltip" type="button" class="btn btn-sm btn-primary">
            <i class="glyphicon glyphicon-plus"></i> Add New Operator</a>
            </span>
            <br>
            <br>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Operators List</h4>
                  <h4 class="card-title pull-right">Today is: {{ date("M,d,Y h:i:s A") }}</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  @if (count($operators) > 0 ) 
                    <table class="col-md-10">
                      <thead class="text-primary">
                      <th>ID</th>
                    <th>Operator Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created Date</th>
                    <th>Status</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach ( $operators as $operator )
                      <tr>
                        <td>{{ $operator->operator_id }}</td>
                        <td>
                        <img style="heigth:20px; width:20px; background-color:powderblue;" src="/storage/operator_images/{{$operator->operator_logo}}">
                          <a data-toggle="modal" data-target="#exampleModalCenterviewOperator
                            {{$operator->operator_id}}"data-toggle="tooltip">{{ $operator->operator_name }}</a></td>
                        <td>{{ $operator->operator_email }}</td>
                        <td>{{ $operator->operator_phone }}</td>
                        <td>{{ $operator->operator_address }}</td>
                        <!-- <td>{{ $operator->operator_description }}</td> -->
                        <td>{{ $operator->created_at }}</td>
                        <td>@if($operator->status == 1)
                          Available
                        @else
                          Not Available
                        @endif
                        </td>
                        <td>
                          
                          <a href="/operator/{{$operator->operator_id}}/edit" class="btn btn-sm btn-info">Edit</a>
                          <form action="{{ url('/operator', ['id' => $operator->operator_id]) }}" method="post">
                            <input class="btn btn-sm btn-danger" type="submit" value="Delete" />
                            <input type="hidden" name="_method" value="delete" />
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          </form>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              @endif 
                 </div>
                </div>
                {!! $operators->render() !!}
              </div>
            </div>
            </div>
            </div>
            </div>
            @include('admin.operators.add-operator')
            {{-- @if(count($operators) > 0)
            @include('admin.operators.edit-operator')
            @endif --}}
@endsection