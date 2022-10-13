<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <link href="{{ asset('assets/dist/images/logo.svg') }}" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Techarea HR</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{ asset('assets/dist/css/app.css') }}" />
        <!-- END: CSS Assets-->
</head>
<body class="py-5">
        <!-- ======= Sidebar ======= -->
            <!-- BEGIN: Top Bar -->
        <div class="border-b border-white/[0.08] -mt-10 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 pt-3 md:pt-0 mb-10">
            <div class="top-bar-boxed flex items-center">
                <!-- BEGIN: Logo -->
                <a href="" class="-intro-x hidden md:flex">
                    <img class="w-6" src="{{ asset('assets/dist/images/logo.png') }}">
                    <span class="text-white text-lg ml-3"> Techarea </span>
                </a>
                <!-- END: Logo -->
                <!-- BEGIN: Breadcrumb -->
                <nav aria-label="breadcrumb" class="-intro-x h-full mr-auto">
                    <ol class="breadcrumb breadcrumb-light">
                        <li class="breadcrumb-item"><a href="">Absensi Karyawan</a></li>
                    </ol>
                </nav>
                <!-- END: Breadcrumb -->
                {{-- search --}}
                <div class="search hidden sm:block sm:mr-6">
                    <input type="text" class="search__input form-control border-transparent" placeholder="Search...">
                    <i data-lucide="search" class="search__icon dark:text-slate-500"></i>
                </div>
                <!-- BEGIN: Notifications -->
                <div class="intro-x dropdown mr-4 sm:mr-6">
                    <div class="dropdown-toggle notification notification--light notification--bullet cursor-pointer" role="button" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="bell" class="notification__icon dark:text-slate-500"></i> </div>
                    <div class="notification-content pt-2 dropdown-menu">
                        <div class="notification-content__box dropdown-content">
                            <div class="notification-content__title">Notifications</div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="{{ asset('assets/dist/images/profile-12.jpg') }}">
                                    <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Kevin Spacey</a>
                                        <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">05:09 AM</div>
                                    </div>
                                    <div class="w-full truncate text-slate-500 mt-0.5">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Notifications -->
                <!-- BEGIN: Account Menu -->
                <div class="intro-x dropdown w-8 h-8">
                    <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                        <img alt="Midone - HTML Admin Template" src="{{ asset('assets/dist/images/profile.jpg') }}">
                    </div>
                    <div class="dropdown-menu w-56">
                        <ul class="dropdown-content bg-primary/80 before:block before:absolute before:bg-black before:inset-0 before:rounded-md before:z-[-1] text-white">
                            <li class="p-2">
                                <div class="font-medium">Admin</div>
                                <div class="text-xs text-white/60 mt-0.5 dark:text-slate-500">Techarea Admin</div>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" class="dropdown-item hover:bg-white/5"> <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END: Account Menu -->
            </div>
        </div>
        <!-- END: Top Bar -->
        <!-- BEGIN: Top Menu -->
        <nav class="top-nav">
            <ul>
                <li>
                    <a href="/layouts" class="top-menu">
                        <div class="top-menu__icon"> <i data-lucide="home"></i> </div>
                        <div class="top-menu__title"> Dashboard <i data-lucide="" class="top-menu__sub-icon"></i> </div>
                    </a>
                </li>
                <li>
                    <a href="/absensi" class="top-menu">
                        <div class="top-menu__icon"> <i data-lucide="box"></i> </div>
                        <div class="top-menu__title"> Absensi <i data-lucide="" class="top-menu__sub-icon"></i> </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="top-menu top-menu--active">
                        <div class="top-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="top-menu__title"> Jabatan <i data-lucide="chevron-down" class="top-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="/pekerjaans" class="top-menu">
                                <div class="top-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="top-menu__title"> Menu <i data-lucide="" class="top-menu__sub-icon"></i> </div>
                            </a>
                            <a href="/pekerjaans/create" class="top-menu">
                                <div class="top-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="top-menu__title"> Tambah <i data-lucide="" class="top-menu__sub-icon"></i> </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="top-menu">
                        <div class="top-menu__icon"> <i data-lucide="inbox"></i> </div>
                        <div class="top-menu__title"> Data Karyawan <i data-lucide="chevron-down" class="top-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="/posts" class="top-menu">
                                <div class="top-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="top-menu__title"> Menu <i data-lucide="" class="top-menu__sub-icon"></i> </div>
                            </a>
                            <a href="/posts/create" class="top-menu">
                                <div class="top-menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="top-menu__title"> Tambah <i data-lucide="" class="top-menu__sub-icon"></i> </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="" class="top-menu">
                        <div class="top-menu__icon"> <i data-lucide="hard-drive"></i> </div>
                        <div class="top-menu__title"> Rekap Absensi <i class="top-menu__sub-icon"></i> </div>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- END: Top Menu -->
        <div class="content">
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            </div>
        <div>
    @yield('container')

  </div>




  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="{{ asset('assets/dist/js/app.js') }}"></script>
        <!-- END: JS Assets-->
</body>
</html>
