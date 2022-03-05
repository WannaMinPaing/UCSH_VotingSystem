@extends('backend.layouts.app')
@section('title','Edit Voter')
@section('voter-active','mm-active')
@section('content')
<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div class="page-title-icon">
				<i class="pe-7s-users icon-gradient bg-mean-fruit">
				</i>
			</div>
			<div class="title_font">Edit Voter</div>
		</div>
	</div>
</div>



<div class="content pt-3">
	<div class="card">
		<div class="card-body">
			@include('backend.layouts.flash')
			<form action="{{route('admin.voter.update',$voter->id)}}" method="POST" id="update">
				@csrf
				@method('PUT')

				<div class="form-group">
					<label class="text_font">E-mail</label>
					<input type="email" name="email" class="form-control" value="{{$voter->email}}">
				</div>

				<div class="mb-3">
				    <select  name="year"  class="custom-select text_font" required>
				      <option value="">Choose year...</option>
				      <option 
				      	{{ ($voter->year) == 'First Year' ? 'selected' : ''}} value="First Year">First Year
				      </option>


				      <option 
				      	{{ ($voter->year) == 'Second Year' ? 'selected' : ''}} value="Second Year">Second Year
				      </option>

				      <option 
				      {{ ($voter->year) == 'Third Year' ? 'selected' : ''}} value="Third Year">Third Year
				  	  </option>

				      <option
				      {{ ($voter->year) == 'Fourth Year' ? 'selected' : ''}} value="Fourth Year">Fourth Year
				      </option>

				      <option
				      {{ ($voter->year) == 'Final Year' ? 'selected' : ''}} value="Final Year">Final Year
				  	  </option>

				      <option 
				      {{ ($voter->year) == 'Other' ? 'selected' : ''}} value="Other">Other
				      </option>
				    </select>
			        <div class="invalid-feedback">Example invalid custom select feedback</div>
			    </div>

				

				<div class="d-flex justify-content-center text_font">
					<button class="btn btn-secondary mr-2 back-btn">Cancel</button>
					<button type="submit" class="btn btn-primary">Update</button>
				</div>

			</form>
		</div>
	</div>
</div>
@endsection

@section('scripts')
{!! JsValidator::formRequest('App\Http\Requests\UpdateVoter','#update') !!}
<script>
	$(document).ready(function(){
		
	});
</script>
@endsection
