<section id="register">

@guest
<h1 class="title-information">Unete a nuestra comunidad</h1>
<h2 class="subtitle-information">Reserva citas para ti y tus familiares</h2>

<ul class="menu-information">
    <li>
        <a href="{{route('login')}}">Iniciar sesion</a>
    </li>
    <li>
        <a href="{{route('register')}}">Registrate</a>
    </li>
</ul>
@else
<h1 class="title-information">Reserva una cita medica</h1>
<h2 class="subtitle-information">Reserva citas para ti y tus familiares</h2>

<ul class="menu-information">
    <li>
        <a href="{{route('home.requests')}}">Reservar</a>
    </li>

@endguest

</section>