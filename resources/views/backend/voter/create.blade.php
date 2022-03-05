@extends('backend.layouts.app')
@section('title','Create Voter')
@section('voter-active','mm-active')
@section('content')
<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div class="page-title-icon mt-3">
				<i class="pe-7s-users icon-gradient bg-mean-fruit">
				</i>
			</div>
			<div class="title_font mt-3">Create Voter</div>
		</div>
	</div>
</div>



<div class="content pt-3">
	<div class="card">
		<div class="card-body">
			<form action="{{route('admin.voter.store')}}" method="POST" id="create">
				@csrf
				
				<div class="form-group text_font">
					<label class="text_font">E-mail</label>
					<input type="email" name="email" class="form-control text_font2">
				</div>

				<div class="mb-3 text_font">
				    <select  name="year"  class="custom-select" required>
				      <option value="">Choose year...</option>
				      <option value="First Year">First Year</option>
				      <option value="Second Year">Second Year</option>
				      <option value="Third Year">Third Year</option>
				      <option value="Fourth Year">Fourth Year</option>
				      <option value="Final Year">Final Year</option>
				      <option value="Other">Other</option>
				    </select>
			    </div>

				

				<div class="d-flex justify-content-center text_font">
					<button class="btn btn-secondary mr-2 back-btn">Cancel</button>
					<button type="submit" class="btn btn-primary">Confirm</button>
				</div>

			</form>
		</div>
	</div>
</div>
@endsection

@section('scripts')
{!! JsValidator::formRequest('App\Http\Requests\StoreVoter','#create') !!}
<script>
	$(document).ready(function(){
		
	});
</script>
@endsection
