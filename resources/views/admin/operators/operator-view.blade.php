<div class="modal fade" id="operatorView{{$operator->operator_id}}" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLongTitle" align="center">
            <i class="glyphicon glyphicon-log-in">Operator Details</i></h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card mb-3">
                <img style="heigth:40px; width:40px; background-color:powderblue;" 
                src="/storage/operator_images/{{$operator->operator_logo}}">
                <div class="card-body">                                             
                <h5 class="card-title">Name : {{$operator->operator_name}}</h5>
                <p class="card-text">Id : {{$operator->operator_id}}</p>
                    <p class="card-text">Email : {{$operator->operator_email}}</p>
                    <p class="card-text">Phone : {{$operator->operator_phone}}</p>
                    <p class="card-text">Address : {{$operator->operator_address}}</p>
                    <p class="card-text">Status : @if($operator->status == 1)
                      Available
                    @else
                      Not Available
                    @endif</p>
                    <hr>
                    <p class="card-text"><small class="text-muted">Added on : {{$operator->created_at}}</small></p>
                    <p class="card-text"><small class="text-muted">Updated on : {{$operator->updated_at}}</small></p>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
  