<div>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <h2 class="m-0" style="font-weight: bolder;"> {{ config('app.name', 'Laravel') }} </h2>
            </a>
            <button class="btn btn-outline-light" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" style="font-weight: bolder;">
                功能選單
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto"></ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    <h5 class="m-0">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="{{ route('admin') }}"
                           role="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                 class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"></path>
                                <path fill-rule="evenodd"
                                      d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"></path>
                            </svg>
                            {{ Auth::user()->name }} 管理員<span class="caret"></span>
                        </a>
                    </h5>

                    <a class="btn btn-success" href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">登出</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
    </nav>

    <div class="offcanvas offcanvas-start bg-body-tertiary" tabindex="-1" id="offcanvasExample"
         aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header bg-primary-subtle">
            <h4 class="offcanvas-title" id="offcanvasExampleLabel">管理員選單</h4>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
        </div>
        <div class="offcanvas-body list-group">
            <a class="list-group-item list-group-item-action list-group-item-primary p-3 border-0 mb-2 rounded"
               aria-current="page" href="{{route('admin.item-info')}}">
                <h5 class="m-0" style="font-weight: bolder;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                         class="bi bi-people-fill" viewBox="0 0 16 16">
                        <path
                            d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"></path>
                    </svg>
                    鹿角蕨管理
                </h5>
            </a>
        </div>
    </div>
</div>
