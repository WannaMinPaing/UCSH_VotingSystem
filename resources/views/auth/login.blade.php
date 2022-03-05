@extends('frontend.layouts.app')
@section('title','Login')
@section('content')

      <!--
      
      
      <div class="card">
                 <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">





               
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>

                            <h4>User Login</h4>
                        </div>
                    </form>
                  </div>
            </div>

             </div>
                
    -->                
            
<spam style="font-size:50px;" class=" d-flex justify-content-center align-items-center"> Login </spam>
<div class="d-flex justify-content-center align-items-center">	

    <img  src="{{asset('image/login_ui.svg')}}" class=" mb-2 d-none d-lg-block" width=400px; height=400px;  style="margin-top:100px; margin-right:60px;" />
                            
    <form method="POST" action="{{ route('login') }}" style="margin-top:120px;">
        @csrf
        <div class="form-row " >
            <div class="form-group">
            @include('backend.layouts.flash')
                <label for="email" class="mt-3">Email</label>
                <input type="email"  name="email"  class="form-control" id="email"  value="{{old('email')}}" placeholder="Enter email address" style="width:250px;">
                    
                <label for="password" class="mt-3 ">Password</label><br>
                <input type="password" name="password" class="form-control d-inline" id="password" value="{{old('password')}}" placeholder="Please enter your password." style="width:250px;">
                <i class="far fa-eye" id="togglePassword" style="margin-left:-30px; cursor:pointer;"></i><br>    
                
                <button type="submit" class="form-control btn mt-4" id="submit_btndesign"style="width:250px;" >Submit</button>
                <div style="text-align:center;" class="mt-1">
                    <a href="#" class="mr-1" id="get_gmail">Get Password? </a> <a href="{{route('contact')}}" class="ml-1"> Contact us</a> 
                </div> 
            </div>
        </div>    
    </form>
</div>
                
                
                
              
       
 
@endsection


@section('scripts')
<script>

//get gamil by alert box  
//https://www.codehaven.co.uk/jquery/jquery-ajax/sweet-alert-text-input-and-save-to-a-database/

document.getElementById('get_gmail').addEventListener('click', function(e)
{ 
        e.preventDefault();
        (async () => 
        {
            const { value: email } = await Swal.fire(
                {
                    title: 'Input email address',
                    input: 'email',
                    inputLabel: 'Type email that collected by our team.',
                    inputPlaceholder: 'Enter your email address'
                })
                if (email) {
                                console.log(email);
                                // Swal.fire(`Entered email: ${email1}`);
                                 $.ajax({
                                            url:'/getmailpwd/'+email,
                                            type:'GET',
                                           
                                            success:function(data)
                                            {
                                                if(data=="can not")
                                                {
                                                  Swal.fire(
                                                    'You can\'nt vote by this email.',
                                                    'Check your email\'name and Try again',
                                                    'question'
                                                    )  
                                                }
                                                else if(data=="voted")
                                                    {
                                                        Swal.fire(
                                                            'You voted by this email.',
                                                            'you can\'nt vote another again.',
                                                            'error'
                                                            )  
                                                    }
                                                else{
                                                        Swal.fire(
                                                            'We sent a mail successfully.',
                                                            'Check your email and get password',
                                                            'success'
                                                            )
                                                        alert(data);
                                                    }
                                            }
                                            
                                        })//ajax end	  
                            }//if end

        })()
       
   });

//test   
   function alerttt()
   {
       alert("okay");
   }

$(document).ready(function(){
//password eye
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    
    togglePassword.addEventListener('click', function (e) 
    {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });

//get password
    $("get_gmail").click(function(event){
    event.preventDefault();
    });

});


</script>
@endsection