<div class="side-wrapper d-none d-lg-block">
    <div class="sidebar-menu p-3">
        <div class="sidebar-header p-0">
            <a href="#">
                <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid logo-img" alt="">
            </a>
        </div>
        <div class="siderbar-content">
            <div class="my-auto d-flex flex-column justify-content-center align-items-center gap-36">

                @php
                    $menus = AdminMenu();

                @endphp
                @forelse ($menus as $menu)
                    @php
                        $active = in_array(Route::currentRouteName(), @$menu['routes'] ?? []) ? 'nav-bar-active' : '';

                    @endphp
                    @if ($loop->index == 0)
                        <div
                            class="box-50 bg-theme-orange text-white rounded-circle d-flex justify-content-center align-items-center">
                            <span class="material-symbols-outlined">
                                {{ $menu['icon'] }}
                            </span>
                        </div>
                    @else
                        <div class="d-flex flex-column justify-content-center align-items-center gap-24">
                            <a id="{{ $menu['id'] }}"
                                class="box-50 nav-bar bg-theme-gray text-white rounded-15 d-flex justify-content-center align-items-center text-decoration-none {{ $active }}"
                                href="{{ $menu['url'] }}">
                                <span class="material-symbols-outlined">
                                    {{ $menu['icon'] }}
                                </span>
                            </a>

                        </div>
                    @endif


                @empty
                @endforelse



            </div>
        </div>
        <form id="logout" action="{{ route('logout') }}" method="post" hidden>
            @csrf
        </form>

        <div class="siderbar-footer" onclick="$('#logout').submit()" style="cursor: pointer">
            <div class="my-auto d-flex flex-column justify-content-center align-items-center gap-36">
                <div
                    class="box-50 bg-transparent text-white rounded-15 d-flex justify-content-center align-items-center">
                    <span class="material-symbols-outlined">
                        logout
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center d-lg-none position-fixed w-100 mobile-nav">
   <div class="max-width-322">
            <div class="side-wrapper-sm">
                <div class="siderbar-content">
                    <div class="my-auto d-flex justify-content-center align-items-center gap-12 p-2">
                        <a id="mobile-create-notes"
                            class="box-50 bg-theme-orange text-white rounded-circle d-flex justify-content-center align-items-center text-decoration-none cursor-pointer" href="../create-notes">
                            <span class="material-symbols-outlined">
                                add
                            </span>
                        </a>
                        <div class="d-flex justify-content-center align-items-center gap-12">
                            <a id="mobile-home" class="box-50 nav-bar bg-theme-gray text-white rounded-15 d-flex justify-content-center align-items-center text-decoration-none" href="../index">
                                <span class="material-symbols-outlined">
                                    add_home
                                </span>
                            </a>
                            <a id="mobile-my-notes" class="box-50 nav-bar bg-theme-gray text-white rounded-15 d-flex justify-content-center align-items-center text-decoration-none" href="../my-notes">
                                <span class="material-symbols-outlined">
                                    news
                                </span>
                            </a>
                            <a id="mobile-friend-list" class="box-50 nav-bar bg-theme-gray text-white rounded-15 d-flex justify-content-center align-items-center text-decoration-none" href="../friend-list">
                                <span class="material-symbols-outlined">
                                    person_celebrate
                                </span>
                            </a>
                            <a id="mobile-settings" class="box-50 nav-bar bg-theme-gray text-white rounded-15 d-flex justify-content-center align-items-center text-decoration-none" href="../settings">
                                <span class="material-symbols-outlined">
                                    settings
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
