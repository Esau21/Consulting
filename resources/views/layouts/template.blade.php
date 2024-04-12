<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0-1/css/all.min.css"
    integrity="sha512-xEGx3E22YcUzfX525T3KV7SqNexb09E2CckB6lBB/dT930VlbSX9JnQlLiogtSLAl9yGAJGKDu7O1ZanrqljGg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>@yield('title', 'Sistema puntoConsulting')</title>
</head>

<body>

  @include('layouts.partials.nav')

  @yield('content')


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

  @stack('scripts')

  <script>
    $(document).ready(function(){
        console.log('Jquery cargando');
      });
  </script>


</body>

</html>