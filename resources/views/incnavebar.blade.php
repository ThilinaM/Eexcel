 <!--::header part start::-->

    <header class="main_menu home_menu">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-12">

                    <nav class="navbar navbar-expand-lg navbar-light">

                        <a class="navbar-brand" href="index.php"> <img src="img/logo.png" alt="logo"> </a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

                            <span class="navbar-toggler-icon"></span>

                        </button>



                        <div class="collapse navbar-collapse main-menu-item justify-content-end" id="navbarSupportedContent">

                            <ul class="navbar-nav align-items-center">

                                <li class="nav-item active">

                                    <a class="nav-link" href="/">Home</a>

                                </li>

                                <li class="nav-item">

                                    <a class="nav-link" href="course">Courses</a>

                                </li>

                                <li class="nav-item">

                                    <a class="nav-link" href="about">About</a>

                                </li>
                                
                                <li class="nav-item">

                                    <a class="nav-link" href="contact">Contact</a>

                                </li>
                                <li class="nav-item">
                                    @guest
                                    <a class="nav-link" href="/login">Login</a>
                                    @else                                   
                                    <a class="nav-link" href="/login">Dashboard</a>
                                    @endguest   
                                </li>
                                <li class="nav-item">
                                    @guest
                                    @else
                                   
                                    <form id="logoutform" action="{{ route('logout') }}" method="POST" >
                                            {{ csrf_field() }}
                                            <input type="submit" class="nav-link" value="Logout">
                                        </form>
                                    @endguest  
                                </li>

                                <li class="d-none d-lg-block">

                                   <a class="btn_1" href="tel:+9477 xx xxxx">Call us</a> 

                                </li>

                            </ul>

                        </div>

                    </nav>

                </div>

            </div>

        </div>

    </header>

    <!-- Header part end-->