
<nav>
    <a href="{{route('home')}}"> Accueil</a>
    <a href="{{route('apropos')}}">A propos</a>
    <a href="{{route('contact')}}"> Contacts</a>
    @auth
        <a href="{{route('liste')}}">Liste</a>
    @endauth
    <span class="a-droite"></span>
    @guest
        <a href="{{route('register')}}"> Enregistrement</a>
        <a href="{{route('login')}}"> Connexion</a>
    @endguest

    @auth
        <a href="#"> {{Auth::user()->name}}</a>
            <a href="#" id="logout">Logout</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        <script>
            document.getElementById('logout').addEventListener("click", (event) => {
                document.getElementById('logout-form').submit();
            });
        </script>
    @endauth

</nav>
