<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Client</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.8.x-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.8.0/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
    <style>
        .center{
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>

    <!-- START NAV -->
    <nav class="navbar is-white">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item brand-text" href="Dashboard.html">
                    <img style="max-width: 160px" src="https://tealorca.com/assets/img/logo-nav-1.png">
                </a>
                <div class="navbar-burger burger" data-target="navMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div id="navMenu" class="navbar-menu">
                
                <div class="navbar-end">
                    <a class="navbar-item" href="#">
                        Log Out
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <!-- END NAV -->
    <div class="container">
        <div class="columns">
            <div class="column is-3 ">
                <aside class="menu">
                    <p class="menu-label">
                        General
                    </p>
                    <ul class="menu-list">
                        <li><a href="Dashboard.html">Dashboard</a></li>
                    </ul>
                    <p class="menu-label">
                        Administration
                    </p>
                    <ul class="menu-list">
                        <li>
                            <a>Manage Your Team</a>
                            <ul>
                                <li><a href="{{route('devs.index')}}">Team Members</a></li>
                                <li><a href="{{route('devs.create')}}" >Add a member</a></li>
                            </ul>
                        </li>
                        <li>
                            <a>Manage Your Clients</a>
                            <ul>
                                <li><a class="" href="{{route('clients.index')}}">Clients</a></li>
                                <li><a href="{{route('clients.create')}}"  >Add a Client</a></li>
                            </ul>
                        </li>
                        <li>
                            <a>Manage Your Projects</a>
                            <ul>
                                <li><a href="{{route('projects.index')}}">View Projects</a></li>
                                <li><a href="{{route('projects.create')}}">Add a Project</a></li>
                            </ul>
                        </li>
                        <li>
                            <a>Manage Your Tasks</a>
                            <ul>
                                <li><a href="{{route('tasks.index')}}">View Tasks</a></li>
                                <li><a class="" href="{{route('tasks.create')}}">Add a Task</a></li>
                            </ul>

                        </li>
                        <li>
                            <a href="Status.html">Status</a>
                        </li>
                    </ul>
                </aside>
            </div>
            @yield('content')
        </div>
    </div>
    <script async type="text/javascript" src="js/bulma.js"></script>
</body>

</html>