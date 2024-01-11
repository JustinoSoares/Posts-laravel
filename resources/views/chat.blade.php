<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- @vite('resources/css/app.css') --}}

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    {{-- link para emoji o emoji no css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.css"
        integrity="sha512-0Nyh7Nf4sn+T48aTb6VFkhJe0FzzcOlqqZMahy/rhZ8Ii5Q9ZXG/1CbunUuEbfgxqsQfWXjnErKZosDSHVKQhQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- //jquery --}}
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous">
    </script>

    <title>Facebook Chat</title>
</head>

<body>
    <header class="flex justify-between  top-0 px-3 items-center py-3 fixed w-full z-10 bg-white shadow-lg">
        <div class="flex gap-3 items-center">
            <figure>
                <img src="{{ asset('build/assets/img/Sem título.png') }}" style="width: 45px;height: 45px;"
                    class="shadow-sm" alt="icon" title="Facebook">
            </figure>
            <a
                class="w-10 cursor-pointer flex gap-2 bg-slate-200 p-1 h-10 rounded-full items-center justify-center text-bold ">
                <i class="bi bi-search " id="pesquisa"></i>

            </a>
        </div>
        {{-- icons do header --}}
        <div class="flex gap-14 justify-between" style="width: 30rem">
            <a href="{{ route("inicio_name") }}">
                <span class="x1n2onr6">
                    <svg viewBox="0 0 28 28" class="x1lliihq x1k90msu x2h7rmj x1qfuztq x5e5rjt" fill="currentColor"
                        height="28" width="28">
                        <path
                            d="M25.825 12.29C25.824 12.289 25.823 12.288 25.821 12.286L15.027 2.937C14.752 2.675 14.392 2.527 13.989 2.521 13.608 2.527 13.248 2.675 13.001 2.912L2.175 12.29C1.756 12.658 1.629 13.245 1.868 13.759 2.079 14.215 2.567 14.479 3.069 14.479L5 14.479 5 23.729C5 24.695 5.784 25.479 6.75 25.479L11 25.479C11.552 25.479 12 25.031 12 24.479L12 18.309C12 18.126 12.148 17.979 12.33 17.979L15.67 17.979C15.852 17.979 16 18.126 16 18.309L16 24.479C16 25.031 16.448 25.479 17 25.479L21.25 25.479C22.217 25.479 23 24.695 23 23.729L23 14.479 24.931 14.479C25.433 14.479 25.921 14.215 26.132 13.759 26.371 13.245 26.244 12.658 25.825 12.29">
                        </path>
                    </svg>
                    <span class="x10l6tqk x11f4b5y x1v4kod4">
            </a>
            <div>
                {{-- <i class="bi bi-person-fill text-2xl" title="perfil"></i> --}}
                <svg viewBox="0 0 28 28" class="x1lliihq x1k90msu x2h7rmj x1qfuztq x5e5rjt" fill="currentColor"
                    height="28" width="28">
                    <path
                        d="M8.75 25.25C8.336 25.25 8 24.914 8 24.5 8 24.086 8.336 23.75 8.75 23.75L19.25 23.75C19.664 23.75 20 24.086 20 24.5 20 24.914 19.664 25.25 19.25 25.25L8.75 25.25ZM17.163 12.846 12.055 15.923C11.591 16.202 11 15.869 11 15.327L11 9.172C11 8.631 11.591 8.297 12.055 8.576L17.163 11.654C17.612 11.924 17.612 12.575 17.163 12.846ZM21.75 20.25C22.992 20.25 24 19.242 24 18L24 6.5C24 5.258 22.992 4.25 21.75 4.25L6.25 4.25C5.008 4.25 4 5.258 4 6.5L4 18C4 19.242 5.008 20.25 6.25 20.25L21.75 20.25ZM21.75 21.75 6.25 21.75C4.179 21.75 2.5 20.071 2.5 18L2.5 6.5C2.5 4.429 4.179 2.75 6.25 2.75L21.75 2.75C23.821 2.75 25.5 4.429 25.5 6.5L25.5 18C25.5 20.071 23.821 21.75 21.75 21.75Z">
                    </path>
                </svg>
            </div>
            <div>
                {{-- <i class="bi bi-camera-reels-fill text-2xl" title="videos"></i> --}}
                <span class="x1n2onr6">
                    <svg viewBox="0 0 28 28" class="x1lliihq x1k90msu x2h7rmj x1qfuztq xcza8v6" fill="currentColor"
                        height="28" width="28">
                        <path
                            d="M17.5 23.75 21.75 23.75C22.164 23.75 22.5 23.414 22.5 23L22.5 14 22.531 14C22.364 13.917 22.206 13.815 22.061 13.694L21.66 13.359C21.567 13.283 21.433 13.283 21.34 13.36L21.176 13.497C20.591 13.983 19.855 14.25 19.095 14.25L18.869 14.25C18.114 14.25 17.382 13.987 16.8 13.506L16.616 13.354C16.523 13.278 16.39 13.278 16.298 13.354L16.113 13.507C15.53 13.987 14.798 14.25 14.044 14.25L13.907 14.25C13.162 14.25 12.439 13.994 11.861 13.525L11.645 13.35C11.552 13.275 11.419 13.276 11.328 13.352L11.155 13.497C10.57 13.984 9.834 14.25 9.074 14.25L8.896 14.25C8.143 14.25 7.414 13.989 6.832 13.511L6.638 13.351C6.545 13.275 6.413 13.275 6.32 13.351L5.849 13.739C5.726 13.84 5.592 13.928 5.452 14L5.5 14 5.5 23C5.5 23.414 5.836 23.75 6.25 23.75L10.5 23.75 10.5 17.5C10.5 16.81 11.06 16.25 11.75 16.25L16.25 16.25C16.94 16.25 17.5 16.81 17.5 17.5L17.5 23.75ZM3.673 8.75 24.327 8.75C24.3 8.66 24.271 8.571 24.238 8.483L23.087 5.355C22.823 4.688 22.178 4.25 21.461 4.25L6.54 4.25C5.822 4.25 5.177 4.688 4.919 5.338L3.762 8.483C3.729 8.571 3.7 8.66 3.673 8.75ZM24.5 10.25 3.5 10.25 3.5 12C3.5 12.414 3.836 12.75 4.25 12.75L4.421 12.75C4.595 12.75 4.763 12.69 4.897 12.58L5.368 12.193C6.013 11.662 6.945 11.662 7.59 12.193L7.784 12.352C8.097 12.609 8.49 12.75 8.896 12.75L9.074 12.75C9.483 12.75 9.88 12.607 10.194 12.345L10.368 12.2C11.01 11.665 11.941 11.659 12.589 12.185L12.805 12.359C13.117 12.612 13.506 12.75 13.907 12.75L14.044 12.75C14.45 12.75 14.844 12.608 15.158 12.35L15.343 12.197C15.989 11.663 16.924 11.663 17.571 12.197L17.755 12.35C18.068 12.608 18.462 12.75 18.869 12.75L19.095 12.75C19.504 12.75 19.901 12.606 20.216 12.344L20.38 12.208C21.028 11.666 21.972 11.666 22.62 12.207L23.022 12.542C23.183 12.676 23.387 12.75 23.598 12.75 24.097 12.75 24.5 12.347 24.5 11.85L24.5 10.25ZM24 14.217 24 23C24 24.243 22.993 25.25 21.75 25.25L6.25 25.25C5.007 25.25 4 24.243 4 23L4 14.236C2.875 14.112 2 13.158 2 12L2 9.951C2 9.272 2.12 8.6 2.354 7.964L3.518 4.802C4.01 3.563 5.207 2.75 6.54 2.75L21.461 2.75C22.793 2.75 23.99 3.563 24.488 4.819L25.646 7.964C25.88 8.6 26 9.272 26 9.951L26 11.85C26 13.039 25.135 14.026 24 14.217ZM16 23.75 16 17.75 12 17.75 12 23.75 16 23.75Z">
                        </path>
                    </svg><span class="x10l6tqk x11f4b5y x1v4kod4"></span></span>
                <div class="x1o1ewxj x3x9cwd x1e5q0jg x13rtm0m x1ey2m1c xds687c xg01cxk x47corl x10l6tqk x17qophe x13vifvy x1ebt8du x19991ni x1dhq9h x1wpzbip"
                    data-visualcompletion="ignore" style="border-radius: 8px; inset: 4px 0px;"></div>
            </div>
            <div>
                {{-- <i class="bi bi-shop text-2xl" title="Marketplace"></i> --}}
                <svg viewBox="0 0 28 28" class="x1lliihq x1k90msu x2h7rmj x1qfuztq x5e5rjt" fill="currentColor"
                    height="28" width="28">
                    <path
                        d="M25.5 14C25.5 7.649 20.351 2.5 14 2.5 7.649 2.5 2.5 7.649 2.5 14 2.5 20.351 7.649 25.5 14 25.5 20.351 25.5 25.5 20.351 25.5 14ZM27 14C27 21.18 21.18 27 14 27 6.82 27 1 21.18 1 14 1 6.82 6.82 1 14 1 21.18 1 27 6.82 27 14ZM7.479 14 7.631 14C7.933 14 8.102 14.338 7.934 14.591 7.334 15.491 6.983 16.568 6.983 17.724L6.983 18.221C6.983 18.342 6.99 18.461 7.004 18.578 7.03 18.802 6.862 19 6.637 19L6.123 19C5.228 19 4.5 18.25 4.5 17.327 4.5 15.492 5.727 14 7.479 14ZM20.521 14C22.274 14 23.5 15.492 23.5 17.327 23.5 18.25 22.772 19 21.878 19L21.364 19C21.139 19 20.97 18.802 20.997 18.578 21.01 18.461 21.017 18.342 21.017 18.221L21.017 17.724C21.017 16.568 20.667 15.491 20.067 14.591 19.899 14.338 20.067 14 20.369 14L20.521 14ZM8.25 13C7.147 13 6.25 11.991 6.25 10.75 6.25 9.384 7.035 8.5 8.25 8.5 9.465 8.5 10.25 9.384 10.25 10.75 10.25 11.991 9.353 13 8.25 13ZM19.75 13C18.647 13 17.75 11.991 17.75 10.75 17.75 9.384 18.535 8.5 19.75 8.5 20.965 8.5 21.75 9.384 21.75 10.75 21.75 11.991 20.853 13 19.75 13ZM15.172 13.5C17.558 13.5 19.5 15.395 19.5 17.724L19.5 18.221C19.5 19.202 18.683 20 17.677 20L10.323 20C9.317 20 8.5 19.202 8.5 18.221L8.5 17.724C8.5 15.395 10.441 13.5 12.828 13.5L15.172 13.5ZM16.75 9C16.75 10.655 15.517 12 14 12 12.484 12 11.25 10.655 11.25 9 11.25 7.15 12.304 6 14 6 15.697 6 16.75 7.15 16.75 9Z">
                    </path>
                </svg>
            </div>
            <div>
                <i class="bi bi-controller text-2xl" title="Jogos"></i>
            </div>
        </div>
        {{-- //icons do header --}}
        <div class="flex gap-2">
            <div class="w-10 h-10 rounded-full bg-slate-200 flex items-center justify-center">
                <i class="bi bi-grid-3x3-gap-fill"></i>
            </div>
            <div class="w-10 h-10 rounded-full bg-slate-200 flex items-center justify-center">
                <i class="bi bi-bell-fill" title="notificações"></i>
            </div>
            <div class="w-10 h-10  rounded-full bg-slate-200 flex items-center justify-center cursor-pointer imgPerfil">
                <img src="{{ asset($user_auth->profile_photo_path) }}" alt="" title="Foto de perfil"
                    class="w-full h-full rounded-full imagePerfil" alt="" title="Conta">
            </div>

        </div>

    </header>
    {{-- dialog para a imagem no final --}}

    <div class="dialogPerfil fixed right-0 bg-white top-16 mx-4 my-2 rounded-md py-2 px-3 shadow-lg"
        style="height:28rem; width:25rem ; display: none">

        <div class="flex gap-2 cursor-pointer shadow-md p-3 w-full">
            <div class="w-full">
                <a href="{{ route("perfil_name") }}"
                    class="flex items-center gap-2 hover:bg-slate-200  px-2 py-1.5 rounded-md">
                    <div class="w-10 h-10 rounded-full  bg-orange-400-700 flex items-center justify-center">
                        <img src="" class="w-full h-full rounded-full" alt="" title="Conta">
                    </div>
                    <h2 class="text-lg font.bold"></h2>
                </a>
                <hr class="my-3">
                <div class="flex justify-between w-full">
                    <a href="">Ver outros perfis</a>
                    <span
                        class="h-6 w-6 rounded-full bg-red-700 text-white font-bold flex justify-center text-sm items-center">2</span>
                </div>
            </div>
        </div>
        {{-- div para configurações --}}
        <div class="mt-3">
            <div class="flex justify-between px-3 items-center hover:bg-slate-100 rounded-md p-1 cursor-pointer">
                <div class="flex gap-2 items-center">
                    <span class="w-10 h-10 rounded-full items-center justify-center flex bg-slate-200">
                        <i class="bi bi-gear-fill"></i>
                    </span>
                    <p>
                        Definições e privacidade
                    </p>
                </div>
                <i class="bi bi-chevron-right font-bold text-2xl"></i>
            </div>
        </div>
        {{-- div para configurações --}}
        <div>
            <div class="flex justify-between px-3 items-center hover:bg-slate-100 rounded-md p-1 cursor-pointer">
                <div class="flex gap-2 items-center">
                    <span class="w-10 h-10 rounded-full items-center justify-center flex bg-slate-200">
                        <i class="bi bi-question-circle-fill"></i>
                    </span>
                    <p>
                        Ajuda e suporte
                    </p>
                </div>
                <i class="bi bi-chevron-right font-bold text-2xl"></i>
            </div>
        </div>
        {{-- div para configurações --}}
        <div>
            <div class="flex justify-between px-3 items-center hover:bg-slate-100 rounded-md p-1 cursor-pointer">
                <div class="flex gap-2 items-center">
                    <span class="w-10 h-10 rounded-full items-center justify-center flex bg-slate-200">
                        <i class="bi bi-moon-fill"></i>
                    </span>
                    <p>
                        Ecrã e acessibilidade
                    </p>
                </div>
                <i class="bi bi-chevron-right font-bold text-2xl"></i>
            </div>
        </div>
        {{-- div para configurações --}}
        <div>
            <div class="flex justify-between px-3 items-center hover:bg-slate-100 rounded-md p-1 cursor-pointer">
                <div class="flex gap-2 items-center">
                    <span class="w-10 h-10 rounded-full items-center justify-center flex bg-slate-200">
                        <i class="bi bi-chat-left-fill"></i>
                    </span>
                    <p>
                        Enviar FeedBack
                    </p>
                </div>
                {{-- <i class="bi bi-chevron-right font-bold text-2xl"></i> --}}
            </div>
        </div>
        {{-- div para configurações --}}
        <a href="{{ route("terminarSessao_name") }}"
            onclick="event.preventDefault(); document.getElementById('formLogout').submit()">
            <div class="flex justify-between px-3 items-center hover:bg-slate-100 rounded-md p-1 cursor-pointer">
                <div class="flex gap-2 items-center">
                    <span class="w-10 h-10 rounded-full items-center justify-center flex bg-slate-200">
                        <i class="bi bi-door-open-fill"></i>
                    </span>
                    <p>
                        Terminar Sessão
                    </p>
                </div>
                {{-- <i class="bi bi-chevron-right font-bold text-2xl"></i> --}}
                <form action="{{ route("terminarSessao_name") }}" method="post" id="formLogout">
                    @csrf
                </form>
            </div>
        </a>
        <div class="mx-4">

            <a href="#privacidade" class="text-sm hover:underline text-slate-600">Privacidade</a>
            <a href="#Termos" class="text-sm hover:underline text-slate-600">Termos</a>
            <a href="Publicidade" class="text-sm hover:underline text-slate-600">Publicidade</a>
            <a href="#AdChoice" class="text-sm hover:underline text-slate-600">AdChoice</a>
            <a href="#Cookies" class="text-sm hover:underline text-slate-600">Cookies</a>
            <a href="#Mias" class="text-sm hover:underline text-slate-600">Mais</a>
            <small>Meta &copy; 2023</small>

        </div>





    </div> {{--fecha o dialog--}}

    {{-- dialog da pesquisa --}}
    <dialog id="dialogPesquisa" class="rounded-lg bg-blend-darken h-96" style="width: 45rem;">

        <div class=" py-5 px-3 z-10  justify-between  flex border-black sticky top-0 bg-slate-100">
            <div style="width: 90%">
                <i class="bi bi-search font-bold text-blue-700 text-2xl "></i>
                <span class="text-2xl">|</span>
                <input type="search" placeholder="Pesquisa no Facebook" id="pesquisaInput"
                    class="h-10 lg:w-96 bg-slate-100 outline-none">
            </div>
            <div class="w-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-2xl fechar cursor-pointer" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>

            </div>

        </div>
        {{-- Ocorre quando foi encontrado um Usuário --}}
        <div class="mt-2  relative ms-5">
            <a href="#" class="flex items-center gap-2 showUsers oculto">
                <div class="w-12 h-12 bg-red-700 rounded-full"></div>
                <div>
                    <span class="flex flex-col">Nome do usuario</span>
                    <small>descrition</small>
                </div>
            </a>
        </div>
        {{-- Informação da pesquisa, ocorre quando não tem nada no input --}}
        <div class="flex justify-center gap-2 animate-pulse items-center my-auto message1" style="line-height: 15rem">
            <p class="flex ">Nem uma pesquisa feita</p>
            <i class="bi bi-subtract"></i>
        </div>
        {{-- Informação da pesquisa, nem uma user encontrado --}}
        <div class="flex justify-center gap-2 animate-pulse items-center my-auto message2 oculto"
            style="line-height: 15rem">
            <p class="flex ">Nem um usuário encontrado</p>
            <i class="bi bi-subtract"></i>
        </div>

    </dialog>
    {{-- dialog da pesquisa --}}

    <main class="bg-white flex fixed h-full w-full">
        <section class="h-[100vh] max-w-[30rem] bg-white" style="border-right:.5px solid rgba(177, 176, 176, 0.562) ;">
            <header class="h-[35%]">
                <div class=" w-[23rem] bg-white py-5 h-[100%]  justify-between px-2 pt-20 ">
                    <div class="flex justify-between">
                        <h1 class="text-3xl font-bold ">Conversas</h1>
                        
                        {{-- @foreach ($res  as $r )
                            {{   $r->id }}
                        @endforeach --}}
                        <div class="flex gap-1">
                            <div
                                class="h-8 w-8 cursor-pointer rounded-full bg-slate-200 flex justify-center items-center text-xl">
                                <i class="bi bi-three-dots"></i>
                            </div>
                            <div
                                class="h-8 w-8 cursor-pointer rounded-full bg-slate-200 flex justify-center items-center text-xl">
                                <i data-visualcompletion="css-img" class="x1b0d499 xep6ejk"
                                    style="background-image: url(&quot;https://static.xx.fbcdn.net/rsrc.php/v3/yP/r/0W3ubbJjVbL.png?_nc_eui2=AeFUjjH9U5HYMvgoM95ZzvP8FIGme_shdXoUgaZ7-yF1ejgEJ8lLIEFinEQU0xZVocOjRh5TrqFmzHk3lyn9E9U7&quot;); background-position: 0px -357px; background-size: auto; width: 20px; height: 20px; background-repeat: no-repeat; display: inline-block;"></i>
                                <div class="x1ey2m1c xds687c xg01cxk x47corl x10l6tqk x17qophe x13vifvy x1ebt8du x19991ni x1dhq9h x1wpzbip x14yjl9h xudhj91 x18nykt9 xww2gxu"
                                    data-visualcompletion="ignore"></div>
                            </div>

                        </div>

                    </div>
                    <div class="flex bg-slate-200 w-full rounded-full h-8 items-center my-2 px-2">
                        <i class="bi bi-search text-xl font-bold"></i>
                        <input type="text" class="w-full outline-none ms-2 bg-slate-200" placeholder="Pesquisa...">
                    </div>
                    <div class="flex gap-2 ">
                        <span
                            class="flex h-10 p-2 rounded-full w-[50%] bg-cyan-100 hover:bg-slate-300 font-bold cursor-pointer text-blue-700 items-center justify-center">Caixa
                            de entrada</span>
                        <span
                            class="flex h-10 p-2 rounded-full w-[50%] hover:bg-slate-300 font-bold cursor-pointer items-center justify-center">Comunidade</span>
                    </div>

                   
                </div>
            </header>
            @if(isset($conversas))
            <div class=" relative shadow-inner h-[65%] overflow-y-scroll px-2">
                {{-- div repetida --}}
                @foreach ( $participantes  as $participante)
                    {{-- @if($conversa->tipo === 'grupo')
                    <a href="{{ route("grupo.show",["grupo_id"=>$conversa->id]) }}" 
                        class="flex items-center my-1 py-2 gap-2 cursor-pointer hover:bg-slate-100 rounded-md ">
                        <div class="h-10 w-10 rounded-full bg-slate-200">
                            <img src="{{ asset($conversa->imagem) }}" alt=""
                                class="h-full w-full rounded-full">
                        </div>
                        <div>
                            <p class="text-lg font-semibold">{{$conversa->nome_conversa}} </p>
                            <small>mengem</small>
                        </div>
                    </a>
                    @else--}}
                    {{-- @if($conversa->tipo === 'privada')  --}}

                    {{-- @php
                        $participante = $conversa->participantes()->where("user_id","!=",$user_auth_id)->first();
                    @endphp --}}
                 {{-- Verificar se esse user ter participante --}}
                    {{-- @if($participante) --}}
                         <a href="{{ route("privada.show",["user_id"=>$participante->user_id]) }}" 
                            class="flex items-center my-1 py-2 gap-2 cursor-pointer hover:bg-slate-100 rounded-md ">
                            <div class="h-10 w-10 rounded-full bg-slate-200">
                                <img src="{{ asset($participante->user->profile_photo_path) }}" alt=""
                                    class="h-full w-full rounded-full">
                            </div>
                            <div>
                                <p class="text-lg font-semibold">{{$participante->user->name}} </p>
                                <small> mensagem</small>
                            </div>
                        </a>
                    {{-- @endif --}}
                    {{-- @endif --}}


                @endforeach
               
    
            
                {{-- div repetida --}}
            </div>
            @endif

           
        
        </section>


        @if(isset($user_recebe))
        <section class="text-white pt-16" style="width: calc(100%);">
            <header class="flex justify-between  px-1 " 
                style="border-bottom:.5px solid rgba(177, 176, 176, 0.562) ;">
                <a href="{{ route("outro_perfil",["id"=>$user_recebe->id]) }}" class="hover:bg-slate-100 h-full py-1 px-2">
                 <div class="flex items-center  py-2 gap-2 cursor-pointer  rounded-md ">
                    <div class="h-10 w-10 rounded-full bg-slate-200">
                        <img src="{{ asset($user_recebe->profile_photo_path) }}" alt=""
                            class="h-full w-full rounded-full">
                    </div>
                    <p class="text-xl font-bold text-black">{{ $user_recebe->name }}</p>

                </div>    
                </a>
               
                <div class="flex items-center gap-4">
                    <i class="bi bi-telephone-fill text-2xl cursor-pointer text-slate-600"></i>
                    <i class="bi bi-camera-video-fill text-2xl cursor-pointe text-slate-600"></i>
                    <i class="bi bi-exclamation-circle-fill text-2xl cursor-pointer text-slate-600"></i>
                </div>
            </header>
         
            {{-- onde vai ficar as mensagens --}}
        <div class=" w-full h-[30rem]  shadow-inner  overflow-y-scroll mx-2" >
                 @if(isset($sms)) 
                 @foreach ( $sms as $mensagem)
                {{-- Mensagem recebida --}}
                @if($mensagem->user_id !=  $user_auth_id)
                <div class="flex justify-start me-5">
                    <p class="flex flex-col bg-slate-200  text-justify  text-black justify-center  max-w-md p-2 my-1  rounded-md">
                        {!! $mensagem->conteudo !!}    
                        <small class="flex justify-end text-slate-700">{!! $mensagem->created_at->format("H:i") !!}</small>
                    <p>
               
                </div>
                @else
                   {{-- Mensagem enviada --}}
                <div class="flex justify-end me-5 my-1">
                    <p class="flex flex-col bg-blue-700 text-justify  justify-center max-w-md relative p-2 rounded-md my1">
                        {!! $mensagem->conteudo !!}
                        <small class="flex justify-end">123</small>
                    </p>
                </div>
                {{-- // Mensagem enviada --}}
                @endif
             
               
             
             
                 @endforeach 
                 @endif  
            </div>
            {{-- //onde vai ficar as mensagens --}}      
          
          
            <form action="/mensagem/{{ $user_recebe->id }}" method="post" enctype="multipart/form-data" class="fixed bottom-1 " style="width: calc(100vw - 24rem)">
                @csrf
                <div class="flex gap-1 ">
                <i class="bi bi-plus-circle-fill text-xl  text-blue-700"></i>
                <i class="bi bi-file-earmark-image text-xl text-blue-700"></i>
                <i class="bi bi-mic-fill text-blue-700 text-2xl"></i>
                <i class="bi bi-filetype-gif text-xl  text-blue-700"></i>
             
                <input type="text" name="conteudo" id="myText"
                    class="py-4 rounded-full bg-slate-100 text-black font-bold min-w-[20rem]" placeholder="Aa">
                <button type="submit" name="send">
                    <i class="bi bi-send-fill text-blue-700 text-2xl"></i>
                </button>    
                </div>
                


            </form>
              {{-- //onde vai ficar as mensagens --}}

        </section>
        @else

        @endif


    </main>

    </body>
    <style>
    .oculto {
        display: none;
    }

    i {
        cursor: pointer;
    }
</style>
{{-- javascript para emoji --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js"
    integrity="sha512-hkvXFLlESjeYENO4CNi69z3A1puvONQV5Uh+G4TUDayZxSLyic5Kba9hhuiNLbHqdnKNMk2PxXKm0v7KDnWkYA=="
    crossorigin="anonymous" referrerpolicy="no-referrer">
</script>
<script type="text/javascript">
    $('#myText').emojioneArea({
    pickerPosition: "top",
});
</script>


<script>
    //pesquisa 
pesquisa = document.getElementById("pesquisa");
fechar = document.querySelector(".fechar");
modalPesquisa = document.querySelector("#dialogPesquisa");
body = document.querySelector("body");
pesquisaInput = document.querySelector("#pesquisaInput");
nome = document.querySelector(".nome");
alertaSemPesquisa = document.querySelector(".message1");
showUsers = document.querySelector(".showUsers");

pesquisa.onclick = () =>{
    modalPesquisa.showModal()
 
}

fechar.onclick = () =>{
    modalPesquisa.close();
}
pesquisaInput.oninput = () =>{
    if(!pesquisaInput.value){
       alertaSemPesquisa.classList.remove("oculto");       
       showUsers.classList.add("oculto");       
     } else{
        alertaSemPesquisa.classList.add("oculto");
        showUsers.classList.remove("oculto");  
     }    
}

//dialog da foto de perfil no final do header
let imgPerfil = document.querySelector(".imgPerfil");
let dialogPerfil = document.querySelector(".dialogPerfil");

imgPerfil.onclick = () => {
  dialogPerfil.style.display = "block";
}
let main = document.querySelector("main");
let img = document.querySelector(".imagePerfil");

window.onclick = () =>{
    console.log(event.target != dialogPerfil || event.target != img);
    console.log(img);
    if(event.target != img && event.target != dialogPerfil){
     dialogPerfil.style.display = "none";       
    }
}
</script>

</html>