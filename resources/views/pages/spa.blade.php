<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <title>@yield('meta-title',"Todo es Digital | " . config('app.name'))</title>

    <meta name="description"  content="@yield('meta-description', 'En este blog Todo es Digital')">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/framework.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/responsive.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans|Poppins|Titillium+Web&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>

    @stack('styles')

    <style>
        
        .v-enter-active, .v-leave-active {
            transition: opacity .5s;
        }
        .v-enter, .v-leave-to{
            opacity: 0;
        }

    </style>

</head>

<body>

    <div id="app">

        <div class="preload"></div>

        <header class="space-inter">

            <div class="container container-flex space-between">

                <router-link :to="{name: 'home'}">

                    <figure class="logo"><img src="/img/logo.png" alt=""></figure>

                </router-link>

                <nav-bar></nav-bar>    

            </div>

        </header>
        
        <div class="page-wrapper">
            
            <transition name="slide-fade" mode="out-in">

                <router-view :key="$route.fullPath"></router-view>

            </transition> 

        </div> 

        <section class="footer">

            <footer>
                <div class="container">
                    <figure class="logo"><img src="/img/logo-bco.png" alt=""></figure>
                    <nav>
                        <ul class="container-flex space-center list-unstyled">
                            <li>

                                <router-link :to="{name: 'home'}" class="text-uppercase pure-menu-link c-gris-2">Inicio</router-link>

                            </li>

                            <li>

                                <router-link :to="{name: 'about'}" class="text-uppercase pure-menu-link c-gris-2">Acerca de</router-link>
                                
                            </li>
                            
                            <li>

                                <router-link :to="{name: 'archive'}" class="text-uppercase pure-menu-link c-gris-2">Archivo</router-link>
                                
                            </li>

                            <li>

                                <router-link :to="{name: 'contact'}" class="text-uppercase pure-menu-link c-gris-2">Contacto</router-link>
                                
                            </li>
                            <li><a href="https://allsdigital.net/es" class="text-uppercase cursos c-white">Cursos Online</a></li>
                        </ul>
                    </nav>
                    <div class="divider-2"></div>
                    <p>Nunc placerat dolor at lectus hendrerit dignissim. Ut tortor sem, consectetur nec hendrerit ut, ullamcorper ac odio. Donec viverra ligula at quam tincidunt imperdiet. Nulla mattis tincidunt auctor.</p>
                    <div class="divider-2" style="width: 80%;"></div>
                    <p>© 2019 - All is Digital. Todos los derechos reservados. Diseño y Desarrollo por <span class="c-white">Disturbio ilustrativo</span></p>
                    <ul class="social-media-footer list-unstyled">
                        <li><a href="#" class="fb"></a></li>
                        <li><a href="#" class="tw"></a></li>
                        <li><a href="#" class="in"></a></li>
                        <li><a href="#" class="pn"></a></li>
                    </ul>
                </div>
            </footer>

        </section>

    </div>

    <script src="{{ mix('js/app.js') }}"></script>

    @stack('scripts')

</body>
</html>
