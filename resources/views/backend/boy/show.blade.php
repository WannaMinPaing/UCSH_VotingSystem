@extends('backend.layouts.app')
@section('title','Boy Deatil')
@section('boy-active','mm-active')
@section('content')
<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div class="page-title-icon">
				<i class="pe-7s-users icon-gradient bg-mean-fruit">
				</i>
			</div>
			<div class="title_font">Boy Detail</div>
		</div>
	</div>
</div>



<div class="content">
	<div class="card">
		<div class="card-body">
		
			<h4 class="text_font" style="text-decoration: underline;"> {{$boy->name}} </h4>
			<table>
				<tr>

					<!-----           --->
			<td width="450px;" class="justify-content-center align-items-center">
                    <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                        <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                        </div>
                    </div> <canvas id="chart-line" width="299" height="200" class="chartjs-render-monitor" style="display: block; width: 320px; height: 300px;"></canvas>
			</td>

			
					<td>
						<div style="background-image: url('{{$boy->mainphoto_path}}');
							background-size: 220px 300px; background-repeat: no-repeat; width:220px; height:300px;object-fit:cover;" >

							<div style="padding-top:210px; padding-left:15px;line-height: 0.5;" class="title_font">
							
								<label style="background-color:white;height:14px;padding-top:3px;"> {{$boy->name}} 		</label><br>
								<label style="background-color:white;height:14px;padding-top:3px;">	{{$boy->age}} 		</label><br>
								<label style="background-color:white;height:14px;padding-top:3px;">	{{$boy->class}} 	</label><br>
								<label style="background-color:white;height:14px;padding-top:3px;">	{{$boy->address}} 	</label>
							</div>
						</div>  
					</td>

				


					<td width="500px;">
			
						<div  id="carouselExampleControls1" class="carousel slide" data-ride="carousel" >
							<div class="carousel-inner">

								<ol class="carousel-indicators">
									@if ($boy->imgs_path != "")
										@foreach(explode('|', $boy->imgs_path) as $key=> $imgs)
											<li data-target="#carouselExampleControls1" data-slide-to="{{$key}}" class="{{$key == 0 ? 'active' : '' }}"></li>
										@endforeach
									@endif
								</ol>
										
											
								@if ($boy->imgs_path != "")
									@foreach(explode('|', $boy->imgs_path) as $key=> $imgs)
										<div class="carousel-item {{$key == 0 ? 'active' : '' }}">
											<img class="d-block w-100" src="{{asset($imgs)}}" alt="First slide" height="300px"   style="object-fit: cover;">
											<div class="carousel-caption d-none d-md-block">
												<p style="color: white;background-color:black;opacity: 0.5;">{{$imgs}}</p>
											</div>
										</div>
									@endforeach
								@else
									<div class="carousel-item active">
										<img class="d-block w-100" src="{{asset('image/boy_carousel2.png')}}" alt="First slide" height="270px"   style="object-fit: cover;">
											<div class="carousel-caption d-none d-md-block">
												<p style="color: red;background-color:black;opacity:0.8;">Plaese add photos,there are no one!</p>
											</div>
									</div>
								@endif
							</div>
														
							<a class="carousel-control-prev " href="#carouselExampleControls1" role="button" data-slide="prev">
								<div class="caroules_button">
									<span class="fas fa-angle-left" aria-hidden="true"></span>
								</div>
								<span class="sr-only">Previous</span>
							</a>
										
							<a class="carousel-control-next" href="#carouselExampleControls1" role="button" data-slide="next">
								<div class="caroules_button">
									<span class="fas fa-angle-right" aria-hidden="true"></span>
								</div>
								<span class="sr-only">Next</span>
							</a>
						</div>
					</td>
			
			

			
					
				</tr>
			</table>


			<div class="col-md-6 ml-3 mt-4 text_font">

				<div>King <label id="king_label"> </label> </div>
				<div class="mb-3 progress">
					<div id="bar1" class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width:{{$boy->king_count}}%;"></div>
				</div>

				<div>Prince <label id="prince_label">  </label> </div>
				<div class="mb-3 progress">
					<div  id="bar2" class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width:{{$boy->prince_count}}%;"></div>
				</div>

			</div>

				<div class="d-flex">
					<button class="btn btn-secondary mt-2 back-btn text_font">Back</button>
				</div>				
			
			
		</div>	
	</div>
</div>

 
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
					url:'/admin/count/'+{{$boy->id}},
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

		$('#bar1').css('width', kcount/2+'%');
		$("#king_label").html(parseInt(kcount)+' Vote ('+ kcount/2+'%)');
		$('#bar2').css('width', pcount/2+'%');
		$("#prince_label").html( parseInt(pcount)+' Vote ('+ pcount/2+'%)' );
	}
	
</script>
@endsection



   

  
