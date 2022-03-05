@extends('backend.layouts.app')
@section('title','Show Voter')
@section('voter-active','mm-active')
@section('content')
<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div class="page-title-icon">
				<i class="pe-7s-users icon-gradient bg-mean-fruit">
				</i>
			</div>
			<div class="title_font">Voter Detail</div>
		</div>
	</div>
</div>



<div class="content py-3">
	<div class="card">
		<div class="card-body">
		<h4 class="text_font" style="text-decoration: underline;"> {{$voter->email}} </h4>
			<table class="table table-hover table-cell text_font">
			
				<tbody>
				    <tr>
				      <td><label class="ml-3" style="width:80px;">E-mail : </label></td>
				      <td><label><i>- {{$voter->email}}</i></label></td>
				    </tr>
				    <tr>
				      <td><labe class="ml-3">Year : </label></td>
				      <td><label><i>- {{$voter->year}}</i></label></td>
				    </tr>
				    
				    <tr>
				      <td><label class="ml-3">Has Voted : </label></td>
				      <td>
				      	@if($voter->has_vote=='No')
				      	{
				      		<label class="text-danger"><i> {{$voter->has_vote}}</i></label>
				      	}
				      	@else{
				      		<label class="text-success"><i>  {{$voter->has_vote}}</i></label>
				      	}
				      	@endif
				      	</td>
				    </tr>

				    <tr>
				      <td><label class="ml-3">Login at : </label></td>
				      <td><label><i>
				      	@if (is_null($voter->login_at))   
				      		--
						@else
							-{{$voter->login_at}}
						@endif	
				      	 </i></label></td>
				    </tr>

				    <tr>
				      <td><label class="ml-3">IP Address : </label></td>
				      <td><label><i>
				      	@if (is_null($voter->ip))   
				      		--
						@else
							-{{$voter->ip}}
						@endif
				       </i></label></td>
				    </tr>

				    <tr>
				      <td><label class="ml-3">User Agent : </label></td>
				      <td><label><i>
				      	@if (is_null($voter->user_agent))   
				      		--
						@else
							-{{$voter->user_agent}}
						@endif
				      </i></label></td>
				    </tr>

				    <tr>
				      <td><label class="ml-3">Created at : </label></td>
				      <td><label><i>- {{$voter->created_at}}</i></label></td>
				    </tr>

				    <tr>
				      <td><label class="ml-3">Updated at : </label></td>
				      <td><label><i>- {{$voter->updated_at}}</i></label></td>
				    </tr>
				  </tbody>
				</table>
				<div class="d-flex ">
					<button class="btn btn-secondary mr-2 back-btn text_font">Back</button>
				</div>

				
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script>
	$(document).ready(function(){   });
</script>
@endsection
