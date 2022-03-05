@extends('frontend.layouts.app')
@section('title','Profile')
@section('content')
<div class="mt-4 pl-4">
	<h3>{{$selections->name}} </h3>
	<div style="margin-left:5px;">
		<h6>Age: {{$selections->age}} </h6>
		<h6>Class: {{$selections->class}} </h6>
		<h6>Address: {{$selections->address}} </h6>
	</div>	
</div>	
<div class="row mt-3" >
	<div class="col-xl-1 col-md-12 col-sm-12   d-flex justify-content-center"  >
		
	</div> 
<!--  Main Photo -->
    <div class="col-xl-3 col-md-12 col-sm-12   d-flex justify-content-center mb-3" >
		<img src="{{$selections->mainphoto_path}}" alt="Girl in a jacket" width="290" height="330"> 
	</div> 

<!-- char -->
<div  class="chartjs-size-monitor  justify-content-center align-items-center" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
        <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
        </div>
        <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
            <div style="position:absolute;width:100%;height:100%;left:0; top:0"></div>
        </div>
</div> 
<canvas id="chart-line" width="250" height="200" class="chartjs-render-monitor col-xl-3 col-md-6 col-sm-6 mt-3 d-flex  justify-content-center" style="display: block; width: 320px; height: 300px;"></canvas>

<!-- Photos -->
	<div id="carouselExampleIndicators" class="carousel slide col-xl-4 col-md-6 col-sm-6   d-flex justify-content-center" data-ride="carousel">
		<ol class="carousel-indicators">
			@if ($selections->imgs_path != "")
				@foreach(explode('|', $selections->imgs_path) as $key=> $imgs)
					<li data-target="#carouselExampleIndicators" data-slide-to="{{$key}}" class="{{$key == 0 ? 'active' : '' }}"></li>
				@endforeach
			@endif
		</ol>
		
		<div class="carousel-inner">
			@if ($selections->imgs_path != "")
				@foreach(explode('|', $selections->imgs_path) as $key=> $imgs)
					<div class="carousel-item {{$key == 0 ? 'active' : '' }} mb-5">
						<img class="d-block w-100" src="{{asset($imgs)}}" alt="First slide" height="330px"   style="object-fit: cover;">
					</div>
				@endforeach
			@else
				<div class="carousel-item active">
					<img class="d-block w-100" src="{{asset('image/boy_carousel2.png')}}" alt="First slide" height="270px"   style="object-fit: cover;">
					<div class="carousel-caption d-none d-md-block">
						<p style="color: red;background-color:black;opacity:0.8;">!!There are no photo!!</p>
					</div>
				</div>
			@endif
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<div class="caroules_button">
				<span class="fas fa-angle-left" aria-hidden="true"></span>
			</div>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		<div class="caroules_button">
									<span class="fas fa-angle-right" aria-hidden="true"></span>
								</div>
								<span class="sr-only">Next</span>
		</a>
	</div>
 </div>		


 <div class="col-xl-1 col-md-6 col-sm-12   d-flex justify-content-center"  >
		
		</div> 
<!--<a href=" '.route('admin.boy.edit',$each->id).' " class="text-warning"><i class="fas fa-edit"></i></a>-->

        
@endsection

@section('scripts')
<script>

	var kcount;
	var pcount;
	
	
    $(document).ready(function() 
	{
		count();
		window.setInterval('count();', 5000); 	
    });


	function count()
	{
		$.ajax({
					url:'/admin/count/'+{{$selections->id}},
					type : 'GET',
					success:function(data)
					{
						kcount=data.king_count;
						pcount=data.prince_count;
						show();
						//bar();
						
					}
				})			
	}

	function show()
	{
		var ctx = $("#chart-line");
        var myLineChart = new Chart(ctx, 
		{
            type: 'radar',
            data: {
					labels: ['Count of Number','King', 'Prince','Queen','Princess'],
					datasets: 
					[{
						data: [0,kcount,pcount,0,0],
						label: "Count Of Voting",
						borderColor: "#458af7",
						backgroundColor: '#458af7',
						fill: true
					}]
            	  },
            options: 
			{
                title:
				 {
                    display: true,
                    text: 'UCSH King & Queen Voting System'
                }
            }
        });

		
	}
	
</script>
@endsection

