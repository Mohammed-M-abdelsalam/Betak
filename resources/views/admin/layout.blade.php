<!DOCTYPE html>
<html lang="{{__("message.lang")}}}" dir="{{__("message.dir")}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>table</title>

     <link href="img/Betak.jpg"class="rounded-3"  rel="icon">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
     <link href="{{asset("admin/assets")}}/lib/animate/animate.min.css" rel="stylesheet">
     <link href="{{asset("admin/assets")}}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("admin/assets")}}/CSS/bootstrap.min.css" />
<link rel="stylesheet" href="{{asset("admin/assets")}}/CSS/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body >

@include('admin.nav')
@include('errors')
@yield('body')



<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset("admin/assets")}}/lib/wow/wow.min.js"></script>
<script src="{{asset("admin/assets")}}/lib/easing/easing.min.js"></script>
<script src="{{asset("admin/assets")}}/lib/waypoints/waypoints.min.js"></script>
<script src="{{asset("admin/assets")}}/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="{{asset("admin/assets")}}/js/main.js"></script>
</body>
</html>
