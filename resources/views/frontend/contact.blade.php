@extends('frontend.layouts.app')
@section('title','Contact us')
@section('content')


<spam style="font-size:50px;" class=" d-flex justify-content-center align-items-center"> Contact </spam>
<div class="d-flex justify-content-center align-items-center">	

<img  src="{{asset('image/contact_mail2.svg')}}" class=" mb-2 d-none d-lg-block" width=400px; height=400px;  style="margin-top:100px; margin-right:100px;" />
						
<form action="{{route('message-store')}}" method="POST" id="create_contact"   >
    @csrf
    <div class="form-row mt-3">
        <div class="form-group">

            <label for="name" class="mt-3 ">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Please enter your name.">
                            
            <label for="ph_num" class="mt-3">Phone No(09xxxxxxxxx):</label>
            <input type="text" name="phone_num" class="form-control" id="ph_num" placeholder="Enter a valid phone number">
                            
            <label for="email" class="mt-3">Email</label>
            <input type="email"  name="email"  class="form-control" id="email" placeholder="Enter email address">
                          
            <label for="message" class="mt-3">Please enter your message</label>
            <textarea  name="message" class="form-control" id="message" rows="3" placeholder="comment..."></textarea>
                         
            <div class="form-check mt-3">
                <input  name="check" class="form-check-input" type="checkbox" id="gridCheck" value="yes">
                <label class="form-check-label  p-2" style="color:white;border-radius:2px;background-color:#804ce6;" for="gridCheck">I'm studing or working in UCSH university.</label>
            </div>
                            
            <button type="submit" class="form-control btn mt-3" id="submit_btndesign">Send Message</button>
            
        </div>
    </div>    
</form>
</div>
                    
                
              
        
@endsection

@section('scripts')
{!! JsValidator::formRequest('App\Http\Requests\StoreMessage','#create_contact') !!}

<script>
$(document).ready(function(){

    $("#nav_contact").css({"background-color": "red", "border-bottom-left-radius": "20px","border-top-right-radius":"20px","width":"70px"});
});

</script>
@endsection

