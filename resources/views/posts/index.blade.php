<div class="container">
	<div class="row">
		<div class="col-sm-7">
			<h3>Simple CRUD Apps with AJAX</h3>
		</div>
		<div class="col-sm-5">
			<div class="pull-right">
				<div class="input-group">
					<input type="text" 
					class="form-control"
					id="search"
					name="search"
					value="{{ request()->session()->get('search') }}"
					onkeydown= "if (event.keyCode == 13) ajaxLoad('{{ url('posts') }}?search='+this.value)"
					 
					placeholder="Search title">
					<div class="input-group-btn">
						<button type="submit" name="button"
						onclick="ajaxLoad('{{ url('posts') }}?search='+$('#search').val())" 
						 class="btn btn-primary">
							<i class="fa fa-search"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<table>
		<thead>
			<tr>
				<th width="60px">No°</th>
				<th> Title Posts </th>
				{{request()->session()->get('field' =='title'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'): '')}}
				<th> Description </th>
				{{request()->session()->get('field' =='description'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'): '')}}
				<th>Create At</th>
				<th>Update At</th>
				<th>
					<a href="javascript:ajaxLoad('{{ url('posts/create') }}')" class="btn btn-xs btn-primary">  <i class="fa fa-plus"></i> New Post</a>
				</th>
			</tr>
		</thead>
		<tbody>
			@php
				$i = 1
			@endphp
			@foreach ($posts as $key => $value)
				<tr>
					<td>{{ $i++}}</td>
					<td>{{ $value->title}}</td>
					<td>{{ $value->description}}</td>
					<td>{{ $value->created_at}}</td>
					<td>{{ $value->updated_at}}</td>
					<td>
						<a href="javascript:ajaxLoad(' {{ url('posts/show/'.$value->id ) }} ')" class="btn btn btn-info">Show</a>
						<a href="javascript:ajaxLoad(' {{ url('posts/update/'.$value->id ) }} ')" class="btn btn btn-warning">Edit</a>
						@method('DELETE')
						<a href="javascript:if(confirm('Are you sure to delete this data?')) ajaxDelete('{{ url('posts/delete/'.$value->id ) }}','{{ csrf_token() }}')"  class="btn btn btn-danger">Delete</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<ul class="pagination">
		{{ $posts->links() }}
	</ul>

</div>