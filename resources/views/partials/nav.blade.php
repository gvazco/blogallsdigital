<nav class="custom-wrapper" id="menu">
    <div class="pure-menu">
    	<a href="#" class="custom-toggle btn-bar" id="toggle"></a>
    </div>
    <ul class="container-flex list-unstyled">

        <li>
        	<a href="{{ route('pages.home') }}" 
            class="text-uppercase pure-menu-link c-gris-2 {{ setActiveRoute('pages.home') }}">Inicio
        </a>
    </li>
    <li>
       <a href="{{ route('pages.about') }}" 
       class="text-uppercase pure-menu-link c-gris-2 {{ setActiveRoute('pages.about') }}">Acerca de:
   </a>
</li>
<li>
   <a href="{{ route('pages.archive') }}" 
   class="text-uppercase pure-menu-link c-gris-2 {{ setActiveRoute('pages.archive') }}">Archivo
</a>
</li>
<li>
   <a href="{{ route('pages.contact') }}" 
   class="text-uppercase pure-menu-link c-gris-2 {{ setActiveRoute('pages.contact') }}">Contacto
</a>
</li>
<li>
    <a href="https://allsdigital.net/es" class="text-uppercase c-blue">Cursos Online
    </a>
</li>
</ul>
</nav>