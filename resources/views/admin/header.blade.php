<nav class="navbar navbar-expand-lg">
    <!-- Search Overlay -->
    <div class="search-panel">
        <div class="search-inner d-flex align-items-center justify-content-center">
            <span class="close-btn">
                Close <i class="fa fa-close"></i>
            </span>

            <form id="searchForm" action="#">
                <div class="form-group">
                    <input type="search" name="search" placeholder="What are you searching for...">
                    <button type="submit" class="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Navbar Container -->
    <div class="container-fluid d-flex align-items-center justify-content-between">
        
        <!-- Left Side : Brand & Toggle -->
        <div class="navbar-header d-flex align-items-center">
            <a href="index.html" class="navbar-brand">
                <div class="brand-text brand-big text-uppercase visible">
                    <strong class="text-primary">Dark</strong><strong>Admin</strong>
                </div>
                <div class="brand-text brand-sm">
                    <strong class="text-primary">D</strong><strong>A</strong>
                </div>
            </a>

            <button class="sidebar-toggle">
                <i class="fa fa-long-arrow-left"></i>
            </button>
        </div>

        <!-- Right Menu -->
        <ul class="right-menu list-inline mb-0">

            <!-- Search Icon -->
            <li class="list-inline-item">
                <a href="#" class="nav-link search-open">
                    <i class="icon-magnifying-glass-browser"></i>
                </a>
            </li>

            <!-- Messages -->
            <li class="list-inline-item dropdown">
                <a class="nav-link messages-toggle" data-toggle="dropdown">
                    <i class="icon-email"></i>
                    <span class="badge dashbg-1">5</span>
                </a>

                <div class="dropdown-menu messages">
                    @php
                        $messages = [
                            ['img'=>'avatar-3.jpg','name'=>'Nadia Halsey','status'=>'online','time'=>'9:30am'],
                            ['img'=>'avatar-2.jpg','name'=>'Peter Ramsy','status'=>'away','time'=>'7:40am'],
                            ['img'=>'avatar-1.jpg','name'=>'Sam Kaheil','status'=>'busy','time'=>'6:55am'],
                            ['img'=>'avatar-5.jpg','name'=>'Sara Wood','status'=>'offline','time'=>'10:30pm'],
                        ];
                    @endphp

                    @foreach($messages as $msg)
                        <a href="#" class="dropdown-item message d-flex align-items-center">
                            <div class="profile">
                                <img src="{{ asset('admin_css/Admin_Template-main/img/'.$msg['img']) }}" class="img-fluid">
                                <div class="status {{ $msg['status'] }}"></div>
                            </div>
                            <div class="content">
                                <strong class="d-block">{{ $msg['name'] }}</strong>
                                <span class="d-block">lorem ipsum dolor sit amit</span>
                                <small class="date d-block">{{ $msg['time'] }}</small>
                            </div>
                        </a>
                    @endforeach

                    <a href="#" class="dropdown-item text-center">
                        <strong>See All Messages <i class="fa fa-angle-right"></i></strong>
                    </a>
                </div>
            </li>

            <!-- Tasks -->
            <li class="list-inline-item dropdown">
                <a class="nav-link tasks-toggle" data-toggle="dropdown">
                    <i class="icon-new-file"></i>
                    <span class="badge dashbg-3">9</span>
                </a>

                <div class="dropdown-menu tasks-list">
                    @foreach([40,20,70,30,65] as $key => $percent)
                        <a href="#" class="dropdown-item">
                            <div class="text d-flex justify-content-between">
                                <strong>Task {{ $key+1 }}</strong>
                                <span>{{ $percent }}% complete</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar dashbg-{{ ($key%4)+1 }}"
                                     style="width: {{ $percent }}%">
                                </div>
                            </div>
                        </a>
                    @endforeach
                    <a href="#" class="dropdown-item text-center">
                        <strong>See All Tasks <i class="fa fa-angle-right"></i></strong>
                    </a>
                </div>
            </li>

            <!-- User Profile -->
            <li class="list-inline-item dropdown user-dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ asset('admin_css/Admin_Template-main/img/user_avatar.jpg') }}"
                         class="rounded-circle" width="30" height="30">
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <h6 class="dropdown-header">
                        {{ Auth::user()->name ?? 'Guest User' }}
                    </h6>

                    <div class="dropdown-divider"></div>

                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="fa fa-user-circle mr-2"></i> Profile Settings
                    </a>

                    <div class="dropdown-divider"></div>

                    <a href="#" class="dropdown-item"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out-alt mr-2"></i> Log out
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>

        </ul>
    </div>
</nav>
