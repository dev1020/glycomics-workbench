<div class="container header">
    <nav class="navbar navbar-expand-lg navbar-light border-bottom">
        <div class="container-fluid">
            <div class="logo d-flex align-items-center col-md-2 mb-2 mb-md-0 text-dark text-decoration-none">
                <a href="<?= url('/') ?>" class="">
                    <img src="{{ asset('images/gw-logo.png') }}" alt="Glycomics" style="width:100px"/>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse col-md-8" id="navbarNavAltMarkup">
                <div class="navbar-nav justify-content-center flex-grow-1">
                    <a href="<?= url('/') ?>"
                       class="nav-link px-3 link-dark <?= (request()->is('*home*') || request()->is('/'))?'active mx-1':'' ?>">Home</a>
                    <a class="nav-link px-3 link-dark <?= request()->is('*about*')?'active mx-1':'' ?>" href="<?= url('/about') ?>">About</a>
                    <a class="nav-link px-3 link-dark <?= request()->is('*databases*')?'active mx-1':'' ?>" href="<?= url('/databases') ?>">Databases</a>
                    <a class="nav-link px-3 link-dark <?= request()->is('*tools*')?'active mx-1':'' ?>" href="<?= url('/tools') ?>">Tools</a>
                    <a class="nav-link px-3 link-dark <?= request()->is('*portals*')?'active mx-1':'' ?>" href="<?= url('/portals') ?>">Portals</a>
                    <a class="nav-link px-3 link-dark <?= request()->is('*info-links*')?'active mx-1':'' ?>" href="<?= url('/info-links') ?>">Info Links</a>
                    <a class="nav-link px-3 link-dark <?= request()->is('*contact*')?'active mx-1':'' ?>" href="<?= url('/contact') ?>">Contact</a>

                    @if(!Auth::check())
                        <a class="nav-link px-3 link-dark d-block d-sm-block d-md-block d-lg-none"
                           href="<?= url('/login') ?>">login</a>
                    @else
                        <a class="nav-link px-3 link-dark d-block d-sm-block d-md-block d-lg-none"
                           href="<?= url('/dashboard') ?>">Dashboard</a>
                        <a class="nav-link px-3 link-dark d-block d-sm-block d-md-block d-lg-none"
                           href="<?= url('/logout') ?>">logout</a>
                    @endif

                </div>
            </div>
            <div class="col-md-2 text-end d-none d-lg-block d-xl-block d-xxl-block">
                <button class="btn btn-info" id="searchButton"><i class="fa fa-search"></i></button>
                @if(!Auth::check())
                    <a class="btn btn-outline-success me-2" href="<?= url('/login') ?>">Login</a>

                @else
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn btn-alt-secondary" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-user d-sm-none"></i>
                            <span class="d-none d-sm-inline-block">Hi {{substr(auth()->user()->name,0,10)}}</span>
                            <i class="fa fa-fw fa-angle-down opacity-50 ms-1 d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end p-0" aria-labelledby="page-header-user-dropdown">
                            <div class="rounded-top fw-semibold text-white text-center p-2" style="background: #85ab2f">
                                {{ Auth::user()->roles->pluck('name') }}
                            </div>
                            <div class="bg-grey rounded-bottom border-top-0 " style="border: 1px solid #85ab2f;">
                                <a class="dropdown-item" href="<?= url('/dashboard') ?>">
                                    <i class="far fa-fw fa-user me-1"></i> Dashboard
                                </a>

                                <div role="separator" class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= url('/logout') ?>">
                                    <i class="far fa-fw fa-arrow-alt-circle-left me-1"></i> Logout
                                </a>
                                <div role="separator" class="dropdown-divider"></div>
                            </div>
                        </div>
                    </div>

                @endif
            </div>
        </div>
    </nav>
</div>
<div id="search" style="display: none">
    <form>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="squery" placeholder="Search" >
            <button class="btn btn-info" type="button" id="button-addon2">Search</button>
        </div>
    </form>
</div>
<div id="sidebar-contact">
    <div id="toggle">
        <i class="fa fa-envelope fa-rotate-90"></i>
        <span class="d-none d-lg-block d-xl-block d-xxl-block"> &nbsp;Quick Contact</span>

    </div>
    <h2>Contact Us</h2>
    <div class="scroll">
        <form class="quickContact">
            @csrf
            <div class="holder">
                <div id="msg" class="text-primary"></div>

                <input type="text" id="fullname" name="fullname" placeholder="Your Name Here" class="form-control">


                <input type="text" id="email" name="email" placeholder="Your Email Here" class="form-control">

                <textarea id="message" name="message" placeholder="Your Message Here" class="form-control"></textarea>
                <input type="submit" name="Submit" value="SEND" class="btn btn-success"><span style=" padding-top:4px;">Please feel free to get in touch,<br>we value your feedback.</span>
            </div>
        </form>
    </div>
</div>

