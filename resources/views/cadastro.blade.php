<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Usuários</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset("build/assets/css/style.css") }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<style>
  
</style>
<body class="bg-slate-100 ">
    <div class="corpo mt-20 flex-wrap flex flex-row sm:flex-col md:flex-col lg:flex-row mx-10 gap-10 lg:mt-20">
        <div class="text-white sm:w-4/5 md:w-4/5" style="width: 28rem">
            <h1 class="text-5xl lg:text-left  sm:text-center md:text-center font-bold" style="">Morphoses</h1>
            <p class="lg:text-left  text-2xl sm:text-center md:text-center">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                 Tempora dignissimos magni accusantium quibusdam earum, eos
                
            </p>
        </div>

        

      <div class=" ">
        @if(session()->has("erro"))
        <div>
         <div id="sms" class="bg-white h-10 rounded-md mb-3 items-center flex mx-auto justify-center">
          {{ session("erro") }}
         </div>
        </div>
        @endif

        <div class="form sm:w-96 md:w-96 shadow-lg bg-white rounded-md ">
        <form action="{{ route("insert") }}" method="POST" class="justify-center flex w-full flex-col items-center" enctype="multipart/form-data">
         @csrf
          <div class="mt-8 border-2 rounded-md div_input mb-3 flex items-center justify-between">
            <input type="text" class="input" name="name" class="outline-none" required autofocus placeholder="Nome Completo" style="outline: none;">  
            <i class="bi bi-person-fill me-3 "></i>
          </div>
          {{-- <span class="text-ellipsis float-right  mb-3 flex">erro</span> --}}

          <div class=" border-2 rounded-md div_input mb-3 flex items-center justify-between">
            <input type="email" class="input" name="email" placeholder="seu endereço de email" required>
            <i class="bi bi-envelope-at-fill me-3"></i>
          </div> 

          <div class=" border-2 rounded-md div_input mb-3 flex items-center justify-between">
            <input type="password" id="senha1" name="senha" class="input" placeholder="crie uma senha" required>
            <i class="bi bi-lock-fill me-3"></i>
          </div>
          <div class=" border-2 rounded-md div_input mb-3 flex items-center justify-between">
            <input type="password"  id="senha2" class="input" name="password" placeholder="confirme a senha" required>
            <i class="bi bi-shield-lock-fill me-3"></i>
          </div>
        
          <button type="submit" id="btn_cadastrar" class="btn rounded-md text-white bg-slate-600" style="width: 90%;">Cadastrar</button>
        </form>     
        </div>
          
       </div>
    
    </div>
    
</body>
<script src="{{ asset("build/assets/javaScript/js.js") }}"></script>
</html>