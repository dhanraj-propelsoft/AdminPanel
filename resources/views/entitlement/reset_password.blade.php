@extends('layouts.auth.app')

@section('form')

<main>
    <div class="container">
        <div class="row h-100">
            <div class="col-12 col-md-10 mx-auto my-auto">
                <div class="card auth-card">
                    <div class="position-relative image-side ">


                        {{-- <p class="ExtrInfo">
                        You can change your password for security reasons or reset it if you forget it
                        </p> --}}
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
                        <h2 class="mb-4 text-capitalize d-inline-block"> Hi! <b>{{$personName}}</b></h2>
                     
                        <form action="{{route('updatePassword')}}" class="frm-single" method="post" autocomplete="off">
                            @csrf


                            <fieldset class="fieldset-password">
                

                                <br>
                                <label class="form-group col-md-12 p-0  InputLabel mb-4">
                                    
                                    <input class="form-control AlterInput propel-key-press-input-mendatory" id="pwd" type="password" placeholder="Enter New Password" name="password" value="{{ old('password') }}" />
                                
                                  
                                    <span class="AlterInputLabel">Password</span>
                                    
                                </label>
                               <!-- END pwd_strength_wrap -->
                                <label class="input-group col-md-12 p-0  InputLabel mb-4">
                                    <input class="form-control AlterInput propel-key-press-input-mendatory" id="cpwd" type="password" validationAttr="check" checkId="pwd" placeholder="Retype Password for Confirmation" name="passwordConfirmation" value="{{ old('confirm_password') }}" />
                                    <span class="input-group-addon">
                                        <div class="fa-regular fa-eye pwd-view"></div>
                                    </span>
                                    <span class="text-danger">@error('password_confirmation'){{ $message }}@enderror</span>
                                    <span class="AlterInputLabel">Confirm Password</span>
                                </label>

                               
                            </fieldset>
                            {{-- <div id="pwd_strength_wrap">
                                <div id="passwordDescription">Password not entered</div>
                                <div id="passwordStrength" class="strength0"></div>
                        </div> --}}
                            <input type="hidden" name="uid" value="{{$uid}}">


                            <div class="d-flex justify-content-end">

                                <button class="propelbtn propelbtncurved propelsubmit sign_up" type="submit">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
{{-- <script>
    $("input#pwd").on("focus keyup", function () {
         
        });
         
        $("input#pwd").blur(function () {
                 
        });
        $("input#pwd").on("focus keyup", function () {
                var score = 0;
                var a = $(this).val();
                var desc = new Array();
         
                // strength desc
                desc[0] = "Too short";
            desc[1] = "Weak";
            desc[2] = "Good";
            desc[3] = "Strong";
            desc[4] = "Best";
                 
        });
         
        $("input#pwd").blur(function () {
         
        });
        $("input#pwd").on("focus keyup", function () {
                var score = 0;
                var a = $(this).val();
                var desc = new Array();
         
                // strength desc
                desc[0] = "Too short";
                desc[1] = "Weak";
                desc[2] = "Good";
                desc[3] = "Strong";
                desc[4] = "Best";
                 
                // password length
                if (a.length >= 6) {
                    $("#length").removeClass("invalid").addClass("valid");
                    score++;
                } else {
                    $("#length").removeClass("valid").addClass("invalid");
                }
         
                // at least 1 digit in password
                if (a.match(/\d/)) {
                    $("#pnum").removeClass("invalid").addClass("valid");
                    score++;
                } else {
                    $("#pnum").removeClass("valid").addClass("invalid");
                }
         
                // at least 1 capital & lower letter in password
                if (a.match(/[A-Z]/) && a.match(/[a-z]/)) {
                    $("#capital").removeClass("invalid").addClass("valid");
                    score++;
                } else {
                    $("#capital").removeClass("valid").addClass("invalid");
                }
         
                // at least 1 special character in password {
                if ( a.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) ) {
                        $("#spchar").removeClass("invalid").addClass("valid");
                        score++;
                } else {
                        $("#spchar").removeClass("valid").addClass("invalid");
                }
         
         
                if(a.length > 0) {
                        //show strength text
                        $("#passwordDescription").text(desc[score]);
                        // show indicator
                        $("#passwordStrength").removeClass().addClass("strength"+score);
                } else {
                        $("#passwordDescription").text("Password not entered");
                        $("#passwordStrength").removeClass().addClass("strength"+score);
                }
        });
         
        $("input#pwd").blur(function () {
         
        });
        $("input#pwd").on("focus keyup", function () {
                var score = 0;
                var a = $(this).val();
                var desc = new Array();
         
                // strength desc
                desc[0] = "Too short";
                desc[1] = "Weak";
                desc[2] = "Good";
                desc[3] = "Strong";
                desc[4] = "Best";
         
                $("#pwd_strength_wrap").fadeIn(400);
                 
                // password length
                if (a.length >= 8) {
                    $("#length").removeClass("invalid").addClass("valid");
                    score++;
                } else {
                    $("#length").removeClass("valid").addClass("invalid");
                }
         
                // at least 1 digit in password
                if (a.match(/\d/)) {
                    $("#pnum").removeClass("invalid").addClass("valid");
                    score++;
                } else {
                    $("#pnum").removeClass("valid").addClass("invalid");
                }
         
                // at least 1 capital & lower letter in password
                if (a.match(/[A-Z]/) && a.match(/[a-z]/)) {
                    $("#capital").removeClass("invalid").addClass("valid");
                    score++;
                } else {
                    $("#capital").removeClass("valid").addClass("invalid");
                }
         
                // at least 1 special character in password {
                if ( a.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) ) {
                        $("#spchar").removeClass("invalid").addClass("valid");
                        score++;
                } else {
                        $("#spchar").removeClass("valid").addClass("invalid");
                }
         
         
                if(a.length > 0) {
                        //show strength text
                        $("#passwordDescription").text(desc[score]);
                        // show indicator
                        $("#passwordStrength").removeClass().addClass("strength"+score);
                } else {
                        $("#passwordDescription").text("Password not entered");
                        $("#passwordStrength").removeClass().addClass("strength"+score);
                }
        });
         
     
</script>
<style>
    #passwordStrength {
    display: block;
    height: 5px;
    margin-bottom: 10px;
    transition: all 0.4s ease;
}
.strength0 {
    background: none; /* too short */
    width: 0px;
}
.strength1 {
    background: none repeat scroll 0 0 #FF4545;/* weak */
    width: 25%;
}
.strength2 {
    background: none repeat scroll 0 0 #FFC824;/* good */
    width: 50%;
}
.strength3 {
        background: none repeat scroll 0 0 #6699CC;/* strong */
    width: 75%;
}
 
.strength4 {
        background: none repeat scroll 0 0 #008000;/* best */
    width: 100%;
}
</style> --}}
@endsection


