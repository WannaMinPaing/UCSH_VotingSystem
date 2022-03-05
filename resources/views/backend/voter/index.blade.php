@extends('backend.layouts.app')
@section('title','Voters')
@section('voter-active','mm-active')
@section('content')
<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div class="page-title-icon">
				<i class="pe-7s-users icon-gradient bg-mean-fruit">
				</i>
			</div>
			<div class="title_font">Voters</div>
		</div>
	</div>
</div>

<div class="pt-3 text_font">
	<a href="{{route('admin.voter.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Create Voter</a>
</div>

<div class="content py-3">
	<div class="card">
		<div class="card-body">
			<table class="table  table-bordered Datatable">
				<thead>
					<tr class="bg-light">
						<th>Email</th>
						<th>Year</th>
						<th>Has Voted?</th>
						<th>Created at</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody class="text_font"></tbody>

			</table>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script>
	$(document).ready(function(){
		var table = $('.Datatable').DataTable({
			"processing": true,
        	"serverSide": true,
        	"ajax": "/admin/voter/datatable/ssd",
        	columns:
        	[
        		{
        			data:"email",
        			name:"email",
        			sortable:false
        		},
        		{
        			data:"year",
        			name:"year",
        			sortable:false
        		},
        		{
        			data:"has_vote",
        			name:"has_vote",
        			sortable:false
        		},
        		{
        			data:"created_at",
        			name:"created_at",
        			searchable:false
        		},
        		{
        			data:"action",
        			name:"action",
        			sortable:false,
        			searchable:false
        		}
        	],
        	order:[[3,"desc"]]
		});

		$(document).on('click','.delete',function(e)
		{
			e.preventDefault();
			var id=$(this).data('id');
			var email=$(this).data('email');
			
			Swal.fire
			({
			  title: '<spam class="title_font">Are you sure,you want to delete<h4 class="text_font">'+email+'</h4>?</spam>',
			  showCancelButton: true,
			  confirmButtonText: 'Confirm',
			}).then((result) => 
			{
				if (result.isConfirmed)
				{
				    $.ajax({
				    	url:'/admin/voter/'+id,
				    	type : 'DELETE',
				    	success:function(){
				    		table.ajax.reload();
				    	}
				    })
				} 
			})
		});
	});
</script>
@endsection
