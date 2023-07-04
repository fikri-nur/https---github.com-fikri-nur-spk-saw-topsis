<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-text mx-3">{{ __('SPK') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('admin/dashboard') || request()->is('admin/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('Dashboard') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <span>{{ __('Alternatif') }}</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}" href="{{route('alternatif.index')}}"> <i class="fa fa-user mr-2"></i> {{ __('Alternatif') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="true" aria-controls="collapseTwo">
            <span>{{ __('Kriteria') }}</span>
        </a>
        <div id="collapseProduct" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : '' }}" href="{{ route('kriteria.index') }}"> <i class="fa fa-briefcase mr-2"></i> {{ __('Kriteria') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseOrder" aria-expanded="true" aria-controls="collapseTwo">
            <span>{{ __('Perhitungan') }}</span>
        </a>
        <div id="collapseOrder" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('admin/orders') || request()->is('admin/orders/*') ? 'active' : '' }}" href="{{ route('tabel.index') }}"> <i class="fa fa-briefcase mr-2"></i> {{ __('SAW & TOPSIS') }}</a>
                <!-- <a class="collapse-item {{ request()->is('admin/orders') || request()->is('admin/orders/*') ? 'active' : '' }}" href="{{ route('matriks.index') }}"> <i class="fa fa-briefcase mr-2"></i> {{ __('Matriks Nilai') }}</a> -->
                <!-- <a class="collapse-item {{ request()->is('admin/orders') || request()->is('admin/orders/*') ? 'active' : '' }}" href="{{ route('process') }}"> <i class="fa fa-briefcase mr-2"></i> {{ __('Proses SAW TOPSIS') }}</a> -->
            </div>
        </div>
    </li>


</ul>