@extends('backend.layouts.app')
@section('title','Message Detail')
@section('message-active','mm-active')
@section('content')
<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div class="page-title-icon">
                <i class="metismenu-icon pe-7s-comment"></i>
			</div>
			<div class="title_font">Message Detail</div>
		</div>
	</div>
</div>



<div class="content py-3">
	<div class="card">
		<div class="card-body">
			@include('backend.layouts.flash')

				<table class="table table-hover table-cell text_font">
			
				<tbody>
				    <tr>
				      <td><label class="ml-3">Name : </label></td>
				      <td><label><i>- {{$message->name}}</i></label></td>
				    </tr>

				    <tr>
				      <td><labe class="ml-3"l>Phone Num : </label></td>
				      <td><label><i>- {{$message->phone_num}}</i></label></td>
				    </tr>

                    <tr>
				      <td><labe class="ml-3"l> E-mail : </label></td>
				      <td><label><i>- {{$message->email}}</i></label></td>
				    </tr>

                    <tr>
				      <td><labe class="ml-3"l> Message : </label></td>
				      <td><label><i>- {{$message->message}}</i></label></td>
				    </tr>
				    
				    <tr>
				      <td><label class="ml-3">Reply : </label></td>
				      <td>
				      	@if($message->reply=='No')
				      	{
				      		<label class="text-danger"><i> No </i></label>
				      	}
				      	@else{
				      		<label class="text-success"><i>Yes</i></label>
				      	}
				      	@endif
				      	</td>
				    </tr>
		    
				    <tr>
				      <td><label class="ml-3">IP Address : </label></td>
                      <td><label><i>- {{$message->ip}}</i></label></td>
				    </tr>

				    <tr>
				      <td><label class="ml-3">User Agent : </label></td>
				      <td><label><i>- {{$message->user_agent}}</i></label></td>
				    </tr>

				    <tr>
				      <td><label class="ml-3">Created at : </label></td>
				      <td><label><i>- {{$message->created_at}}</i></label></td>
				    </tr>

				    <tr>
				      <td><label class="ml-3">Updated at : </label></td>
				      <td><label><i>- {{$message->updated_at}}</i></label></td>
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
{!! JsValidator::formRequest('App\Http\Requests\UpdateVoter','#update') !!}
<script>
	$(document).ready(function(){
		
	});
</script>
@endsection
