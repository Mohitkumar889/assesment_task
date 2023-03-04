<!DOCTYPE html>
<html>
<head>
	<title>Product Details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('public/website.css')}}">
</head>
	<body>
		<div class="container my-5">
		    <div class="row details-snippet1">
		        <div class="col-md-7">
		            <div class="row">
		                <div class="col-md-2 mini-preview">
		                	@if(sizeof($product->images)!=0)
		                		@foreach($product->images as $i)
		                    		<img class="img-fluid" src="{{$i->image_url}}" alt="Preview">
		                    	@endforeach
		                    @endif
		                </div>
		                <div class="col-md-10">
		                    <div class="product-image">
		                        <img class="img-fluid" src="{{$product->images[0]->image_url}}" alt="Main Image">
		                    </div>

		                </div>
		            </div>

		        </div>
		        <div class="col-md-5" style="color: black;font-weight: 700;">
		            <div class="category"><span class="theme-text">Category:</span> {{$product->category->name}}</div>
		            <div class="title">{{$product->name}}</div>
		            <div class="ratings my-2">
		                <div class="stars d-flex">
		                    <div class="theme-text mr-2">Product Addons: </div>
		                    <div>
		                    	@foreach($product->category->addons as $ad)
		                    		{{$ad->addon_name}} , 
		                    	@endforeach
		                    </div>
		                </div>
		            </div>
		            <div class="price my-2">@if($product->discount != 0){{round($product->price - $product->price * ($product->discount/100))}} @else {{$product->price}} @endif <strike class="original-price">{{$product->price}}</strike></div>
		            <div class="theme-text subtitle">Brief Description:</div>
		            <div class="brief-description">
		                {{mb_strimwidth($product->description, 0, 80, "...")}}
		            </div>

		          <!-- TO REMOVE COLORS -->
		            

		            <hr>
		            <div class="row">
		                <div class="col-md-3">
		                    <input type="number" class="form-control" value="1" min="1">
		                </div>
		                <div class="col-md-9"><button class="btn addBtn btn-block">Add to cart</button></div>
		            </div>

		        </div>
		    </div>

		    <div class="additional-details my-5 text-center">
		        <!-- Nav pills -->
		        <ul class="nav nav-tabs justify-content-center">
		            <li class="nav-tabs">
		                <a class="nav-link active" data-toggle="tab" data-bs-toggle="tab" href="#home">Description</a>
		            </li>
		            <li class="nav-item">
		                <a class="nav-link" data-toggle="tab" data-bs-toggle="tab" href="#menu1">Reviews</a>
		            </li>
		            <li class="nav-item">
		                <a class="nav-link" data-toggle="tab" data-bs-toggle="tab" href="#menu2">Specifications</a>
		            </li>
		        </ul>

		        <!-- Tab panes -->
		        <div class="tab-content mt-4 mb-3">
		            <div class="tab-pane container active" id="home">
		                <div class="description">
		                    {{$product->description}}
		                </div>
		            </div>
		            <div class="tab-pane container fade" id="menu1">
		                <div class="review">
		                    <p>PUT REVIEWS DESIGN HERE</p>
		                </div>
		            </div>
		            <div class="tab-pane container fade" id="menu2">
		                <div class="specification">
		                    <p>PUT SPECIFICATIONS HERE</p>
		                </div>
		            </div>
		        </div>
		    </div>



		    <div class="related-products details-snippet1">

		        <div class="related-heading theme-text">Related Products</div>

		        <div class="row">
		        	@if(sizeof($related_products)!= 0)
		        		@foreach($related_products as $rp)
			               	<div class="col-md-3">
			                    <div class="related-product">
			                        <img class="img-fluid" src="{{$rp->images[0]->image_url}}" alt="Related Product">
			                    </div>
			                    <div class="related-title">{{$rp->name}}</div>
			                    <div class="d-flex">
			                        <div class="related-price mr-auto">{{$rp->price}}</div>
			                        
			                    </div>
			                </div>
		            	@endforeach
		            @else
		            	<div class="text-center" style="color: black;">
		            		No Record Found
		            	</div>
		            @endif
		        </div>
		    </div>
		</div>
	</body>
</html>