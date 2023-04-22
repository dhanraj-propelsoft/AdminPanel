@extends('layouts.auth.app')

@section('form')

<main>
    <div class="container">
        <div class="row h-100">
            <div class="col-12 col-md-10 mx-auto my-auto">
                <div class="card auth-card">
                    <div class="position-relative image-side ">

                        {{-- <p class=" text-white h2">MAGIC IS IN THE DETAILS</p> --}}

                        {{-- <p class="white mb-0">
                            Don’t have a Login yet, just enter your mobile number and follow us. we ensure your Signup for a New Account in few steps
                        </p> --}}
                    </div>
                    <div class="form-side">
                        {{-- <a href="Dashboard.Default.html">
                            <span class="logo-single"></span>
                        </a> --}}
                        <div class="log-container col-md-12  ">
                            <img src="{{ asset('assets/images/logo.svg') }}" alt="">
                            <div>
                                <span>  Propel Soft </span>
                                <span>Acclereting Business Ahead</span>
                            </div>
                        </div>
                   
                        <h2 class="mb-4 text-capitalize d-inline-block"> Hi! <b>{{$name}}</b></h2><span class="lead-sm text-muted">(  {{$mobile}}  )</span>
                        <br>
                        <br>
                        <form action="{{route('postLogin')}}" class="frm-single" method="post" autocomplete="off">
                            @csrf
                            <input type="hidden" name="username" value="{{$mobile}}">
                           
                            <label class="input-group col-md-12 p-0  InputLabel mb-4">
                                <input type="password" name="password" placeholder="Enter Your Password" class="form-control AlterInput propel-key-press-input-mendatory">
                                <span class="input-group-addon">
                                    <div class="fa-regular fa-eye pwd-view"></div>
                                </span>
                                <span class="AlterInputLabel">Password</span>
                            </label>
                            <span class="text-danger">@error('err'){{ $message }}@enderror</span>
                            <div class="d-flex justify-content-between align-items-center">
                                <button class="propelbtn propelbtncurved propelsubmit propel-hover notbtn" type="button" > I’m not {{$name}}</button>
                                <button class="propelbtn propelbtncurved propelsubmit" type="submit">login</button>
                            

                            </div>
                            

                        </form>
                        <form action="{{route('findCredential')}}" method="post" id="secForm">
                            @csrf
                        <input type="hidden" name="mobileNumber" value="{{$mobile}}">
                        <input type="hidden" name="email" value="">
                        <input type="hidden" name="dependency" value="1">
                        
                        </form>
                    
                        <p class="ExtraInfo">
                            &nbsp;&nbsp;&nbsp;If you don’t hold the above email/mobile, also if you are not holding any previous account in propel Kindly contact <span class="propel-text-info">Propelsoft </span>.​
                        </p>




                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
  
    $(document).ready(function() {
        $('.notbtn').click(function(){
           $('#secForm').submit();
        });
    });
</script> 

@endsection
