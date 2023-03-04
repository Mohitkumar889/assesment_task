@extends('admin.sidebar')

@section('content')
		<!-- Page Content -->
		
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <form id="prod_form" enctype="multipart/form-data">
						  	<div class="mb-3">
						  		<input type="hidden" name="p_id" value="{{@$product->id}}">
						    	<label for="exampleInputUsername" class="form-label">Product Name</label>
						    	<input type="text" name="product_name" class="form-control" id="exampleInputUsername" placeholder="Name" aria-describedby="" value="{{@$product->name}}">
						    	<div class="text-danger" id="message1"></div>
						  	</div>
						  	<div class="mb-3">
						    	<label for="exampleCategory" class="form-label">Category</label>
						    	<select class="form-select" id="exampleCategory" name="category" aria-label="Default select example">
							  		<option selected>Choose Category</option>
							  		@foreach($categories as $c)
							  			<option value="{{$c->id}}" @if(@$product->category_id == $c->id) selected @endif >{{$c->name}}</option>
							  		@endforeach
								</select>
						    	<div class="text-danger" id="message2"></div>
						  	</div>
						  	<div class="mb-3">
						  		<label for="examplePrice" class="form-label">Price</label>
						  		<input type="text" class="form-control" id="examplePrice" placeholder="Price" name="price" oninput="this.value = this.value.replace(/[^0-9.]/g ,''); this.value = this.value.replace(/(\..*)\./g, '$1');" value="{{@$product->price}}">
						  		<div class="text-danger" id="message3"></div>
						  	</div>
						  	<div class="mb-3">
						  		<label for="exampleDiscount" class="form-label">Discount</label>
						  		<input type="text" class="form-control" id="exampleDiscount" placeholder="Discount" name="discount" oninput="this.value = this.value.replace(/[^0-9+]/g ,''); this.value = this.value.replace(/(\..*)\./g, '$1');" value="{{@$product->discount}}">
						  		<div class="text-danger" id="message4"></div>
						  	</div>
						 	<div class="mb-3">
						  		<label for="exampleQuantity" class="form-label">Quantity</label>
						  		<input type="text" class="form-control" id="exampleQuantity" placeholder="Quantity" name="quantity" oninput="this.value = this.value.replace(/[^0-9+]/g ,''); this.value = this.value.replace(/(\..*)\./g, '$1');" value="{{@$product->quantity}}">
						  		<div class="text-danger" id="message5"></div>
						  	</div>
						  	<div class="mb-3">
							  	<label for="exampleDescription">Description</label>
							  	<textarea class="form-control" name="description" placeholder="Write here..." id="exampleFormControlTextarea1" rows="3">{{@$product->description}}</textarea>
						  		<div class="text-danger" id="message6"></div>

						  	</div>
						  	<div class="mb-3">
							  <label for="formFileMultiple" class="form-label">Images @if(@$product)@if(sizeof($product->images) !== 0)({{@$product->images->count()}} Images selected ) @endif @endif</label>
							  <input class="form-control" type="file" name="image[]" id="formFileMultiple" multiple>
						  		<div class="text-danger" id="message7"></div>
							</div>
						  	
						  <button type="submit" id="exprt_submt" class="btn btn-primary">Submit</button>
						</form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

@endsection

@push('child-scripts')
<script>
	$("#prod_form").submit(function(e){
        $('#message1').html("");
        $('#message2').html("");
        $('#message3').html("");
        $('#message4').html("");
        $('#message5').html("");
        $('#message6').html("");
        $('#message7').html("");

        $("#exprt_submt").attr("disabled", true);
          $.ajax({
            url: "{{route('addUpdate-product')}}", 
            type: "post",
            headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') },
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(data){
                if(data==1)
                {
                	alert("Product added successfully.");
                  $("#exprt_submt").attr("disabled", true);
                  window.location.href= "{{route('product-list')}}";
                }else if(data == 2){
                	alert("Product updated successfully.");
                  $("#exprt_submt").attr("disabled", true);
                  window.location.href= "{{route('product-list')}}";
                }
                else{
                  $('#message1').html(data.product_name);
                  $('#message2').html(data.category);
                  $('#message3').html(data.price);
                  $('#message4').html(data.discount);
                  $('#message5').html(data.quantity);
                  $('#message6').html(data.description);
                  $('#message7').html(data.image);

                  $("#exprt_submt").attr("disabled", false);
                }
            }
          });
          e.preventDefault();
      });
</script>
@endpush
