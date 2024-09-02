<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>{{ $data['title'] ?? env('APP_NAME') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="{{ env('APP_NAME') }}" name="description" />
        <meta content="{{ env('APP_AUTHOR') }}" name="author" />
        <meta content="aldhi-albadri" name="linkedin.com" />
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/toastr/build/toastr.min.css') }}">
        @yield('style')
        @stack('push-style')
        <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/mine/google.font.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/mine/style.css') }}" rel="stylesheet" type="text/css" />
        @livewireStyles

        <script>
            function initSearchCol(table,headerId,inputClass){
                $(headerId).on('keyup', '.'+inputClass,function () {
                    table.column( $(this).parent().index() ).search( this.value ).draw(false);
                });

                $(headerId).on('change', '.'+inputClass,function () {
                    table.column( $(this).parent().index() ).search( this.value ).draw();
                });
            }
        </script>

    </head>

    <body data-sidebar="dark">
        <div class="loading"><div class="loader"></div></div>

        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                @livewire('components.top-menu')
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        {{-- @include('components.layouts.menu') --}}
                        @livewire('components.main-menu')
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
                <!-- End Page-content -->


                <div>
                    <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6">
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script> © SIGODAM.
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-sm-right d-none d-sm-block">
                                        Build by Developer Team
                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->



        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/toastr/build/toastr.min.js') }}"></script>
        @yield('script')
        @stack('push-script')
        <script src="{{ asset('assets/js/app.js') }}"></script>
        <script src="{{ asset('assets/mine/script.js') }}"></script>
        @livewireScripts
    </body>
</html>
