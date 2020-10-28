@extends('layouts.app')

@section('content')
<div class="container">
	<br>
	<br>
	<br>

	<div class="d-flex">
		<div class="text-center pr-4"><a href="{{ route('home') }}"><i class="fas fa-arrow-alt-circle-left fa-2x" style="color:#269CE0"></i></a></div>
		<p style="font-size: 20px;">Invest</p>
	</div>
	<br>

	<div class="card" style="height: 21rem; background-color: #269CE0">
      <div class="card-body align-items-center d-flex justify-content-center">
          <p class="card-text" style="text-align:center; font-size: 20px; color:white;">Your <b>invest</b> account value is <b>${{ $current_balance }}</b></p>
      </div>
  </div>

<br>
<!-- portfolio things-->
<div class="row">
    <div class="col-md-6">
        <div class="card" style="height: 14rem;">
            <div class="card-body align-items-center justify-content-center">
                <div class="card-text d-flex">
                  <a href="#" style="color:black;"><p class="pr-5">Portfolio</p></a>
                  <span class="ml-auto" style="color:#269CE0">Moderate</span>
                </div>
                <hr/>
                <div class="card-text d-flex">
                <a href="#" style="color:black;"><p>Round-Ups Settings</p></a>
                <span class="ml-auto" style="color:#269CE0">Automatic</span>
                </div>
                <hr/>
                <div class="card-text d-flex">
                  <a href="#" style="color:black;"><p class="pr-5">Recurring Investment</p></a>
                  <span class="ml-auto" style="color:#269CE0">$5, Monthly</span>
                </div>
                
            </div>
        </div>
        <br>
        <!-- performance chart -->
        <div class="card" style="height: 27rem">
          <div id="curve_chart" style="width:100%; height: 500px"></div>
        </div>
        <br>
        <!-- additional links -->
        <div class="card" style="height: 27rem;">
            <div class="card-body">
            <div class ="card-title pb-1">Grow Your Knowledge</div>
            <hr/>
                <br>
                <p class="card-text"><img src="/img/services_1.png" class ="pr-5" style="height:30px;"><a href="#">How can I withdraw My Money?</a></p>
                <hr/>
                <br>
                <p class="card-text"><img src="/img/services_1.svg" class ="pr-5" style="height:30px;"><a href="#">What Is Compounding?</a></p>
                <hr/>
                <br>
                <p class="card-text"><img src="/img/services_5.png" class ="pr-5" style="height:30px;"><a href="#">How can I invest for my kids?</a></p>
                <hr/>
                <br>
                <p class="card-text"><img src="/img/services_3.svg" class ="pr-5" style="height:30px;"><a href="#">What Other Features Does Ruzhowa Offer?</a></p>
                <br>
            </div>
        </div>
    </div>

    <!-- recent activities-->
    <div class="col-md-6">
      <div class="card" style="height: 30;">   
        <div class="card-body align-items-center justify-content-center">
            <div class ="card-title pb-1"><b>Recent Activity</b></div>
                <hr/>
                <br>
                 @if(empty($activities))
                    <div>
                        No recent activity
                    </div>
                @else
                @foreach($activities as $activity)
                <div class="card-text d-flex"><i class="fa fa-credit-card fa-2x pr-3" aria-hidden="true" style="color:grey"></i>
                    <p> {{ $activity->description }} </p>
                    <span class="ml-auto" style="color:#269CE0"> ${{ $activity->amount }} </span>
                </div>
                <hr/>
                <br>
                @endforeach
                @endif
                <div class="text-center"><a href="{{ route('past') }}" class="btn btn-info btn-lg">View All</a></div>
        </div> 
      </div>
      <br>
      <!-- individual performance -->
      <div class="card" style="height: 27rem">
          <div id="piechart" style="width:100%; height: 500px"></div>
      
    </div>

</div>

@endsection

