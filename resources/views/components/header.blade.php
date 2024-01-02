
<nav>
    <img class="JO" src="{{Vite::asset('resources/images/JOParis.png')}}" >
    <a href="{{route('accueil')}}"> Accueil</a>
    <a href="{{route('apropos')}}">A propos</a>
    <a href="{{route('contact')}}"> Contact</a>
    @auth
        <a href="{{route('liste')}}">Liste</a>
    @endauth
    <span class="a-droite"></span>
    <div class="droit">
    @guest
        <a  href="{{route('register')}}"> Enregistrement</a>
        <a  href="{{route('login')}}"> Connexion</a>
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
    </div>
</nav>
