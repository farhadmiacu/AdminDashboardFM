 <!-- ========== App Menu ========== -->
 <div class="app-menu navbar-menu">
     <!-- LOGO -->
     <div class="navbar-brand-box">
         <!-- Dark Logo-->
         <a href="index.html" class="logo logo-dark">
             <span class="logo-sm">
                 <img src="{{ asset('/') }}backend/assets/images/logo-sm.png" alt="" height="22">
             </span>
             <span class="logo-lg">
                 <img src="{{ asset('/') }}backend/assets/images/logo-dark.png" alt="" height="17">
             </span>
         </a>
         <!-- Light Logo-->
         <a href="index.html" class="logo logo-light">
             <span class="logo-sm">
                 <img src="{{ asset('/') }}backend/assets/images/logo-sm.png" alt="" height="22">
             </span>
             <span class="logo-lg">
                 <img src="{{ asset('/') }}backend/assets/images/logo-light.png" alt="" height="17">
             </span>
         </a>
         <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
             <i class="ri-record-circle-line"></i>
         </button>
     </div>

     <!-- sidebar-user -->
     <div class="dropdown sidebar-user m-1 rounded">
         <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <span class="d-flex align-items-center gap-2">
                 <img class="rounded header-profile-user" src="{{ asset('/') }}backend/assets/images/users/avatar-1.jpg" alt="Header Avatar">
                 <span class="text-start">
                     <span class="d-block fw-medium sidebar-user-name-text">Anna Adame</span>
                     <span class="d-block fs-14 sidebar-user-name-sub-text"><i class="ri ri-circle-fill fs-10 text-success align-baseline"></i> <span class="align-middle">Online</span></span>
                 </span>
             </span>
         </button>
         <div class="dropdown-menu dropdown-menu-end">
             <!-- item-->
             <h6 class="dropdown-header">Welcome Anna!</h6>
             <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
             <a class="dropdown-item" href="auth-logout-basic.html"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
         </div>
     </div>

     <!-- sidebar -->
     <div id="scrollbar">
         <div class="container-fluid">

             <div id="two-column-menu">
             </div>
             <ul class="navbar-nav" id="navbar-nav">
                 <!-- Dashboard Menu -->
                 <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                 <li class="nav-item">
                     <a class="nav-link menu-link" href="#sidebarDashboards">
                         <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                     </a>
                 </li>
                 <!-- end Dashboard Menu -->
                 <li class="nav-item">
                     <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                         <i class="ri-apps-2-line"></i> <span data-key="t-apps">Apps</span>
                     </a>
                     <div class="collapse menu-dropdown" id="sidebarApps">
                         <ul class="nav nav-sm flex-column">
                             <li class="nav-item">
                                 <a href="apps-file-manager.html" class="nav-link"> <span data-key="t-file-manager">File Manager</span></a>
                             </li>
                             <li class="nav-item">
                                 <a href="apps-todo.html" class="nav-link"> <span data-key="t-to-do">To Do</span></a>
                             </li>
                         </ul>
                     </div>
                 </li>

                 <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Pages</span></li>

                 <li class="nav-item">
                     <a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                         <i class="ri-account-circle-line"></i> <span data-key="t-authentication">Authentication</span>
                     </a>
                     <div class="collapse menu-dropdown" id="sidebarAuth">
                         <ul class="nav nav-sm flex-column">
                             <li class="nav-item">
                                 <a href="#sidebarSignIn" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSignIn" data-key="t-signin"> Sign
                                     In
                                 </a>
                                 <div class="collapse menu-dropdown" id="sidebarSignIn">
                                     <ul class="nav nav-sm flex-column">
                                         <li class="nav-item">
                                             <a href="auth-signin-basic.html" class="nav-link" data-key="t-basic"> Basic
                                             </a>
                                         </li>
                                         <li class="nav-item">
                                             <a href="auth-signin-cover.html" class="nav-link" data-key="t-cover"> Cover
                                             </a>
                                         </li>
                                     </ul>
                                 </div>
                             </li>
                         </ul>
                     </div>
                 </li>

             </ul>
         </div>
         <!-- Sidebar -->
     </div>

     <div class="sidebar-background"></div>
 </div>
