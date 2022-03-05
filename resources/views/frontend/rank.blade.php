@extends('frontend.layouts.app')
@section('title','Rank')
@section('content')

<div class="row ml-4">

    <div class="col-xl-3 col-md-6 col-sm-12 mt-3 d-flex justify-content-center">
        <div id="king">
           
        </div>
    </div>  

    <div class="col-xl-3 col-md-6 col-sm-12 mt-3 d-flex justify-content-center">
        <div id="queen">
           
        </div>
    </div> 
    <!---
    <div class="col-xl-3 col-md-6 col-sm-12 d-flex justify-content-center">
        <h2 class="rank_title">Queen </h2>
        @foreach($king as  $key=> $boy)    
        <div class="chard mt-2">
            <a href="{{url('/profile',[$boy->id])}}"><img  src="{{$boy->mainphoto_path}}" class="rank_photo"></a>
            <h6 class="rank_name" >{{$boy->name}}</h6>
            <spam class="rank_no">{{$key+1}}_</spam>
            <h6 class="rank_percent">{{number_format($boy->king_count)}}</h6>       
        </div> 
        @endforeach
    </div>
-->
    <div class="col-xl-3 col-md-6 col-sm-12 mt-3 d-flex justify-content-center">
        <div id="prince">
           
        </div>
    </div>
    <!------->
    <div class="col-xl-3 col-md-6 col-sm-12 mt-3 d-flex justify-content-center">
        <div id="princess">
           
        </div>
    </div>

</div>


<!--  -->
        
@endsection

@section('scripts')
{!! JsValidator::formRequest('App\Http\Requests\StoreMessage','#create_contact') !!}

<script>
var text_king = "";
var text_prince = "";
/////
var text_queen = "";
var text_princess = "";

function count()
	{
		$.ajax({
					url:'/rank_count/',
					type : 'GET',
					success:function(data)
					{
                        king=data[0];
                        prince=data[1];
                        /////////
                        queen=data[0];
                        princess=data[1];
                        ////////
                        text_king = "";
                        text_prince = "";
                        text_queen = "";
                        text_princess = "";


                        text_king+="<h2 class='rank_title'>King </h2>";
                        king.forEach(kingFunction);
                        document.getElementById("king").innerHTML = text_king;
                        ///////////   
                        text_queen+="<h2 class='rank_title'>Queen </h2>";
                        queen.forEach(queenFunction);
                        document.getElementById("queen").innerHTML = text_queen;

                        text_princess+="<h2 class='rank_title'>Princess </h2>";
                        princess.forEach(princessFunction);
                        document.getElementById("princess").innerHTML = text_princess;

                        //////////////
                        text_prince+="<h2 class='rank_title'>Prince </h2>";
                        prince.forEach(princeFunction);
                        document.getElementById("prince").innerHTML = text_prince;
                        //alert("Pppp");
                       
					}
				})			
	}


function kingFunction(item, index) 
{
  text_king +="<a href='profile/"+item.id+"' style='text-decoration:none;color:black;'><div class='chard mt-2'><img  src=' " +item.mainphoto_path+ " ' class='rank_photo'><h6 class='rank_name'>"+item.name+"</h6><spam class='rank_no'>" + (index+1) + "</spam><h6 class='rank_percent'>"+parseInt(item.king_count)+"</h6></div></a>";
  
}

function princeFunction(item, index) 
{
  text_prince +="<a href='profile/"+item.id+"' style='text-decoration:none;color:black;'><div class='chard mt-2'><img  src=' " +item.mainphoto_path+ " ' class='rank_photo'><h6 class='rank_name'>"+item.name+"</h6><spam class='rank_no'>" + (index+1) + "</spam><h6 class='rank_percent'>"+parseInt(item.prince_count)+"</h6></div></a>";
  
}


//////////////////////////
function queenFunction(item, index) 
{
  text_queen +="<a href='profile/"+item.id+"' style='text-decoration:none;color:black;'><div class='chard mt-2'><img  src=' " +item.mainphoto_path+ " ' class='rank_photo'><h6 class='rank_name'>"+item.name+"</h6><spam class='rank_no'>" + (index+1) + "</spam><h6 class='rank_percent'>"+parseInt(item.king_count)+"</h6></div></a>";
  
}

function princessFunction(item, index) 
{
  text_princess +="<a href='profile/"+item.id+"' style='text-decoration:none;color:black;'><div class='chard mt-2'><img  src=' " +item.mainphoto_path+ " ' class='rank_photo'><h6 class='rank_name'>"+item.name+"</h6><spam class='rank_no'>" + (index+1) + "</spam><h6 class='rank_percent'>"+parseInt(item.prince_count)+"</h6></div></a>";
  
}

/////////////////////////
$(document).ready(function(){

    $("#nav_contact").css({"background-color": "red", "border-bottom-left-radius": "20px","border-top-right-radius":"20px","width":"70px"});
    count();
	window.setInterval('count();', 10000);     
});

</script>
@endsection

