<!DOCTYPE html>
<html lang="en">

@include('jobhive.employer.pages.partials.head')

<body class="g-sidenav-show  bg-gray-200">

    @include('jobhive.employer.pages.partials.sidebar')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('jobhive.employer.pages.partials.navbar')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row min-vh-80 h-100">
            <div class="col-12">
                @yield('content')
            </div>
        </div>
    </div>
</main>

<div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
        <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
        <div class="card-header pb-0 pt-3">
            <div class="float-start">
                <h5 class="mt-3 mb-0">{{auth()->user()->name}}</h5>
                @if(auth()->user()->role === 1)
                    <span>Employer</span>
                @endif
            </div>
            <div class="float-end mt-4">
                <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                    <i class="material-icons">clear</i>
                </button>
            </div>
            <!-- End Toggle Button -->
        </div>
        <hr class="horizontal dark my-1">
        <div class="card-body pt-sm-3 pt-0">
            <!-- Sidebar Backgrounds -->
            <div class="mt-2 d-flex">
                <h6 class="mb-0"><span class="text-muted">Theme</span><br>Light / Dark</h6>
                <div class="form-check form-switch ps-0 ms-auto my-auto">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
                </div>
            </div>
            <div class="mt-4 d-flex">
                <h6 class="mb-0"><span class="text-muted">Profile Settings</span><br>Edit Profile</h6>
                <div class="form-check form-switch ps-0 ms-auto my-auto">
                    <a href="#"><i class="fa fa-external-link" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="mt-4 d-flex">
                <h6 class="mb-0"><span class="text-muted">Logout</span><br>Go to Dashboard</h6>
                <div class="form-check form-switch ps-0 ms-auto my-auto">
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--   Core JS Files   -->
@include('jobhive.employer.pages.partials.scripts')
</body>
</html>
