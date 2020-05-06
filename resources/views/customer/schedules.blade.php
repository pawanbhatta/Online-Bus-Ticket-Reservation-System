<div class="card mb-3">
    <img src="https://images3.alphacoders.com/823/thumb-1920-82317.jpg" height="300px" class="card-img-top">
    <div class="card-body">
      <h2 class="card-title">Bus Schedules</h2>
      <p class="card-text">Find Your Ride Here.</p>
        
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Depart Address</th>
                <th scope="col">Depart Date</th>
                <th scope="col">Depart Time</th>
                <th scope="col">Destination</th>
            </tr> 
            </thead>
            <tbody>
            @foreach ($schedules as $key => $schedule)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$schedule->pickup_address}}</td>
                <td>{{$schedule->depart_date}}</td>
                <td>{{$schedule->depart_time}}</td>
                <td>{{$schedule->dropoff_address}}</td>
                <td>
                    <a href="{{ url('posts/'.$post->id)}}" class="btn btn-primary a-btn-slide-text">
                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                    </a> 
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>


