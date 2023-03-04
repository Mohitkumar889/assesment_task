@extends('admin.sidebar')

@section('content')
		<!-- Page Content -->
		<div class="dheader">
			Addon List
		</div>
		<div class="row">
			<div class="col-md-6">
				
			</div>
			<div class="col-md-6">
				<div class="addbtn">
					<a href="{{route('addUpdate-addon')}}" class="btn btn-primary" ><i class="fa fa-plus" aria-hidden="true"></i></a>
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
						      <th scope="col">Category Name</th>
						      <th scope="col">Addon Name</th>
						      <th scope="col">Action</th>
						    </tr>
						  </thead>
						  <tbody>
						  	@if(sizeof($addons) == 0)
						  		<tr>
						  			<td></td>
						  			<td></td>
						  			<td>No Data Found</td>
						  			<td></td>
						  		</tr>
						  	@else
						  		@foreach($addons as $a)
							    <tr>
							      <th scope="row">{{ $loop->index+1 }}</th>
							      <td>{{$a->category->name}}</td>
							      <td>{{$a->addon_name}}</td>
							      <td >
							      	<a href="{{route('addUpdate-addon',['ad_id'=>$a->id])}}" class="btn" ><i class="fa fa-edit adicon" aria-hidden="true"></i></a>
							      	<a href="{{route('addon-delete',['ad_id'=>$a->id])}}" class="btn" ><i class="fa fa-trash adicon" aria-hidden="true"></i></a>
							      </td>
							    </tr>
							    @endforeach
						    @endif
						  </tbody>
						</table>
                    </div>
                    <div class="paginate">{{$addons->onEachSide(1)->links()}}</div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

@endsection

@push('child-scripts')

@endpush
