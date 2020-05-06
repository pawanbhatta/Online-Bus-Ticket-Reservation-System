<div class="modal fade" id="addBus" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLongTitle" align="center">
            <i class="glyphicon glyphicon-log-in">Add New Bus</i></h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="{{ route('bus.store') }}" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <fieldset>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Bus Name</label> -->
                                <input name="bus_name"  class="form-control" aria-describedby="emailHelp"
                                 placeholder="Enter Bus Name" type="text">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Bus Name</label> -->
                                <input name="bus_num"  class="form-control" aria-describedby="emailHelp" 
                                placeholder="Enter Bus Number" type="text">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <input name="pickup_address"  class="form-control" aria-describedby="emailHelp"
                              placeholder="Enter Pickup Address" type="text">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <input name="dropoff_address"  class="form-control" aria-describedby="emailHelp" 
                            placeholder="Enter Dropoff Address" type="text">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <input name="depart_date"  class="form-control" aria-describedby="emailHelp"
                              placeholder="Enter Depart Date" type="date">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <input name="depart_time"  class="form-control" aria-describedby="emailHelp" 
                            placeholder="Enter Depart Time" type="time">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <input name="return_date"  class="form-control" aria-describedby="emailHelp"
                              placeholder="Enter Return Date" type="date">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <input name="return_time"  class="form-control" aria-describedby="emailHelp" 
                            placeholder="Enter Return Time" type="time">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <input name="seats_booked"  class="form-control" aria-describedby="emailHelp"
                              placeholder="Enter Seats Booked" type="number">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <input name="seats_avail"  class="form-control" aria-describedby="emailHelp" 
                            placeholder="Enter Seats Available" type="number">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <!-- <label for="exampleInputEmail1">Bus Name</label> -->
                            <input name="phone"  class="form-control" aria-describedby="emailHelp"
                             placeholder="Enter Phone Number" type="text">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <!-- <label for="exampleInputEmail1">Bus Name</label> -->
                            <input name="total_seats"  class="form-control" aria-describedby="emailHelp"
                             placeholder="Enter Total Seat" type="text">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <input name="status"  aria-describedby="emailHelp" type="checkbox">
                            <label>Available</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label class="control-label">Image</label>
                          <input type="file" name="bus_image">
                        </div>
                      </div>
                      </fieldset>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Register Bus</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  