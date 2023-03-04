@extends('admin.sidebar')

@section('content')
		<!-- Page Content -->
		
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <form id="cat_form">
						  	<div class="mb-3">
						  		<input type="hidden" name="cat_id" value="{{request()->cat_id}}">
						    	<label for="exampleInputUsername" class="form-label">Category Name</label>
						    	<input type="text" name="category_name" value="{{@$category->name}}" class="form-control" id="exampleInputUsername" aria-describedby="">
						    	<div class="text-danger" id="message"></div>
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
	$("#cat_form").submit(function(e){
        $('#message').html("");
        $("#exprt_submt").attr("disabled", true);
          $.ajax({
            url: "{{route('addUpdate-category')}}", 
            type: "post",
            headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') },
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(data){
                if(data==1)
                {
                	alert("category added successfully.");
                  $("#exprt_submt").attr("disabled", true);
                  window.location.href= "{{route('category-list')}}";
                }else if(data == 2){
                	alert("category updated successfully.");
                  $("#exprt_submt").attr("disabled", true);
                  window.location.href= "{{route('category-list')}}";
                }
                else{
                  $('#message').html(data.category_name);
                  $("#exprt_submt").attr("disabled", false);
                }
            }
          });
          e.preventDefault();
      });
</script>
@endpush
