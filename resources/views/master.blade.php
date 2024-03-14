
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>

    <title>Forum App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />
    <link rel="shortcut icon" href="assets/user-regular-24 (1).png" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('style.css')}}"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
</head>
<body>
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css"
    integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o="
    crossorigin="anonymous"
/>
<div class="container rounded border-2">
    <div class="main-body p-0">
        <div class="inner-wrapper">
            <div class="inner-sidebar">
                @auth()
                    <div class="inner-sidebar-body p-0">
                    <div class="p-3 h-100" data-simplebar="init">
                        <div class="user_wrapper">
                            <p>Foydalanuvchi:</p>
                                <h3>{{auth()->user()->name}}</h3>
                        </div>
                        <div class="simplebar-wrapper" style="margin: -16px">
                            <div class="simplebar-height-auto-observer-wrapper">
                                <div class="simplebar-height-auto-observer"></div>
                            </div>
                            <div class="simplebar-mask">
                                <div
                                    class="simplebar-offset"
                                    style="right: 0px; bottom: 0px"
                                >
                                    <div class="simplebar-content-wrapper" >
                                        <!-- sidebar  -->
                                        <div class="simplebar-content" style="padding: 16px">
                                            <nav class="nav nav-pills nav-gap-y-1 flex-column">

                                                <a href="{{route('posts.index')}}" class="nav-link nav-link-faded  has-icon">Postlar</a>

                                                <a
                                                    href="{{route('profile.edit')}}"
                                                    class="nav-link nav-link-faded has-icon"
                                                >Profile</a><a href="{{ route('logout') }}"
                                                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                      style="display: none;">
                                                    @csrf
                                                </form>
                                                <a href="{{route('login')}}">Login</a>

                                            </nav>
                                        </div>

                                        <!-- end sidebar  -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="simplebar-track simplebar-horizontal"
                            style="visibility: hidden"
                        >
                            <div
                                class="simplebar-scrollbar"
                                style="width: 0px; display: none"
                            ></div>
                        </div>
                        <div
                            class="simplebar-track simplebar-vertical"
                            style="visibility: visible"
                        >
                            <div
                                class="simplebar-scrollbar"
                                style="
                      height: 151px;
                      display: block;
                      transform: translate3d(0px, 0px, 0px);
                    "
                            ></div>
                        </div>
                    </div>
                </div>
                @endauth
            </div>

            <div class="inner-main">
                <div class="inner-main-header">
{{--                  @auth()--}}
                        <div class="inner-sidebar-header ">
                            <button class="btn btn-outline-success has-icon " type="button" data-toggle="modal" data-target="#threadModal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus mr-2">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                NEW Post
                            </button>
                        </div>
{{--                    @endauth--}}
                    <span class="input-icon input-icon-sm ml-auto w-auto">
                        <form action="{{route('posts.index')}}" method="get">
                            @csrf
                        <input id="searchInput" name="search"  type="text" class="form-control form-control-sm bg-gray-200 border-gray-200 shadow-none mb-4 mt-4" placeholder="Search forum"/>
                        </form>
              </span>
                </div>
@yield('content')
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript">
            $("#searchInput").on('keyup', (e) => {
                e.preventDefault()
                $value = e.target.value
                $.ajax({
                    type: 'GET',
                    url: '{{route('posts.index')}}',
                    data: {'serach': $value},

                    success:(response)=>{
                        console.log(response)
                    },
                    error:(xhr)=>{
                            console.error(xhr.responseText)
                    }
                })
            })
        </script>
</body>
</html>
