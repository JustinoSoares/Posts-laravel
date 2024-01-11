<!DOCTYPE html>
<html lang="en">

<style>
    *{
        margin: 0px;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

   
        <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
    <title>Início site de posts</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.css" integrity="sha512-0Nyh7Nf4sn+T48aTb6VFkhJe0FzzcOlqqZMahy/rhZ8Ii5Q9ZXG/1CbunUuEbfgxqsQfWXjnErKZosDSHVKQhQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css" integrity="sha512-vEia6TQGr3FqC6h55/NdU3QSM5XR6HSl5fW71QTKrgeER98LIMGwymBVM867C1XHIkYD9nMTfWK2A0xcodKHNA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
</head>
<style>
    h1{
        display: flex;
        justify-content: center;
    }
    textarea{
        position: absolute;
    }
    .container{
        width: 600px;
        position: absolute;
        /* height: 300px; */
     
        margin: 50px auto ;
    }
    .div{
        overflow: scroll;
        width: 600px;
        z-index: -100;
    }
  
</style>

<body>
    <h1>Emoji</h1>


{{-- <div class="div">
     <div class="container">
        <textarea id="myText" cols="30" rows="10"></textarea>
    </div>
</div> --}}

<h1>segundo</h1>

<textarea id="emojionearea"></textarea>
<button id="emoji-button">Selecionar Emoji</button>
<div id="emoji-container"></div>


<script>
    $(document).ready(function() {
  // Inicialize o EmojioneArea no campo de entrada
  $("#emojionearea").emojioneArea({
    // Configure a posição do seletor de emojis
    pickerPosition: "bottom",
   

  });

  // Mova o quadro com emojis para o contêiner separado
  $(".emojionearea-picker").detach().appendTo("#emoji-container");

  // Esconda o quadro de emojis inicialmente
  $(".emojionearea-picker").hide();

  // Ação para mostrar/ocultar o quadro de emojis quando o botão for clicado
  $("#emoji-button").click(function() {
    $(".emojionearea-picker").toggle();
  });
});

</script>
   


    <script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js" integrity="sha512-hkvXFLlESjeYENO4CNi69z3A1puvONQV5Uh+G4TUDayZxSLyic5Kba9hhuiNLbHqdnKNMk2PxXKm0v7KDnWkYA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
<script>

$("#myText").emojioneArea();

</script>






</html>

