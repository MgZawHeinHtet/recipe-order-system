<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  @vite('resources/css/app.css')
</head>
<body class="overflow-x-hidden">
  
    {{-- nav bar  --}}
    <x-header></x-header>

        {{ $slot }}


    {{-- footer  --}}
    <x-footer></x-footer>
    
    <script>
     
      const inputCount = document.getElementById('quantity_count');
      const total = document.getElementById('show_total');
      const price = document.getElementById('product_price');

      inputCount.addEventListener('change', function(){
        total.innerText = '$' + Number.parseFloat(inputCount.value*(price.innerText)).toFixed(2) ;
      })

    
    </script>
</body>
</html>