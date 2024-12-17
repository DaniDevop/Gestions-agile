<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top"></div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle" src="{{asset('storage/'.Auth::user()->profile)}}" alt="">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">{{Auth::user()->nom}}</h5>
                        <span>{{Auth::user()->admin}}</span>
                    </div>
                </div>
                <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                    <a href="{{route('update.account',['id'=>Auth::user()->id])}}" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-settings text-primary"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Mon compte</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{route('logout.user')}}" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle"></div>
                        </div>
                        <div class="preview-item-content"></div>
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('home')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Administration</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#groupes-menu" aria-expanded="false" aria-controls="groupes-menu">
                <span class="menu-icon">
                    <i class="mdi mdi-laptop"></i>
                </span>
                <span class="menu-title">Projet Et Groupes</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="groupes-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('listes.project')}}">Listes des project</a></li>
                    @if(Auth::user()->role=='ADMIN')
                    <li class="nav-item"> <a class="nav-link" href="{{route('list.groupes')}}">Listes des groupes</a></li>
                    @endif
                    <li class="nav-item"> <a class="nav-link" href="{{route('my.crew')}}">Mes groupes</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#taches-menu" aria-expanded="false" aria-controls="taches-menu">
                <span class="menu-icon">
                    <i class="mdi mdi-laptop"></i>
                </span>
                <span class="menu-title">Tâches</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="taches-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('listes.taches')}}">Listes des tâches</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#admin-menu" aria-expanded="false" aria-controls="admin-menu">
                <span class="menu-icon">
                    <i class="mdi mdi-security"></i>
                </span>
                <span class="menu-title">Administration</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="admin-menu">
                <ul class="nav flex-column sub-menu">
                    @if(Auth::user()->role =='ADMIN')
                    <li class="nav-item"> <a class="nav-link" href="{{route('register.user')}}">Ajouter un utilisateur</a></li>
                    @endif
                    <li class="nav-item"> <a class="nav-link" href="{{route('listes.users')}}">Listes des membres</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
