<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Left Navbar</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

    <style>
        body {
            overflow-x: hidden;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding-top: 6rem;
        }

        .sidebar a {
            color: #ffffff;
            text-decoration: none;
            padding: 0.75rem 1rem;
            display: block;
        }

        .sidebar a:hover {
            background-color: #495057;
            text-decoration: none;
        }

        .content {
            margin-left: 250px;
            padding: 1rem;
        }

        /* Styling the Fixed Header */
        #topNav {
            background-color: #212529;
            z-index: 1000;
            width: 100%;
            transition: all 0.3s ease-in-out;
            display: block;
            /* Ensure it takes up full width */
        }

        /* Navbar Layout */
        .navbar {
            padding: 15px 20px;
            /* Extra padding for better spacing */
            display: flex;
            justify-content: space-between;
            /* Align items to both ends */
            width: 100%;
        }

        /* Avatar Styling */
        .avatar {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 50%;
            transition: transform 0.3s ease-in-out;
        }

        /* Hover animation for avatar */
        .user-menu:hover .avatar {
            transform: scale(1.1);
        }

        /* Dropdown Menu */
        .dropdown-menu {
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Navbar Animation (fade in from top) */
        #topNav {
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from {
                top: -60px;
                opacity: 0;
            }

            to {
                top: 0;
                opacity: 1;
            }
        }

        /* Mobile Menu: When the navbar is collapsed */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                /* Stack items vertically on mobile */
                align-items: center;
                /* Center the items */
            }

            .avatar {
                width: 30px;
                height: 30px;
            }
        }
    </style>



</head>


<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow-sm" id="topNav">
        <div class="container-fluid">
            <!-- Navbar Brand -->
            <a class="navbar-brand" href="{{route('dashboard')}}">Logistics Dashboard</a>

            <div class="dropdown">
                <!-- Avatar and Username -->
                <div class="user-menu d-flex align-items-center nav-dark" id="userMenuBtn" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;">
                    <img src="{{asset("assets/images/".Auth::user()->Fimage)}}" alt="User Avatar" class="avatar rounded-circle" width="40" height="40">
                    <span class="ms-2 text-white">{{Auth::user()->name}}</span>
                </div>
                <!-- Dropdown Menu -->
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenuBtn">
                    <li><a class="dropdown-item" href="#profile">Profile</a></li>
                    <li><a class="dropdown-item" href="#settings">Settings</a></li>
                    <li><a class="dropdown-item" href="#help">Help</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="#logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="sidebar bg-dark">

        <div class="d-flex">
            <!-- Sidebar -->
            <nav class="bg-dark text-white vh-100 p-3" style="width: 250px;">
                <ul class="nav flex-column">
                    @if (Auth::user()->role->permissons->contains('validation', 'Manage Users') ||
                            Auth::user()->role->permissons->contains('validation', ' manage users'))
                        <!-- Users Dropdown -->
                        <li class="nav-item mb-2">
                            <a class="nav-link text-white d-flex align-items-center dropdown-toggle" href="#"
                                id="usersDropdown" data-bs-toggle="collapse" data-bs-target="#usersMenu"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-people-fill me-2"></i> Users
                            </a>
                            <div id="usersMenu" class="collapse ms-3">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('users.index') }}"><i
                                                class="bi bi-person-fill me-2"></i>
                                            All</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('admins.index') }}"><i
                                                class="bi bi-person-badge-fill me-2"></i> Admins</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('pilots.index') }}"><i
                                                class="bi bi-briefcase-fill me-2"></i> Pilots</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('owners.index') }}"><i
                                                class="bi bi-person-workspace me-2"></i> Owners</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif

                    @if (Auth::user()->role->permissons->contains('validation', 'manage roles and permissons') ||
                            Auth::user()->role->permissons->contains('validation', 'Manage Roles and Permissons'))
                        <li class="nav-item mb-2">
                            <a class="nav-link text-white d-flex align-items-center dropdown-toggle" href="#"
                                id="rolesPermissionsDropdown" data-bs-toggle="collapse"
                                data-bs-target="#rolesPermissionsMenu" aria-expanded="false">
                                <i class="bi bi-shield-lock-fill me-2"></i> Roles and Permissions
                            </a>
                            <div id="rolesPermissionsMenu" class="collapse ms-3">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('roles.index') }}"><i
                                                class="bi bi-person-check-fill me-2"></i> Roles</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('permissons.index') }}"><i
                                                class="bi bi-unlock-fill me-2"></i> Permissions</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('roles.assign') }}"><i
                                                class="bi bi-person-plus-fill me-2"></i> Assign Roles</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif

                    @if (Auth::user()->role->permissons->contains('validation', 'manage shipments') ||
                            Auth::user()->role->permissons->contains('validation', 'Manage Shipments'))
                        <!-- Shipments -->
                        <li class="nav-item mb-2">
                            <a class="nav-link text-white d-flex align-items-center"
                                href="{{ route('shipments.index') }}">
                                <i class="bi bi-box-seam me-2"></i> Shipments
                            </a>
                        </li>
                    @endif

                    @if (Auth::user()->role->permissons->contains('validation', 'manage pickups') ||
                            Auth::user()->role->permissons->contains('validation', 'Manage Pickups'))
                        <!-- Pickups -->
                        <li class="nav-item mb-2">
                            <a class="nav-link text-white d-flex align-items-center"
                                href="{{ route('pickups.index') }}">
                                <i class="bi bi-truck me-2"></i> Pickups
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->role->permissons->contains('validation', 'manage transactions') ||
                            Auth::user()->role->permissons->contains('validation', 'Manage Transactions'))
                        <!-- Transactions -->

                        <li class="nav-item mb-2">
                            <a class="nav-link text-white d-flex align-items-center"
                                href="{{ route('moneny.index') }}">
                                <i class="bi bi-cash-stack me-2"></i> Transactions
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->role->permissons->contains('validation', 'manage hubs') ||
                            Auth::user()->role->permissons->contains('validation', 'Manage Hubs'))
                        <!-- Hubs -->
                        <li class="nav-item mb-2">
                            <a class="nav-link text-white d-flex align-items-center"
                                href="{{ route('hubs.index') }}">
                                <i class="bi bi-boxes me-2"></i> Hubs
                            </a>
                        </li>
                    @endif

                    @if (Auth::user()->role->permissons->contains('validation', 'manage governates and cities') ||
                            Auth::user()->role->permissons->contains('validation', 'Manage Governates and Cities'))
                        <!-- Governates and Cities -->
                        <li class="nav-item mb-2">
                            <a class="nav-link text-white d-flex align-items-center dropdown-toggle" href="#"
                                id="shipmentCostsDropdown" data-bs-toggle="collapse"
                                data-bs-target="#shipmentCostsMenu" aria-expanded="false">
                                <i class="bi bi-geo-alt-fill me-2"></i> Governates & Cities
                            </a>
                            <div id="shipmentCostsMenu" class="collapse ms-3">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('governate.index') }}"><i
                                                class="bi bi-map-fill me-2"></i>
                                            Governates</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('cities.index') }}"><i
                                                class="bi bi-pin-map-fill me-2"></i> Cities</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="#"><i
                                                class="bi bi-currency-exchange me-2"></i> Shipment Costs</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif
                    @if (Auth::user()->role->permissons->contains('validation', 'manage business') ||
                            Auth::user()->role->permissons->contains('validation', 'Manage Business'))
                        <!-- Business of Owners -->
                        <li class="nav-item mb-2">
                            <a class="nav-link text-white d-flex align-items-center dropdown-toggle" href="#"
                                id="businessDropdown" data-bs-toggle="collapse" data-bs-target="#businessMenu"
                                aria-expanded="false">
                                <i class="bi bi-building me-2"></i> Business of Owners
                            </a>
                            <div id="businessMenu" class="collapse ms-3">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="#"><i
                                                class="bi bi-briefcase-fill me-2"></i> Owner Profiles</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="#"><i
                                                class="bi bi-bar-chart-fill me-2"></i> Business Performance</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="#"><i
                                                class="bi bi-wallet-fill me-2"></i> Revenue Reports</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif


                </ul>
            </nav>


        </div>
    </div>
    <div class="content row align-items-center justify-content-center my-5 mt-5">
        @yield('content')


    </div>


</body>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- toaster package to display notifications with smart style -->
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: "bottom-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
</script>
@php
    $message = Session::get('message');

@endphp
@if ($message)
    <script>
        let message = @json($message);
        Toast.fire({
            icon: "success",
            title: message,
        });
    </script>
@endif

@if ($errors->all())
    @foreach ($errors->all() as $error)
        <script>
            let message = @json($error);
            Toast.fire({
                icon: "error",
                title: message,
            });
        </script>
    @endforeach
@endif


<!-- toaster package to display notifications with smart style -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</html>
