<nav class="mt-2 sidebar-menu">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview {{ setActiveRoute('dashboard') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                NAVEGACIÓN
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav-item nav-treeview">
              <li class="nav-item {{ setActiveRoute('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="active nav-link">
                  <i class="far fa-compass nav-icon"></i>
                  <p>Inicio</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('pages.home')}}" target="_blank" class="nav-link" >
                  <i class="fas fa-icons nav-icon"></i>Front-Page
                </a>
              </li>
            </ul>

            <li class="nav-item has-treeview {{ setActiveRoute('admin.posts.index') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                BLOG
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('admin.posts.index' )}}" class="nav-link {{ setActiveRoute('admin.posts.index') ? 'active' : '' }}">
                  <i class="far fa-eye nav-icon"></i>
                  <p>Ver todos los post</p>
                </a>
              </li>
          
               @can('create', new App\Post)
    
              <li class="nav-item">

                @if (request()->is('admin/posts/*'))

                  <a href="{{ route('admin.posts.index', '#create') }}" class="nav-link">
                    <i class="far fa-edit nav-icon"></i>
                    <p>Crear un post</p>
                  </a>

                @else

                  <a href="#" data-toggle="modal" data-target="#myModal" class="nav-link">
                    <i class="far fa-edit nav-icon"></i>
                    <p>Crear un post</p>
                  </a>

                @endif

              </li>

              @endcan

            </ul>

            @can('view', new App\User)

            <li class="nav-item has-treeview {{ setActiveRoute(['admin.users.index', 'admin.users.create', 'admin.users.edit']) ? 'menu-open' : '' }}">

            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
               USUARIOS
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="{{ route('admin.users.index' )}}" class="nav-link {{ setActiveRoute('admin.users.index', 'admin.users.edit') ? 'active' : '' }}">
                  <i class="far fa-eye nav-icon"></i>
                  <p>Ver usuarios</p>
                </a>

              </li>

              <li class="nav-item">

                  <a href="{{ route('admin.users.create') }}" class="nav-link {{ setActiveRoute('admin.users.create') ? 'active' : '' }}">
                    <i class="far fa-edit nav-icon"></i>
                    <p>Crear usuario</p>
                  </a>

              </li>

            </ul>

            @else

              <li class="nav-item">

                <a href="{{ route('admin.users.show', auth()->user() ) }}" class="nav-link {{ setActiveRoute('admin.users.edit', 'admin.users.show') ? 'active' : '' }}">
                  <i class="far fa-user nav-icon"></i>
                  <p>Mi Perfil</p>
                </a>

              </li>

            @endcan

            @can('view', new \Spatie\Permission\Models\Role)

            <li class="nav-item">

                  <a href="{{ route('admin.roles.index') }}" class="nav-link {{ setActiveRoute('admin.roles.index', 'admin.roles.create') ? 'active' : '' }}">
                    <span class="left badge badge-default"><i class="fas fa-user-tag nav-icon"></i></span>
                    <p>ROLES</p>
                    
                  </a>

              </li>

              @endcan

              @can('view', new \Spatie\Permission\Models\Permission)

              <li class="nav-item">

                  <a href="{{ route('admin.permissions.index') }}" class="nav-link {{ setActiveRoute('admin.permissions.index', 'admin.permissions.create') ? 'active' : '' }}">
                    <span class="left badge badge-pill"><i class="fas fa-user-shield nav-icon"></i></span>
                    <p>PERMISOS</p>
                    {{-- <span class="right badge badge-danger"><i class="far fa-edit nav-icon"></i></span> --}}
                  </a>

              </li>

              @endcan

          </li>
        </ul>
      </nav>