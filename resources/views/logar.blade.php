<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cadastro de Usuários</title>
  <script src="https://cdn.tailwindcss.com"></script>
  {{-- @vite('resources/css/app.css') --}}
  {{--
  <link rel="stylesheet" href="{{ asset(" build/assets/css/style.css") }}"> --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<style>
  .oculto {
    display: none;
  }

  @media screen and (max-width:767px) {
    .div-pri {
      display: flex;
      flex-direction: column;
      justify-content: center;
      text-align: center;
    }
  }
</style>

<body class="bg-slate-200  ">
  <div class="div-pri flex lg:flex-row md:flex-col justify-center items-center mt-16 gap-10">
    <div class="" style="width: 28rem">
      <h1 class="text-6xl lg:text-left sm:text-center md:text-center font-bold text-blue-700" style="">Facebook</h1>
      <p class="lg:text-left  text-2xl sm:text-center text-black md:text-center">
        O Facebook ajuda-te a comunicar e a partilhar com as pessoas que fazem parte da tua vida
      </p>
    </div>

    <div class=" ">
      @if(session()->has("erro"))
      <div>
        <div id="sms" class="border border-red-700  h-10 z-10 rounded-md mb-3 items-center flex mx-auto justify-center">
          {{ session("erro") }}
        </div>
      </div>
      @endif

      <div class="form  items-center shadow-lg bg-white  rounded-md " style="width: 24rem; height: 23rem;">
        <form action="{{ route("logar") }}" method="POST"
          class="justify-center px-2   flex m-auto w-full my-auto flex-col items-center pt-2">
          @csrf

          <div class="flex items-center w-full h-14 border border-slate-400 rounded-lg mt-2     justify-between">
            <input type="email" class=" h-12 px-2 outline-none" name="email" placeholder="seu endereço de email"
              required style="width:90% ;">
            <i class="bi bi-at me-3 text-2xl"></i>
          </div>

          <div class=" w-full h-14 border border-slate-400 rounded-lg mt-2 mx-3 justify-between">
            <input type="password" class="h-12 px-2 outline-none password" name="password"
              placeholder="A sua senha aqui." required style="width:90% ;">
            <i class="bi bi-eye-slash me-3 cursor-pointer text-xl eye"></i>
            <i class="bi bi-eye me-3 cursor-pointer text-xl eyeHidden oculto"></i>


          </div>

          <button type="submit" id="btn_cadastrar"
            class="btn rounded-md text-white bg-blue-700 h-14 mt-2 text-xl font-bold "
            style="width: 100%">Entrar</button>
          <div class="flex justify-center mt-2 ">
            <a href="#" class="flex hover:text-slate-800">Não sabes a tua senha?</a>
          </div>
          <hr class="bg-black w-full mt-5">
          <div class="my-7">
            <button
              class="btnCadastrar px-6 w-36 py-3  rounded-lg text-white bg-green-600  font-bold text-lg cursor-pointer">Criar
              Conta</button>
          </div>
        </form>

      </div>

    </div>

  </div>
  
  <dialog class="dialog-cadastrar  h-full  rounded-lg shadow-lg overflow-scroll " style="width:400px ;">
    {{-- header para incrição --}}
    <div>
      <div class="flex justify-between px-2 items-center ">
        <div class="m-1">
          <h3 class="text-3xl font-bold">Registra-te</h3>
          <small>Crie a sua conta é rápido e fácil</small>
        </div>
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-6 h-6 font-bold text-2xl cursor-pointer text-slate-500 fechar">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </div>
        {{-- // header para incrição --}}
      </div>

      <hr class="w-full my-1 border border-slate-200">

      <form action="{{ route("insert") }}" method="post" enctype="multipart/form-data">
        {{-- prevenção contra ataques no formulário --}}
        @csrf
        <div>
          <div class="flex border border-stone-300 my-2 mx-2 h-10 rounded-md items-center ">
            <i class="bi bi-person text-xl mx-1 "></i>
            <input type="text" placeholder="Nome completo" name="name" class="outline-none w-80" required>
            <i class="bi bi-exclamation-circle text-xl mx-1 text-red-700 oculto"></i>
            <i class="bi bi-check-lg text-xl mx-1 text-green-700 "></i>
          </div>
          <div class="flex border border-stone-300 my-2 mx-2 h-10 rounded-md items-center ">
            {{-- icon para o @ do email --}}
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-6 h-6 text-xl mx-1">
              <path stroke-linecap="round"
                d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
            </svg>
            <input type="email" placeholder="Email address" name="email" class="outline-none w-80" required>
            <i class="bi bi-exclamation-circle text-xl mx-1 text-red-700 oculto"></i>
            <i class="bi bi-check-lg text-xl mx-1 text-green-700"></i>
          </div>
          <div class="flex border border-stone-300 my-2 mx-2 h-10 rounded-md items-center ">
            {{-- icon para senha --}}
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-6 h-6 text-xl mx-1">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
            </svg>
            {{-- //icon para senha --}}
            <input type="password" placeholder="Digite a sua senha" name="senha" class="outline-none w-80" required>
            <i class="bi bi-exclamation-circle text-xl mx-1 oculto  text-red-700"></i>
            <i class="bi bi-check-lg text-xl mx-1 text-green-700"></i>
          </div>

          <div class="flex border border-stone-300 my-2 mx-2 h-10 rounded-md items-center ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-6 h-6 text-xl mx-1">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
            </svg>
            <input type="password" placeholder="Digite a sua senha" name="password" class="outline-none w-80" required>
            <i class="bi bi-exclamation-circle text-xl mx-1 text-red-700 oculto"></i>
            <i class="bi bi-check-lg text-xl mx-1 text-green-700"></i>
          </div>

          <div class="border-stone-300 my-2 mx-2 h-10 rounded-md items-center ">
            <label for="data" class="text-slate-700 ">Sexo</label>
            <div>
              <select name="sexo" class="border border-stone-300 mb-2 h-10 rounded-md items-center w-full">
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
              </select>
            </div>
          </div>
        

          <div class="border-stone-300 mt-8 mx-2 h-10 rounded-md items-center">
            <label for="data" class="text-slate-700 ">Data de nascimento</label>
            <div class="">
              <input type="date" id="data" name="data_nasc"
                class="border w-full rounded-lg px-3 py-2 text-gray-700 focus:outline-none focus:ring focus:border-blue-300">
            </div>
          </div>

          <div>
            <input type="file" name="image" class="hidden w-full">
          </div>

          <div class="mt-7 mx-2">
            <p class="text-start mb-3 text-slate-700" style="font-size: 12px">As pessoas que usam o nosso serviço podem
              ter carregado as tuas informações de contacto para o Facebook. Saber mais.</p>
            <p class="text-sm mt-3 text-slate-700 text-start" style="font-size: 12px">Ao clicar em Regista-te, estás a
              aceitar os nossos Termos, a nossa Política de Privacidade e a nossa Política de Cookies. Poderás receber
              notificações nossas por SMS e podes cancelá-las a qualquer altura.</p>
          </div>
     
          <div class="flex justify-center">
            <div
              class="mt-3 bg-green-700 w-40 h-10 rounded-lg text-white items-center flex justify-center text-xl font-bold ">
              <button type="submit" name="cadastrar">Cadastrar</button>

            </div>
          </div>


        </div>

      </form>

    </div>


  </dialog>

</body>
<script src="{{ asset("build/assets/javaScript/js.js") }}"></script>
<script>
  let eye = document.querySelector(".eye");
  let eyeHidden = document.querySelector(".eyeHidden");
  let password = document.querySelector(".password");
    // criando o input visível
  eye.onclick = () =>{
    eye.classList.add("oculto");
    eyeHidden.classList.remove("oculto");
    if(password.type == "password"){
       password.type ="text";      
    }
  } 
  // criando o input oculto
  eyeHidden.onclick = () =>{
    eyeHidden.classList.add("oculto");
    eye.classList.remove("oculto");
    if(password.type == "text"){
       password.type ="password";      
    }
  } 
  
 //dialog
 let dialog = document.querySelector(".dialog-cadastrar");
 let btnCadastrar = document.querySelector(".btnCadastrar");
 let body = document.querySelector("body");
 let close = document.querySelector(".fechar");
 

 btnCadastrar.onclick = ()=>{
  dialog.showModal();

  
 } 
  

 close.onclick = () =>{
  // if(dialog == event.target){
  dialog.close();   
  // }
 
 }
</script>

</html>