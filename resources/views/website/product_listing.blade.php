
<html lang="en">
  <head>
    <title>Product List and Grid View</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial=scale=1.0, maximun-scale=1.0, minimun-scale=1.0" >
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('public/website.css')}}">

  </head>


  <h1>Product List and Grid View</h1>

  <!--Buttons of grid and list-->
  <div class="buttons">
    <i class="fa fa-th-large"  id="showdiv1" aria-hidden="true"></i> &nbsp;  <i class="fa fa-th-list" id="showdiv2" aria-hidden="true"></i> 
  </div>

  <div class="container">
    <!--Product Grid-->
    <div id="div1">
      <section class="section-grid">
        <div class="grid-prod">
          @if(sizeof($products) != 0)
            @foreach($products as $p)
              <div class="prod-grid">
                <img src="{{$p->images[0]->image_url}}" alt="" style="width:530px;height: 353px;">
                <h3>{{$p->name}}</h3>    
                <p>{{$p->category->name}}</p>
                 <div class="row">
                    <a href="{{route('product-details',['p_id'=>$p->id])}}" class="detailbtn"> <i style="padding: 8px 0px 0px 10px;" class="fa fa-eye" aria-hidden="true"></i></a>
                    <button class="btn"> Buy <i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                 </div>
              </div>
            @endforeach
          @endif
        </div>
      </section> 
    </div>
 <!--Product List-->         
    <div id="div2" style="display:none;">
      <section class="section-list">
        <table>
          @if(sizeof($products) != 0)
            @foreach($products as $p)
              <tr>
                <td>
                  <img src="{{$p->images[0]->image_url}}" alt="" style="width:743px;height: 496px;">
                </td>
                <td>  
                  <h3>{{$p->name}}</h3>    
                  <p>{{$p->category->name}}</p>
                  <div class="row" style="display: inherit;">
                    <a href="{{route('product-details',['p_id'=>$p->id])}}" style="margin-top: 28px;" class="detailbtn"> <i style="padding: 8px 0px 0px 10px;" class="fa fa-eye" aria-hidden="true"></i></a>
                    <button class="btn-list"> Buy <i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                  </div>
                  <div class="row">
                    <label style="font-weight: 700;">Description :</label>
                    <p>{{$p->description}}</p>
                  </div>
                </td>
              </tr>
            @endforeach
          @endif
        </table>
      </section> 
    </div>
  </div>  


<script src="https://code.jquery.com/jquery-3.2.1.js"></script> 
<script>
$(function() {
  $('#showdiv1').click(function() {
      $('div[id^=div]').hide();
      $('#div1').show();
  });
  $('#showdiv2').click(function() {
      $('div[id^=div]').hide();
      $('#div2').show();
  });

});
</script>