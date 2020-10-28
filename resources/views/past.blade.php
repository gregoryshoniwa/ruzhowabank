@extends('layouts.app')

@section('content')
<div class="container">
	<br>
	<br>
	<br>

	<div class="d-flex">
		<div class="text-center pr-4"><a href="{{ route('invest') }}"><i class="fas fa-arrow-alt-circle-left fa-2x" style="color:#269CE0"></i></a></div>
		<p style="font-size: 20px;">Recent Activity</p>
	</div>
	<br>

	<div class="card" style="height: 21rem; background-color: #269CE0">
      <div class="card-body align-items-center d-flex justify-content-center">
          <div class="d-flex" style="font-size: 15px; color:white;">
                            <div class="pr-5">Deposited<br>${{ $total_deposits }}</div> 
                            <div class ="pr-5"><p>Withdrawn<br>$ {{ $total_withdrawals }}</p></div> 
                            <div class ="pr-5"><p>Dividends<br>$987</p></div> 
          </div>
      </div>
    </div>

    <br>

    <!-- recent  -->
    <div class="row">
        <div class="col-md-4">
            <div class="card" style="height: 11rem; background-color: white">
                <div class="card-body align-items-center d-flex justify-content-center">
                    <p class="card-text d-flex" style="text-align:center; font-size: 15px; color:grey;">No pending activities</p>
                </div>
            </div>
        </div>
       
        <div class="col-md-8">
                     @if(empty($activities))
                        <div class ="card" style ="height:auto">
                            No recent activity
                        </div>
                    @else
                    
                    @foreach($activities as $activity)
                    <div class="card" style="height:auto;"> 
                        <div class="card-body align-items-center justify-content-center">
                            <div class ="card-title pb-1"><b>{{ date('Y-m-d', strtotime($activity->created_at)) }}</b></div>
                            <hr>
                                <div class="card-text d-flex"><i class="fa fa-credit-card fa-2x pr-3" aria-hidden="true" style="color:grey"></i>
                                    <p> {{ $activity->description }} </p>
                                    <span class="ml-auto" style="color:#269CE0"> ${{ $activity->amount }} </span>
                                </div>
                        </div>
                    </div>
                   
                    <br>
                    @endforeach
                    @endif
            </div> 
          </div>
    </div>

</div>

@endsection