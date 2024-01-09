<section id="navbar-appointment">
    <nav>
        <ul>

            <li>
                <a href="{{route('home.requests')}}">Mis citas</a>
            </li>
            @can('home.patients')
            <li>
                <a href="{{route('home.patients')}}">Mis Familiares</a>
            </li>
            @endcan
           @can('home.requestHistory')
           <li>
            <a href="{{route('home.requestHistory')}}">Historial de citas</a>
           </li>
           @endcan
        </ul>
    </nav>
</section>
