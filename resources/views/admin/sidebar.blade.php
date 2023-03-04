<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin.css')}}">

  </head>
    <style>
  

 
    </style>
  <body>
    <div id="wrapper">
         <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        ADMIN
                    </a>
                </li>
                <li>
                    @if(request()->is('admin/product/*'))
                        <a  class="active" href="{{route('product-list')}}">Manage Products</a>
                    @else
                        <a href="{{route('product-list')}}">Manage Products</a>
                    @endif
                </li>
                <li>
                    @if(request()->is('admin/categories/*'))
                        <a  class="active" href="{{route('category-list')}}">Manage Categories</a>
                    @else
                        <a href="{{route('category-list')}}">Manage Categories</a>
                    @endif
                </li>
                <li>
                    @if(request()->is('admin/addons/*'))
                        <a  class="active" href="{{route('addon-list')}}">Manage Addons</a>
                    @else
                        <a  href="{{route('addon-list')}}">Manage Addons</a>
                    @endif
                </li>
                
            </ul>
        </div>
        <div>
            <a href="#menu-toggle" class="btn" id="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></a>
        </div>
<!-- /#sidebar-wrapper -->
        @yield('content')

    </div>
    <!-- /#wrapper -->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
        $("#menu-toggle").click(function(e) {
          e.preventDefault();
          $("#wrapper").toggleClass("toggled");
        });
    </script>
    @stack('child-scripts')
  </body>
</html>