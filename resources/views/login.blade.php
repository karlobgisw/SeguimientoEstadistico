<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
  <header>
    @include('navLogin')
  </header>
  <div class="center">
    <form method="post" action="{{ route('login') }}" id="form1">
      @csrf
        <input type="hidden" name="sir" value="useradmin" required>
        <input type="hidden" name="password" value="admin.remax.victoria_001!" required>
      <input type="submit" value="Administrador">              
    </form>
    <form method="post" action="{{ route('login') }}" id="form2">
      @csrf
        <input type="hidden" name="sir" value="useruno" required>
        <input type="hidden" name="password" value="remax.victoria_001!" required>
      <input type="submit" value="Usuario">                
    </form>
  </div>
@if ($errors->any())
<div id="mi-toast" class="toast align-items-center text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">
      @foreach ($errors->all() as $error)
      -{{ $error }}
      <br>
      @endforeach
    </div>
    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>
@endif
@if (session('error'))
<div id="mi-toast" class="toast align-items-center text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">
      {{ session('error') }}
    </div>
    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>
@endif
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
  <script>
    var miToast = document.getElementById("mi-toast");
    var toast = new bootstrap.Toast(miToast);
    toast.show();
  </script>
</body>

</html>
