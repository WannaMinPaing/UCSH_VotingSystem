@extends('backend.layouts.app')
@section('title','Create Boy Selection')
@section('boy-active','mm-active')
@section('content')
<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div class="page-title-icon">
				<i class="pe-7s-users icon-gradient bg-mean-fruit">
				</i>
			</div>
			<div class="title_font">Create Boy Selection</div>
		</div>
	</div>
</div>



<div class="content pt-3">
	<div class="card">
		<div class="card-body">
		@include('backend.layouts.flash')
			<form action="{{route('admin.boy.store')}}" method="POST" id="createboy" enctype="multipart/form-data">
				@csrf

			<table style="width:100%;">

			<tr>
				<td rowspan="3" style="width:250px;">	
<!--Profile-->		<div class="form-group ml-4">
						<input style="display:none"  type="file" name="profile"  id="validatedCustomFile" required>
						<label for="validatedCustomFile" style="text-align: center;" class="text_font">
							<img id="orgin" src="{{asset('image/profile-boy.png')}}" class="panel_img mb-2"  style="width:170; height:150px; border: 2px solid black;border-radius: 50%; object-fit: cover;"  /><br>
							<div id="add_profile"></div>
							Add Profile
						</label>
					</div>
				</td>

				<td>
<!--Name--> 		<div class="form-group">					
						<input type="text" name="name" class="form-control" placeholder="Enter name" value="{{old('name')}}">
					</div>
				</td>
			</tr>	

			<tr>
				<td>
<!--Age-->			<div class="form-group">
						<input type="number" name="age" class="form-control" placeholder="Enter age" value="{{old('age')}}">
					</div>
				</td>
			</tr>
			
			<tr >
    			<td>
<!--Class-->			<div class="mb-3 text_font">
						<select  name="class"  class="custom-select" required style="font-style:italic" value="{{old('class')}}">
							<option value="" >Choose class...</option>
							<option value="Section-A">Section-A</option>
							<option value="Section-B">Section-B</option>
							<option value="Section-C">Section-C</option>
							<option value="Section-D">Section-D</option>
							<option value="Section-E">Section-E</option>
						</select>
					</div>
				</td>
			</tr>
			
			<tr >
<!--Address-->  <td colspan="2">
					<div class="form-group">
						<input type="text" name="address" class="form-control" placeholder="Enter address" value="{{old('address')}}">
					</div>
				</td>
  			</tr>
				
			<tr >
				<td colspan="2">
<!--Photos  -->		<div class="form-group">
						
						<div class="show_inline">
							<label for="upload_file" class="text_font">
								<img src="{{asset('image/adding-img.png')}}" class="panel_img" /><br>
								Add Photos
							</label>
							<input style="display:none;"  id="upload_file"  onchange="preview_image();" type="file" class="form-control " name="photos[]" placeholder="photos" required multiple>										
						</div>

						<div  class="show_inline" id="image_preview" class="row" ></div>
										
					</div>
				</td>
			</tr>
  
		</table>		
		


				<div class="d-flex justify-content-center text_font">
					<button class="btn btn-secondary mr-2 back-btn ">Cancel</button>
					<button type="submit" class="btn btn-primary">Confirm</button>
				</div>

			</form>
		</div>
	</div>
</div>
@endsection

@section('scripts')
{!! JsValidator::formRequest('App\Http\Requests\StoreBoy','#createboy') !!}

<script>

	
	var imgArray=[];
	
								/*                    Profile Field Function                              */ 
	validatedCustomFile.onchange = evt =>
	{
  		const [file] = validatedCustomFile.files
  		if (file) {
    				orgin.src = URL.createObjectURL(file)
  				  }
	}        
	

								/*                    Profile Field Function End                                   */
	

                                /*                    Photos Field Function                                       */	
	function preview_image() 
	{	
		$("#image_preview").empty();
 		var total_file=document.getElementById("upload_file").files.length;
		imgArray.splice(0,imgArray.length);
 		for(var i=0;i<total_file;i++)
 		{
			imgArray.push(URL.createObjectURL(event.target.files[i]));
  			$('#image_preview').append("<div class='image-area column data-i='"+i+"' '><img src='"+imgArray[i]+"' data-id='"+i+"' width='100px;' height='100px;'><a class='remove-image' data-id='"+i+"'  style='display: inline;'>&#215;</a></div>");		
		 }
	}

	function reshow_image() 
	{	
 		for(var j=0;j<imgArray.length;j++)
 		{
  			$('#image_preview').append("<div class='image-area column data-i='"+j+"' '><img src='"+imgArray[j]+"' data-id='"+j+"' width='100px;' height='100px;'>  <a class='remove-image' data-id='"+j+"'  style='display: inline;'>&#215;</a></div>");
		}		
	}

	$(document).ready(function(){

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
						imgArray.splice(id, 1);

						var dt = new DataTransfer();
						var input = document.getElementById('upload_file');
						var { files }  = input;
						
						for (var i = 0; i < files.length; i++) 
						{
							
							var file = files[i];
							if (id !== i)
								{
									dt.items.add(file);
									
								}
							
						}
						input.files = dt.files;
						
						$("#image_preview").empty();
						reshow_image();
					} 
				})
			});

			         /*                    Photos Field Function  End                                     */
					 

	});


/*var input = document.getElementById('upload_file');
		var { files }  = input;
		if(files.length > 0)
		{
			console.log(old_dt.length);		
						
		//input.files = old_dt.files;

		for (var i = 0; i < old_dt.length; i++) 
				{
					alert("hello");
				}	
				
				}*/


 </script>

@endsection
