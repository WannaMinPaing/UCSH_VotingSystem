@extends('backend.layouts.app')
@section('title','Boy Selection')
@section('boy-active','mm-active')
@section('content')
<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div class="page-title-icon">
				<i class="pe-7s-users icon-gradient bg-mean-fruit">
				</i>
			</div>
			<div class="title_font">Boy Selections</div>
		</div>
	</div>
</div>

<div class="pt-3 text_font">
	<a href="{{route('admin.boy.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Create Boy Selection</a>
</div>

<div class="content py-3">
	<div class="card">
		<div class="card-body">
			<table class="table  table-bordered Datatable">
				<thead>
					<tr class="bg-light">
						<th>Name</th>
						<th>Age</th>
						<th>Class</th>
						<th>Created at</th>
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
        	"ajax": "/admin/boy/datatable/ssd",
        	columns:
        	[
        		{
        			data:"name",
        			name:"name",
        			sortable:false
        		},
        		{
        			data:"age",
        			name:"age",
        			sortable:false
        		},
        		{
        			data:"class",
        			name:"class",
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
			var name=$(this).data('name');
			
			Swal.fire
			({
			  title: '<spam class="title_font">Are you sure,you want to delete <h4 class="text_font">'+name+'</h4>?</spam>',
			  showCancelButton: true,
			  confirmButtonText: 'Confirm',
			}).then((result) => 
			{
				  if (result.isConfirmed)
				  {
				    $.ajax({
				    	url:'/admin/boy/'+id,
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
