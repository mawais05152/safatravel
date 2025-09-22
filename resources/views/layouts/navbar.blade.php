<!-- Navbar & Hero Start -->
<div class="position-relative p-0">
    <nav class="container-xxl navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="{{ url('/') }}" class="navbar-brand p-0">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
        </a>
        <a href="https://wa.me/02032867666" target="_blank" class="iconwhats"> <i class="fab fa-whatsapp" aria-hidden="true"></i> 020 3286 7666</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="{{ url('/') }}" class="nav-item nav-link home">Home</a>

                    <div class="nav-item dropdown">
                    <a href="{{route('umrah-packages')}}"
                        class="nav-link dropdown-toggle home"
                        data-bs-toggle="dropdown">
                        Umrah Packages
                    </a>
                    <div class="dropdown-menu m-0">
                        <a href="{{route('umrah-packages')}}" class="dropdown-item ">Umrah Packages</a>
                        <a href="{{route('december-umrah-packages')}}" class="dropdown-item">December Umrah</a>
                        <a href="{{route('ramadan-umrah-packages')}}" class="dropdown-item">Ramadan Umrah</a>
                        <a href="{{route('easter-umrah-packages')}}" class="dropdown-item">Easter Umrah</a>
                        <a href="{{route('umrah-packages-2026')}}" class="dropdown-item">Umrah 2026</a>
                    </div>
                    </div>

                <a href="{{route('hajj-packages')}}" class="nav-item nav-link home">Hajj Packages</a>
                <a href="{{route('about')}}" class="nav-item nav-link home">About Us</a>
                <a href="{{route('contact')}}" class="nav-item nav-link home">Contact</a>
            </div>
            <a href="{{route('beat-my-quote')}}" class="btn btn-primary py-2 px-4">Beat My Quote</a>
        </div>
    </nav>
</div>
<!-- Navbar & Hero End -->
