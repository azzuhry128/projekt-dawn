

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
  @livewireStyles
<body class="h-screen">
    {{ $slot }}

    <script>
      window.addEventListener('registAlert', event => {
        console.log("registration button pressed !")
      });

      window.addEventListener('registAlert', event => {
        swal({
          text: "hello there !",
          content: true,
          className: "w-72",
          button: {
            text: "hey ho !",
            className: "bg-emerald-200"
          }
        });
      });
    </script>
    @livewireScripts

</body>
</html>
