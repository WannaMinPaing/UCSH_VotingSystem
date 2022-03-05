@extends('backend.layouts.app')
@section('title','Edit Boy Selection')
@section('boy-active','mm-active')
@section('content')
<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div class="page-title-icon">
				<i class="pe-7s-users icon-gradient bg-mean-fruit">
				</i>
			</div>
			<div class="title_font">Edit Boy Selection</div>
		</div>
	</div>
</div>

<div class="content pt-3">
	<div class="card">
		<div class="card-body">
			@include('backend.layouts.flash')

			<form action="{{route('admin.boy.update',$boy->id)}}" method="POST" id="update" enctype="multipart/form-data">
			@csrf
			@method('PUT')

			<table>
				<tr>
					<td>
<!--Profile-->			<div class="form-gruop app-footer-right" style="width:180px; height:360px;";>
               				<label class="text_font">Profile:(<small class="text-danger">jpeg|bmp|png</small>)</label>
 							<ul class="nav nav-tabs text_font" id="myTab" role="tablist">
			                    <li class="nav-item" role="presentation">
			                        <a class="nav-link active text_font" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Old</a>
			                    </li>
			                    <li class="nav-item" role="presentation">
			                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">New</a>
			                    </li>
			                </ul>

			                <div class="tab-content mt-0 pt-2" id="myTabContent" style="text-align: center;">
			                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
			                        <img src="{{asset($boy->mainphoto_path)}}" width="170px" height="250px" alt="Profile" >
			                        <input type="hidden" name="oldphoto" value="{{$boy->mainphoto_path}}">
			                    </div>

			                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"> 
			                    	<input id="edit_add_new_profile" style="display:none;" type="file" name="newphoto_file"  class="form-control-file">
									<label for="edit_add_new_profile">
										<img  src="{{asset('image/add-profile2.png')}}" id="edit_new_profile" width="170px" height="240px" class="text_font" style="color:red;" alt="Please add only photo type! Click here to add photo." />
									</label>
			                     	@error('newphoto')
			                        	<span class="invalid-feedback" role="alert">
			                          		<strong>{{  $message }}</strong>
			                        	</span>
			                      	@enderror
			                  	</div>
			        		</div>       
			        	</div>
					</td>

					<td width="700px;">
						<table class="table table-hover mt-5 ml-1 text_font">			
						<tbody >

<!--Name-->					<tr class="pl-3 mt-2" width="100px;">	
								<td><label class="pl-3">Name</label></td>
								<td ><input type="text" name="name" class="form-control" value="{{$boy->name}}"></td>
							</tr>	
				
<!--Age-->					<tr>
								<td><label class="pl-3">Age</label></td>
								<td><input type="number" name="age" class="form-control" value="{{$boy->age}}"></td>
							</tr>

<!--Address-->				<tr>
								<td><label class="pl-3">Address</label></td>
								<td><input type="text" name="address" class="form-control" value="{{$boy->address}}"></td>
							</tr>

							<tr>
<!--Class-->					<td><label class="pl-3">Choose class...</label></td>
								<td>	
									<div class="mb-0">
										<select  name="class"  class="custom-select" required>
										<option value="">Choose class...</option>

										<option 
											{{ ($boy->class) == 'Section-A' ? 'selected' : ''}} value="Section-A">Section-A
										</option>

										<option 
											{{ ($boy->class) == 'Section-B' ? 'selected' : ''}} value="Section-B">Section-B
										</option>

										<option 
											{{ ($boy->class) == 'Section-C' ? 'selected' : ''}} value="Section-C">Section-C
										</option>

										<option
											{{ ($boy->class) == 'Section-D' ? 'selected' : ''}} value="Section-D">Section-D
										</option>

										<option
											{{ ($boy->class) == 'Section-E' ? 'selected' : ''}} value="Section-E">Section-E
										</option>
										</select>
										<div class="invalid-feedback">Example invalid custom select feedback</div>
									</div>
								</td>
							</tr>
						</tbody>
			    		</table>
					</td>

					<td  width="900px;" >
<!--Photos-->
						<div  id="carouselExampleControls1" class="carousel slide mt-5 " data-ride="carousel" >
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
				                    	<img class="d-block w-100" src="{{asset($imgs)}}" alt="First slide" height="270px"   style="object-fit: cover;">
				                    	<div class="carousel-caption d-none d-md-block">
							        		<p style="color: white;background-color:black;opacity: 0.5;
							        		">{{$imgs}}</p>
							       		</div>
				                	</div>
				                	@endforeach
								@else
									<div class="carousel-item active">
				                    	<img class="d-block w-100" src="{{asset('image/boy_carousel2.png')}}" alt="First slide" height="270px"   style="object-fit: cover;">
				                    	<div class="carousel-caption d-none d-md-block">
										<p style="color: red;background-color:black;opacity:0.8;">
											Plaese add photos,there are no one!</p>
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

<!--Hidden  input-->			    
			<input style="display:none;"  type="text" name="tempore_photo"  multiple id="tempore_photo">										
<!--Images Preview-->					
			<div class="show_inline text_font">	
				<label for="upload_file">
					<img src="{{asset('image/adding-img.png')}}" class="panel_img" /><br>
						Add Photos
					</label>
				<input style="display:none;"  id="upload_file" onchange="preview_image();" type="file" class="form-control " name="newphotos[]"   multiple>										
			</div>			

			<div  class="show_inline"  id="image_preview" class="row" ></div>
			<div  class="show_inline"  id="image_preview2" class="row" ></div>

			<div style="clear:both;"></div>

			<div class="d-flex justify-content-center mt-3 text_font">
				<button class="btn btn-secondary mr-2 back-btn">Cancel</button>
				<button type="submit" class="btn btn-primary">Update</button>
			</div>

				
			</form>





<!--

<div class="container">

<div class="row">
<div class="col-6">
		<div class="abc ">
			@if ($boy->imgs_path != "")
				@foreach(explode('|', $boy->imgs_path) as $key=> $imgs)
				<div class="card">
					<div><img  src="{{asset($imgs)}}" alt="First slide" style="height:100px;width=100px;"></div>
				</div>                  
  				@endforeach
  			@endif
		</div>
</div>
</div>

</div>

-->
		</div>
	</div>
</div>
@endsection

@section('scripts')
{!! JsValidator::formRequest('App\Http\Requests\UpdateBoy','#update') !!}

<script>
	
	var newImg=[];
	var addNewImg=[];	//for show new photo


/*
	$('.abc').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

*/ 
	
														/* Show Images End  */
	if ("{{$boy->imgs_path}}" != "")
	{
		const words = "{{$boy->imgs_path}}".split("|");
		for(var i=0;i < words.length;i++)
		{
			$('#image_preview').append("<div class='image-area column data-i='"+i+"' '><img src='"+ words[i] +"'  data-id='"+i+"' width='100px;' height='100px;'><a class='remove-image' data-id='"+i+"'  style='display: inline;'>&#215;</a></div>");
			var text = document.getElementById('tempore_photo'); 
			
			text.value += words[i];
			text.value=(text.value).concat("|");    
			newImg.push(words[i]);
		}
	}	
														/* Show Images End  */

														/* Reshow Imgae Function */

	function reshow_image() 
	{	
		var recount=0;
 		for(var j=0;j<newImg.length;j++)
 		{
  			$('#image_preview').append("<div class='image-area column data-i='"+recount+"' '><img src='"+newImg[j]+"' data-id='"+recount+"' width='100px;' height='100px;'>  <a class='remove-image' data-id='"+recount+"'  style='display: inline;'>&#215;</a></div>");
			recount++;
		 }

	}
	
														/* Reshow Imgae Function End */

														/* Reshow New Imgae Function */

	function reshow_new_image() 
	{			
 		for(var j=0;j<addNewImg.length;j++)
 		{
  			$('#image_preview2').append("<div class='image-area column data-i='"+j+"' '><img src='"+addNewImg[j]+"' data-id='"+j+"' width='100px;' height='100px;'>  <a class='remove-image2' data-id='"+j+"'  style='display: inline;'>&#215;</a></div>");
			
		 }
	}
	
														/* Reshow New Imgae Function End */

														
													 /* Show New Photos */
	function preview_image() 
	{	
		$("#image_preview2").empty();
		var total_file=document.getElementById("upload_file").files.length;
		addNewImg.splice(0,addNewImg.length);
		for(var i=0;i<total_file;i++)
			{
				addNewImg.push(URL.createObjectURL(event.target.files[i]));
				$('#image_preview2').append("<div class='image-area column data-i='"+i+"' '><img src='"+addNewImg[i]+"' data-id='"+i+"' width='100px;' height='100px;'><a class='remove-image2' data-id='"+i+"'  style='display: inline;'>&#215;</a></div>");			
			}
	}
													/* Show New Photos End */


	$(document).ready(function()
	{

		                                         		/* Profile Change */
		edit_add_new_profile.onchange = evt => 
			{
				const [file] = edit_add_new_profile.files
				if (file)
					{
						edit_new_profile.src = URL.createObjectURL(file)
					}
			}

														/* Profile Change End */

														/* Photo Delete  */
		$(document).on('click','.remove-image',function(e)
		{		
			e.preventDefault();
     		var id=$(this).data('id');	

			Swal.fire
			({
				title: '<spam class="title_font">Are you sure,you want to delete this photo ?</spam>',
				showCancelButton: true,
				confirmButtonText: 'Confirm',
			}).then((result) => 
				{
					// Read more about isConfirmed, isDenied below 
					if(result.isConfirmed)
					{
						//	$('.image-area').filter('[data-i='+id+']').remove();
						newImg.splice(id, 1);
						
						var text = document.getElementById('tempore_photo'); 
							text.value="";
						
						for(var j=0;j<newImg.length;j++)
						{
							text.value+=newImg[j];
							text.value=(text.value).concat("|");
						}
						console.log(text.value);
						
						$("#image_preview").empty();
						reshow_image();
					} 
				})
		});

													 /* Photo Delete End  */

													/*New Photo Delete  */
		$(document).on('click','.remove-image2',function(e)
		{		
			e.preventDefault();
     		var id=$(this).data('id');
				

			Swal.fire
			({
				title: '<spam class="title_font">Are you sure,you want to delete this photo ?</spam> ?',
				showCancelButton: true,
				confirmButtonText: 'Confirm',
			}).then((result) => 
				{
					// Read more about isConfirmed, isDenied below 
					if(result.isConfirmed)
					{
						//	$('.image-area').filter('[data-i='+id+']').remove();
						addNewImg.splice(id, 1);
						
						var dt2 = new DataTransfer();
						var input = document.getElementById('upload_file');
						var { files }  = input;
						
						for (var i = 0; i < files.length; i++) 
						{
							var file = files[i];
							if (id !== i)
								{
									dt2.items.add(file);
									
								}
						}
						input.files = dt2.files;
						
						$("#image_preview2").empty();
						reshow_new_image();
					} 
				})
		});

													 /*New Photo Delete End  */

	});
</script>
@endsection