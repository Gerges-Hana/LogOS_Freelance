@php
    $configData = Helper::appClasses();
@endphp

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <!-- ! Hide app brand if navbar-full -->
    @if (!isset($navbarFull))
        <div class="app-brand demo">
            <a href="{{ url('/') }}" class="app-brand-link w-100">
                {{-- <span class="app-brand-logo demo"> --}}
                {{-- @include('_partials.macros',["height"=>20]) --}}
                <img class="app-brand-logo demo w-75 m-auto h-50 p-3" src="{{ asset('assets/img/admin/basic-file.png') }}"
                    alt="">

                {{-- </span> --}}
                {{-- <span class="app-brand-text demo menu-text fw-bold">gerges</span> --}}
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
            </a>
        </div>
    @endif


    <div class="menu-inner-shadow "></div>

    <ul class="menu-inner py-1">

        <br>
        @can('الرئسيه')
            <li class="menu-item ">
                <a href="{{ route('dashboard') }}" class="menu-link ">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div>الرئسيه</div>
                </a>
            </li>
        @endcan
        @can('Admin')
            <li class="menu-item ">
                <a href="{{ route('adminPanelSetting.show', 1) }}" class="menu-link ">
                    <i class="menu-icon tf-icons ti ti-users"></i>
                    <div>Admin</div>
                </a>
            </li>
        @endcan
        @can('الفروع')
            <li class="menu-item ">
                <a href="{{ route('branch.index') }}" class="menu-link ">
                    <i class="menu-icon tf-icons ti ti-map"></i>
                    <div>الفروع</div>

                </a>
            </li>
        @endcan
        @can('فئات الاصناف')
            <li class="menu-item ">
                <a href="{{ route('itemcard_categories.index') }}" class="menu-link ">
                    <i class="menu-icon tf-icons ti ti-layout-grid"></i>
                    <div> فئات الاصناف</div>

                </a>
            </li>
        @endcan
        @can('الاصناف')
            <li class="menu-item ">
                <a href="{{ route('itemcard.index') }}" class="menu-link ">
                    <i class="menu-icon tf-icons ti ti-lifebuoy"></i>
                    <div>الاصناف </div>

                </a>
            </li>
        @endcan
        @can('فئات المصاريف')
            <li class="menu-item ">
                <a href="{{ route('outlay_categori.index') }}" class="menu-link ">
                    <i class="menu-icon tf-icons ti ti-forms"></i>
                    <div>فئات المصاريف </div>

                </a>
            </li>
        @endcan
        @can('جدول المصاريف')
            <li class="menu-item ">
                <a href="{{ route('outlay.index') }}" class="menu-link ">
                    <i class="menu-icon tf-icons ti ti-file-description"></i>
                    <div> جدول المصاريف</div>

                </a>
            </li>
        @endcan
        @can('فئات الاسعار')
            <li class="menu-item ">
                <a href="{{ route('priceCategory.index') }}" class="menu-link ">
                    <i class="menu-icon tf-icons ti ti-chart-pie"></i>
                    <div>فئات الاسعار</div>

                </a>
            </li>
        @endcan
        @can('الطلبيات')
            <li class="menu-item ">
                <a href="{{ route('orders.index') }}" class="menu-link ">
                    <i class="menu-icon tf-icons ti ti-truck"></i>
                    <div>الطلبيات </div>

                </a>
            </li>
        @endcan
        @can('جدول المبيعات')
            <li class="menu-item ">
                <a href=" {{ route('sales.index') }} " class="menu-link ">
                    <i class="menu-icon tf-icons ti ti-file-description"></i>
                    <div>جدول المبيعات </div>
                </a>
            </li>
        @endcan
        @can('المستخدمين')
            <li class="menu-item ">
                <a href=" {{ route('users.index') }} " class="menu-link ">
                    <i class="menu-icon tf-icons ti ti-file-description"></i>
                    <div> المستخدمين </div>
                </a>
            </li>
        @endcan
        {{-- @can('الصلاحيات') --}}
        <li class="menu-item ">
            <a href=" {{ route('roles.index') }} " class="menu-link ">
                <i class="menu-icon tf-icons ti ti-file-description"></i>
                <div> الصلاحيات </div>
            </a>
        </li>
        {{-- @endcan --}}






    </ul>

</aside>
