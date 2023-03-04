@extends('admin.sidebar')

@section('content')
		<!-- Page Content -->
		
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <form id="addon_form">
						  	<div class="mb-3">
						  		<input type="hidden" name="ad_id" value="{{@$addon->id}}">
						    	<label for="exampleCategory" class="form-label">Category</label>
						    	<select class="form-select" id="exampleCategory" name="category" aria-label="Default select example">
							  		<option selected>Choose Category</option>
							  		@foreach($categories as $c)
							  			<option value="{{$c->id}}" @if(@$addon->category_id == $c->id) selected @endif >{{$c->name}}</option>
							  		@endforeach
								</select>
						    	<div class="text-danger" id="message1"></div>
						  	</div>
						  	<div class="mb-3">
						  		<label for="exampleAddon" class="form-label">Addon Name</label>
						  		<input type="text" class="form-control" id="exampleAddon" placeholder="Addon" name="addon_name" value="{{@$addon->addon_name}}">
						  		<div class="text-danger" id="message2"></div>
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
	$("#addon_form").submit(function(e){
        $('#message1').html("");
        $('#message2').html("");
        $("#exprt_submt").attr("disabled", true);
          $.ajax({
            url: "{{route('addUpdate-addon')}}", 
            type: "post",
            headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') },
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(data){
                if(data==1)
                {
                	alert("addon added successfully.");
                  $("#exprt_submt").attr("disabled", true);
                  window.location.href= "{{route('addon-list')}}";
                }else if(data == 2){
                	alert("addon updated successfully.");
                  $("#exprt_submt").attr("disabled", true);
                  window.location.href= "{{route('addon-list')}}";
                }
                else{
                  $('#message1').html(data.category);
                  $('#message2').html(data.addon_name);
                  $("#exprt_submt").attr("disabled", false);
                }
            }
          });
          e.preventDefault();
      });
</script>
@endpush
