@extends('admin.sidebar')

@section('content')
		<!-- Page Content -->
		<div class="dheader">
			Product List
		</div>
		<div class="row">
			<div class="col-md-6">
				
			</div>
			<div class="col-md-6">
				<div class="addbtn">
					<a href="{{route('addUpdate-product')}}" class="btn btn-primary" ><i class="fa fa-plus" aria-hidden="true"></i></a>
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
						      <th scope="col">Feature Image</th>
						      <th scope="col">Category</th>
						      <th scope="col">Name</th>
						      <th scope="col">Quantity</th>
						      <th scope="col">Price</th>
						      <th scope="col">Discount</th>
						      <th scope="col">Action</th>
						    </tr>
						  </thead>
						  <tbody>
						  	@if(sizeof($products) == 0)
						  		<tr>
						  			<td></td>
						  			<td></td>
						  			<td></td>
						  			<td>No Data Found</td>
						  			<td></td>
						  			<td></td>
						  			<td></td>
						  			<td></td>

						  		</tr>
						  	@else
						    	@foreach($products as $p)
						    	<tr style="vertical-align: middle;">
							      <th scope="row">{{$loop->index+1}}</th>
							      <td><img style="width: 85px;height: 50px;" src="{{$p->images[0]->image_url}}" onError="this.src = '{{asset('public/dummy-image.jpg')}}'"></td>
							      <td>{{$p->category->name}}</td>
							      <td>{{$p->name}}</td>
							      <td>{{$p->quantity}}</td>
							      <td>{{$p->price}}</td>
							      <td>{{$p->discount}} %</td>
							      <td >
							      	<a href="{{route('addUpdate-product',['p_id'=>$p->id])}}" class="btn" ><i class="fa fa-edit adicon" aria-hidden="true"></i></a>
							      	<a href="{{route('product-delete',['p_id'=>$p->id])}}" class="btn" ><i class="fa fa-trash adicon" aria-hidden="true"></i></a>
							      </td>
							    </tr>
							    @endforeach
						    @endif
						  </tbody>
						</table>
                    </div>
                    <div class="paginate">{{$products->onEachSide(1)->links()}}</div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

@endsection

@push('child-scripts')

@endpush
