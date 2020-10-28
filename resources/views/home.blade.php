@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <br>
    <br>
  <p style="font-size: 20px;">Home</p>

    <br>
    <div class="card" style="height: 21rem; background-color: #269CE0">
      <div class="card-body align-items-center d-flex justify-content-center">
        <p class="card-text" style="text-align:center; font-size: 20px; color:white;">
            @php
                  $time = date("H"); 
                  $timezone = date("e");
                  if ($time < "12") {
                      echo "Good morning,";
                  } else
                  if ($time >= "12" && $time < "17") {
                      echo "Good afternoon";
                  } else
                  if ($time >= "17" && $time < "19") {
                      echo "Good evening,";
                  } else
                  if ($time >= "19") {
                      echo "Good night,";
                  }
            @endphp
            <br> {{ Auth::user()->name }}
        </p>
      </div>
  </div>

  <br>

<div class="row">
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <div class="text-center"><img src="/img/info_2.png" style="height:45px;"></div>
        <p class="card-text" style="text-align: center;">Invest For Your Future</p>
        <div class="text-center"><a href="{{ route('invest') }}" class="btn btn-primary btn-sm">Explore</a></div>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <div class="text-center"><img src="/img/info_2.png" style="height:45px;"></div>
        <p class="card-text" style="text-align: center;">Early For Kids</p>
        <div class="text-center"><a href="#" class="btn btn-primary btn-sm">Explore</a></div>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <div class="text-center"><img src="/img/info_2.png" style="height:45px;"></div>
        <p class="card-text" style="text-align: center;">Earn Some Money</p>
        <div class="text-center"><a href="#" class="btn btn-primary btn-sm">Explore</a></div>
      </div>
    </div>
  </div>
  
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <div class="text-center"><img src="/img/info_2.png" style="height:45px;"></div>
        <p class="card-text" style="text-align: center;">Grow Your Money</p>
        <div class="text-center"><a href="#" class="btn btn-primary btn-sm">Explore</a></div>
      </div>
    </div>
  </div>
</div>
<br>

<div class="row">
    <div class="col-md-6">
        <div class="card" style="height: 10rem;">
            <div class="card-body align-items-center d-flex justify-content-center">
                <p class="card-text" style="text-align: center;font-size: 20px;">
                    You invested ${{ $deposit }} in the <br> last 30 days
                </p>
            </div>
        </div>
        <br>
        <div class="card" style="height: 27rem;">
            <div class="card-body">
            <div class ="card-title pb-1">Grow Your Knowledge</div>
            <hr/>
                <br>
                <p class="card-text"><img src="/img/services_1.png" class ="pr-5" style="height:30px;"><a href="#">How much should I invest?</a></p>
                <hr/>
                <br>
                <p class="card-text"><img src="/img/services_1.svg" class ="pr-5" style="height:30px;"><a href="#">How Can You Grow Your Money Faster?</a></p>
                <hr/>
                <br>
                <p class="card-text"><img src="/img/services_5.png" class ="pr-5" style="height:30px;"><a href="#">Where Can I Get Investment Advice?</a></p>
                <hr/>
                <br>
                <p class="card-text"><img src="/img/services_3.svg" class ="pr-5" style="height:30px;"><a href="#">What Other Features Does Ruzhowa Offer?</a></p>
                <br>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card " style="height: 20rem;">
            <div class="card-body align-items-center d-flex justify-content-center">
                <p class="card-text" style="text-align: center;font-size: 20px;">You withdrew ${{ $withdrawal }} in the <br> last 30 days</p>
            </div>
        </div>
    </div>
</div>

</div>

@endsection
