<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand" href="/"></a></div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/">HOME</a></li>
                <li><a href="/map">Map</a></li>
                <li><a href="/resumebuilder">Resume Builder</a></li>
                @auth
                    @if (Auth::user()->role === 'employee')
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Skill <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/create/skill">Create Skill</a></li>
                            <li><a href="/skill">View Skill</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Trial <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/create/trial">Create Trial</a></li>
                            <li><a href="/trial">View Trial</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Organization <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/create/organization">Create Organization</a></li>
                            <li><a href="/edit/organization/{{Auth::user()->organization_id}}">Edit Organization</a></li>
                            <li><a href="/organization">View Organization</a></li>
                        </ul>
                    </li>
                    @else
                            <li><a href="/skill">View Skill</a></li>
                            <li><a href="/organization">View Trial</a></li>
                            <li><a href="/organization">View Organization</a></li>
                    @endif
                @else
                    <li><a href="/skill">View Skill</a></li>
                    <li><a href="/trial">View Trial</a></li>
                    <li><a href="/organization">View Organization</a></li>
                @endauth
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        @auth
                            <li><a href="/edit/skills">Edit Skills</a></li>
                            <li><a href="/account">View Account</a></li>
                            <li><a href="/edit/account">Edit Account</a></li>
                            <li><a href="/logout">Logout</a></li>
                        @else
                            <li><a href="/login">Login</a></li>
                            <li><a href="/register">Register</a></li>
                        @endauth
                    </ul>
                </li>
            </ul>
            </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->

    </div>
</nav>