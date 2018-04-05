<header><div class="container">
        <a href="{{ URL::route('index') }}" id="logo">Sporko</a>
    <nav><ul>
        <li><a href="{{ URL::route('daily') }}">Daily Training</a></li>
        <li><a href="{{ URL::route('programs.index') }}">Programmes</a></li>
        <li><a href="{{ URL::route('exercices') }}">Exercices</a></li>
        
        @auth
        <li><a href="{{ URL::route('stats') }}" title="Paramètres et statistiques">{{ Auth::user()->name }}</a> <a href="{{ URL::route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"class="blue">[X]</a><form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
        </li>
        @endauth
        
        @guest
        <li><a href="{{ URL::route('login') }}">Connexion</a></li>
        <li><a href="{{ URL::route('register') }}">Inscription</a></li>        
        @endguest
    </ul></nav>

</div></header>