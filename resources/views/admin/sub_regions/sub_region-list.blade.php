@extends('layouts.header')
@section('content') 
@include('admin.message')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            <span class="pull-center">
            <a href="#" data-toggle="modal" data-target="#addSubRegion" 
            data-toggle="tooltip" type="button" class="btn btn-sm btn-primary">
            <i class="glyphicon glyphicon-plus"></i> Add New Sub Region</a>
            </span>
            <br>
            <br>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Sub Regions List</h4>
                  <h4 class="card-title pull-right">Today is: {{ date('d-m-Y', time()) }}</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  @if (count($sub_regions) > 0 ) 
                    <table class="col-md-8">
                      <thead class="text-primary">
                      <th>ID</th>
                    <th>Sub Region Name</th>
                    <th>Region ID</th>
                    <th>Sub Region Code</th>
                    <th>Last Updated</th>
                    <th>Status</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach ( $sub_regions as $key => $sub_region )
                      <tr>
                      <td>{{ ++$key }}</td>
                        <td>
                          <a data-toggle="modal" data-target="#exampleModalCenterviewOperator
                            {{$sub_region->sub_region_id}}"data-toggle="tooltip">{{ $sub_region->sub_region_name }}</a></td>
                        <td>{{ $sub_region->region_id }}</td>
                        <td>{{ $sub_region->sub_region_code }}</td>
                        <td>{{ $sub_region->updated_at }}</td>
                        <td>@if($sub_region->status == 1)
                          Available
                        @else
                          Not Available
                        @endif
                        </td>
                        <td>
                          <a href="#" data-toggle="modal" data-target="#subRegionView{{$sub_region->sub_region_id}}" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary">
                          <i class="glyphicon glyphicon-plus"></i>View</a>
            @include('admin.sub_regions.sub_region-view')
                          <a href="/subregion/{{$sub_region->sub_region_id}}/edit" class="btn btn-sm btn-info">Edit</a>
                          <form action="{{ url('/subregion', ['id' => $sub_region->sub_region_id]) }}" method="post">
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
                {!! $sub_regions->render() !!}
              </div>
            </div>
            </div>
            </div>
            </div>
            @include('admin.sub_regions.add-sub_region')
@endsection