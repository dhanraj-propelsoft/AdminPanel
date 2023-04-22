@extends('layouts.auth.app')

@section('form')

<main>
    <div class="container">
        <div class="row h-100">
            <div class="col-12 col-md-10 mx-auto my-auto">
                <div class="card auth-card">
                    <div class="position-relative image-side ">

                        {{-- <p class=" text-white h2">Create Account</p> --}}


                    </div>
                    <div class="form-side">
                        {{-- <a href="Dashboard.Default.html">
                            <span class="logo-single"></span>
                        </a> --}}
                        <div class="log-container col-md-12  ">
                            <img src="{{ asset('assets/images/logo.svg') }}" alt="">
                            <div>
                                <span>Propel Soft</span>
                                <span>Acclereting Business Ahead</span>
                            </div>
                        </div>
                        <h6 class="mb-4">Create a Account </h6>
                        <form action="{{route('passwordPage')}}" class="frm-single" id="otpForm" method="post" autocomplete="off">
                            @csrf
                                                
                          

                            <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                <input class="form-control AlterInput" type="text" id="verification" placeholder="Enter OTP Received on your Mobile {{$mobile}}" name="otp" value="{{ old('otp') }}" />                               
                                <span class="AlterInputLabel">OTP</span>
                            </label>
                            <p class="ExtraInfo">
                            </p>
                            <input type="hidden" name="uid" id="personUid">
                            <input type="hidden" name="number" id="number" value="{{$mobileNumber}}">

                            <input type="hidden" name="tempId" id="tempId" class="frm-inp" value="{{$tempId}}">
                            <div class="frm-input" id="recaptcha-container"></div>

                            <div class="d-flex justify-content-between">

                                <button class="propelbtn propelbtnrounded propelreset" type="button" >Resend OTP</button>
                                <button class="propelbtn propelbtnrounded propellogin" type="submit">Validate</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    $(document).ready(function () {
        $(".Validate").click(function(){
			var uid = $("#tempId").val();
            var otp = $("#otp").val();
 
			$.ajax({
				url: "{{route('personConfirmationMobileOTP')}}",
				type: "POST",
				data: {
					tempId: uid,
                    otp: otp,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (result) {
          if(result!==0){
            var personUid=result;
            var id=$("#personUid").val(personUid);
        $('#otpForm').submit();
          }
          else{
            alert("inValid OTP");
          }
				}
			});
		});
        $(".Resend").click(function(){ 
            var uid = $("#tempId").val();
            var number=$('#number').val();
            $.ajax({
				url: "{{route('tempOTP')}}",
				type: "POST",
				data: {
					tempId: uid,
                    mobileNumber:number,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (result) {
                    if(result==1){
                alert('Resend OTP Successfully')
                    }else{
                     alert('Resend Failed');
                       
                    }
                  
				}
			});
   
        });


    });
</script>
@endsection
