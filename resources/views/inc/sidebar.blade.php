    <!--  BEGIN SIDEBAR  -->
    <div class="sidebar-wrapper sidebar-theme">
        <nav id="sidebar">
            <div class="shadow-bottom"></div>

            <ul class="list-unstyled menu-categories" id="accordionExample">

                    <li onclick="location.href='{{ route('home') }}'"
                        class="menu {{ $category_name === 'dashboard' ? 'active' : '' }}">
                        <a href="{{ route('home') }}"
                            data-active="{{ $category_name === 'dashboard' ? 'true' : 'false' }}" data-toggle="collapse"
                            aria-expanded="{{ $category_name === 'dashboard' ? 'true' : 'false' }}"
                            class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                <span>@lang('common.dashboard')</span>
                            </div>
                        </a>
                    </li>

                    <li onclick="location.href='{{ route('smartDecisions') }}'"
                        class="menu {{ $category_name === 'smartDecisions' ? 'active' : '' }}">
                        <a href="{{ route('home') }}"
                            data-active="{{ $category_name === 'smartDecisions' ? 'true' : 'false' }}"
                            data-toggle="collapse"
                            aria-expanded="{{ $category_name === 'smartDecisions' ? 'true' : 'false' }}"
                            class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-layout">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="3" y1="9" x2="21" y2="9"></line>
                                    <line x1="9" y1="21" x2="9" y2="9"></line>
                                </svg>
                                <span>@lang('common.smart_decisions')</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu {{ $category_name === 'locations' ? 'active' : '' }}">
                        <a href="#locations" data-active="{{ $category_name === 'locations' ? 'true' : 'false' }}"
                            data-toggle="collapse" aria-expanded="{{ $category_name === 'locations' ? 'true' : 'false' }}"
                            class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map">
                                    <polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon>
                                    <line x1="8" y1="2" x2="8" y2="18"></line>
                                    <line x1="16" y1="6" x2="16" y2="22"></line>
                                </svg>
                                <span>@lang('common.locations')</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ $category_name === 'locations' ? 'show' : '' }}"
                            id="locations" data-parent="#accordionExample">
                            <li class="{{ $page_name === 'country' ? 'active' : '' }}">
                                <a href="{{ route('countries.index') }}"> @lang('common.countries') </a>
                            </li>
                            <li class="{{ $page_name === 'city' ? 'active' : '' }}">
                                <a href="{{ route('cities.index') }}"> @lang('common.cities') </a>
                            </li>
                        </ul>
                    </li>



                    <li class="menu {{ $category_name === 'services' ? 'active' : '' }}">
                        <a href="#services" data-active="{{ $category_name === 'services' ? 'true' : 'false' }}"
                            data-toggle="collapse" aria-expanded="{{ $category_name === 'services' ? 'true' : 'false' }}"
                            class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map">
                                    <polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon>
                                    <line x1="8" y1="2" x2="8" y2="18"></line>
                                    <line x1="16" y1="6" x2="16" y2="22"></line>
                                </svg>
                                <span>@lang('common.services')</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ $category_name === 'services' ? 'show' : '' }}"
                            id="services" data-parent="#accordionExample">
                            <li class="{{ $page_name === 'main_service' ? 'active' : '' }}">
                                <a href="{{ route('mainServices.index') }}"> @lang('common.main_service') </a>
                            </li>
                           <li class="{{ $page_name === 'category' ? 'active' : '' }}">
                                <a href="{{ route('categories.index') }}"> @lang('common.categories') </a>
                            </li>
                            <li class="{{ $page_name === 'required_work' ? 'active' : '' }}">
                                <a href="{{ route('requiredWorks.index') }}"> @lang('common.required_works') </a>
                            </li>
                        </ul>
                    </li>
            </ul>
        </nav>
    </div>
