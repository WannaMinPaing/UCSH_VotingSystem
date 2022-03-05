@extends('backend.layouts.app')
@section('title','User Messages')
@section('message-active','mm-active')
@section('content')
<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div class="page-title-icon">
				<i class="metismenu-icon pe-7s-comment"></i>				
			</div>
			<div class="title_font">User Messages</div>
		</div>
	</div>
</div>



<div class="content py-3">
	<div class="card">
		<div class="card-body">
			<table class="table  table-bordered Datatable">
				<thead>
					<tr class="bg-light">
						<th>Name</th>
						<th>Phone No:</th>
						<th>E-mail</th>
                        <th>Message</th>
						<th>Receiving at</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody class="text_font">
					
				</tbody>
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
        	"ajax": "/admin/message/datatable/ssd",
        	columns:
        	[
        		{
        			data:"name",
        			name:"name",
        			sortable:false
        		},
        		{
        			data:"phone_num",
        			name:"phone_num",
        			sortable:false
        		},
        		{
        			data:"email",
        			name:"email",
        			sortable:false
        		},
                {
        			data:"message",
        			name:"message",
        			sortable:false,
					searchable:false
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
        	order:[[4,"desc"]]
		});



		$(document).on('click','.delete',function(e)
		{
			e.preventDefault();
			var id=$(this).data('id');
			var name=$(this).data('name');
			
			Swal.fire
			({
			  title: '<spam class="title_font">Are you sure,you want to delete<h4 class="text_font">'+name+'</h4>?</spam>',
			  showCancelButton: true,
			  confirmButtonText: 'Confirm',
			}).then((result) => 
			{
				  if (result.isConfirmed)
				  {
				    $.ajax({
				    	url:'/admin/message/'+id,
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
