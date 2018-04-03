<header><div class="container">
        <a href="{{ URL::route('index') }}" id="logo">Sporko</a>
    <nav><ul>
        <li><a href="{{ URL::route('daily') }}">Daily Training</a></li>
        <li><a href="{{ URL::route('programs') }}">Programmes</a></li>
        <li><a href="{{ URL::route('exercices') }}">Exercices</a></li>
        <li><a href="{{ URL::route('login') }}">Connexion</a></li>
        <li><a href="{{ URL::route('signup') }}">Inscription</a></li>
        <!--
        Pour les connectés :
        params
        stats
        deconnexion
        -->
    <ul></nav>

</div></header>