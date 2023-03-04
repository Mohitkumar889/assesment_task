@extends('admin.sidebar')

@section('content')
		<!-- Page Content -->
		<div class="dheader">
			Category List
		</div>
		<div class="row">
			<div class="col-md-6">
				
			</div>
			<div class="col-md-6">
				<div class="addbtn">
					<a href="{{route('addUpdate-category')}}" class="btn btn-primary" ><i class="fa fa-plus" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-striped">
						  <thead>
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Name</th>
						      <th scope="col">Action</th>
						    </tr>
						  </thead>
						  <tbody>
						  	@if(sizeof($categories) == 0)
						  		<tr>
						  			<td></td>
						  			<td>No Data Found</td>
						  			<td></td>
						  		</tr>
						  	@else
						  	@foreach($categories as $c)

							    <tr>
							      <th scope="row">{{ $loop->index+1 }}</th>
							      <td>{{$c->name}}</td>
							      <td >
							      	<a href="{{route('addUpdate-category',['cat_id'=>$c->id])}}" class="btn" ><i class="fa fa-edit adicon" aria-hidden="true"></i></a>
							      	<a href="{{route('category-delete',['cat_id'=>$c->id])}}" class="btn" ><i class="fa fa-trash adicon" aria-hidden="true"></i></a>
							      </td>
							    </tr>
							@endforeach
						    @endif
						  </tbody>
						</table>
                    </div>
                    <div class="paginate">{{$categories->onEachSide(1)->links()}}</div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

@endsection

@push('child-scripts')

@endpush
