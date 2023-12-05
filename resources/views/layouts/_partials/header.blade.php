

<div class="header-content">
<a href="">    <img class="icon-logo" src="{{asset('assets/images/logo.png')}}" alt="">
</a>
    <div class="header-menu">
        <ul>
            <li><a href=""> Directorio </a></li>    
            <li><a href="">Informacion</a></li>

            @guest
            <li><a class="font-green" href="{{route('login')}}">Iniciar Sesion</a></li>
            <li><a class="font-green" href="{{route('register')}}">Registrate</a></li>
            @else 
            <li>
                <a href="">{{Auth::user()->name}} {{Auth::user()->lastname}}</a>
            </li>
            @endguest
        
        </ul>
        
    </div>
    <img id="icon-menu" src="{{asset('assets/images/menu.png')}}" alt="">
</div>
<div class="line"></div>
