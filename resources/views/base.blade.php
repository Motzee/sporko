<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
	<meta name="author" content="Maelle LaLicorne">
	<meta name="description" content="Description de la page pour les moteurs de recherche" />
	<meta name="keywords" content="mots-clefs séparés par des virgules" />
	<title>Sporko - @yield('title')</title>
	<link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}" />
	
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]--> <!--si t'es un vieux navigateur, t'as besoin de ça pour comprendre la nouvelle ossature de page issue de html5-->
</head>

<body>
    
    @include('includes.header')

    <div id="main">
        <main class="container">
            @yield('content')
        </main>
    </div>
    
    @include('includes.footer')
    
</body>
</html>

