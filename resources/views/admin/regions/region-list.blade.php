@extends('layouts.header')
@section('content') 
@include('admin.message')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            <span class="pull-center">
            <a href="#" data-toggle="modal" data-target="#addRegion" 
            data-toggle="tooltip" type="button" class="btn btn-sm btn-primary">
            <i class="glyphicon glyphicon-plus"></i> Add New Region</a>
            </span>
            <br>
            <br>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Regions List</h4>
                  <h4 class="card-title pull-right">Today is: {{ date('d-m-Y', time()) }}</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  @if (count($regions) > 0 ) 
                    <table class="col-md-10">
                      <thead class="text-primary">
                      <th>ID</th>
                    <th>Region Name</th>
                    <th>Region Code</th>
                    <th>Last Updated</th>
                    <th>Status</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach ( $regions as $key => $region )
                      <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                          <a data-toggle="modal" data-target="#exampleModalCenterviewOperator
                            {{$region->region_id}}"data-toggle="tooltip">{{ $region->region_name }}</a></td>
                        <td>{{ $region->region_code }}</td>
                        <td>{{ $region->updated_at }}</td>
                        <td>@if($region->status == 1)
                          Available
                        @else
                          Not Available
                        @endif
                        </td>
                        <td>
                          <a href="#" data-toggle="modal" data-target="#regionView{{$region->region_id}}" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary">
                          <i class="glyphicon glyphicon-plus"></i>View</a>
            @include('admin.regions.region-view')
                          <a href="/region/{{$region->region_id}}/edit" class="btn btn-sm btn-info">Edit</a>
                          <form action="{{ url('/region', ['id' => $region->region_id]) }}" method="post">
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
                {!! $regions->render() !!}
              </div>
            </div>
            </div>
            </div>
            </div>
            @include('admin.regions.add-region')
@endsection