    <!--  BEGIN SIDEBAR  -->
    <div class="sidebar-wrapper sidebar-theme">
        <nav id="sidebar">
            <div class="shadow-bottom"></div>

            <ul class="list-unstyled menu-categories" id="accordionExample">

                <li onclick="location.href='{{ route('home') }}'"
                    class="menu {{ $category_name === 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('home') }}" data-active="{{ $category_name === 'dashboard' ? 'true' : 'false' }}"
                        data-toggle="collapse" aria-expanded="{{ $category_name === 'dashboard' ? 'true' : 'false' }}"
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
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <polygon fill="#000000" opacity="0.3" points="8 21 16 21 12 16" />
                                    <path
                                        d="M17.4029496,14.5491021 L15.8599014,15.8215022 C14.9149052,14.675499 13.5137472,14 12,14 C10.4912085,14 9.09418404,14.6710418 8.14910121,15.8106159 L6.60963188,14.533888 C7.93073905,12.9409064 9.88958759,12 12,12 C14.1173586,12 16.0819686,12.9471394 17.4029496,14.5491021 Z M20.4681628,11.9788888 L18.929169,13.2561898 C17.2286725,11.2072964 14.7140097,10 12,10 C9.28974232,10 6.77820732,11.2039334 5.07766256,13.2479685 L3.54017812,11.968851 C5.61676443,9.47281829 8.68922234,8 12,8 C15.3153667,8 18.3916375,9.47692603 20.4681628,11.9788888 Z M23.2904427,9.72048884 L21.678507,10.9044074 C19.4302828,7.84339199 15.8698431,6 12,6 C8.0766912,6 4.47282622,7.89509192 2.2325887,11.0270624 L0.605887503,9.86351476 C3.21772389,6.21202937 7.42430358,4 12,4 C16.5132783,4 20.6693179,6.15175957 23.2904427,9.72048884 Z"
                                        fill="#000000" fill-rule="nonzero" />
                                </g>
                            </svg>
                            <span>@lang('common.smart_decisions')</span>
                        </div>
                    </a>
                </li>


                <li onclick="location.href='{{ route('home') }}'"
                    class="menu {{ $category_name === 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('home') }}" data-active="{{ $category_name === 'dashboard' ? 'true' : 'false' }}"
                        data-toggle="collapse" aria-expanded="{{ $category_name === 'dashboard' ? 'true' : 'false' }}"
                        class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path
                                        d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <path
                                        d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                        fill="#000000" fill-rule="nonzero" />
                                </g>
                            </svg>
                            <span>@lang('common.customers')</span>
                        </div>
                    </a>
                </li>


                <li onclick="location.href='{{ route('home') }}'"
                    class="menu {{ $category_name === 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('home') }}" data-active="{{ $category_name === 'dashboard' ? 'true' : 'false' }}"
                        data-toggle="collapse" aria-expanded="{{ $category_name === 'dashboard' ? 'true' : 'false' }}"
                        class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path
                                        d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <path
                                        d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                        fill="#000000" fill-rule="nonzero" />
                                </g>
                            </svg>
                            <span>@lang('common.service-providers')</span>
                        </div>
                    </a>
                </li>


                <li class="menu {{ $category_name === 'locations' ? 'active' : '' }}">
                    <a href="#locations" data-active="{{ $category_name === 'locations' ? 'true' : 'false' }}"
                        data-toggle="collapse" aria-expanded="{{ $category_name === 'locations' ? 'true' : 'false' }}"
                        class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M12,21 C7.02943725,21 3,16.9705627 3,12 C3,7.02943725 7.02943725,3 12,3 C16.9705627,3 21,7.02943725 21,12 C21,16.9705627 16.9705627,21 12,21 Z M14.1654881,7.35483745 L9.61055177,10.3622525 C9.47921741,10.4489666 9.39637436,10.592455 9.38694497,10.7495509 L9.05991526,16.197949 C9.04337012,16.4735952 9.25341309,16.7104632 9.52905936,16.7270083 C9.63705011,16.7334903 9.74423017,16.7047714 9.83451193,16.6451626 L14.3894482,13.6377475 C14.5207826,13.5510334 14.6036256,13.407545 14.613055,13.2504491 L14.9400847,7.80205104 C14.9566299,7.52640477 14.7465869,7.28953682 14.4709406,7.27299168 C14.3629499,7.26650974 14.2557698,7.29522855 14.1654881,7.35483745 Z"
                                        fill="#000000" />
                                </g>
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
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"></rect>
                                    <path
                                        d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                        fill="#000000" opacity="0.3"></path>
                                </g>
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





                <li class="menu {{ $category_name === 'reports' ? 'active' : '' }}">
                    <a href="#reports" data-active="{{ $category_name === 'reports' ? 'true' : 'false' }}"
                        data-toggle="collapse" aria-expanded="{{ $category_name === 'reports' ? 'true' : 'false' }}"
                        class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                        fill="#000000" opacity="0.3" />
                                    <path
                                        d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                        fill="#000000" />
                                </g>
                            </svg>
                            <span>@lang('common.reports')</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>

                    <ul class="collapse submenu list-unstyled {{ $category_name === 'reports' ? 'show' : '' }}"
                        id="reports" data-parent="#accordionExample">
                        <li class="{{ $page_name === 'main_service' ? 'active' : '' }}">
                            <a href="{{ route('mainServices.index') }}"> @lang('common.main_service') </a>
                        </li>
                        <li class="{{ $page_name === 'category' ? 'active' : '' }}">
                            <a href="{{ route('categories.index') }}"> @lang('common.categories') </a>
                        </li>
                        <li class="{{ $page_name === 'required_work' ? 'active' : '' }}">
                            <a href="{{ route('requiredWorks.index') }}"> @lang('common.orders') </a>
                        </li>
                    </ul>


                </li>



                <li class="menu {{ $category_name === 'wallet' ? 'active' : '' }}">
                    <a href="#wallet" data-active="{{ $category_name === 'wallet' ? 'true' : 'false' }}"
                        data-toggle="collapse" aria-expanded="{{ $category_name === 'wallet' ? 'true' : 'false' }}"
                        class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <rect fill="#000000" opacity="0.3" x="2" y="2" width="10" height="12" rx="2" />
                                    <path
                                        d="M4,6 L20,6 C21.1045695,6 22,6.8954305 22,8 L22,20 C22,21.1045695 21.1045695,22 20,22 L4,22 C2.8954305,22 2,21.1045695 2,20 L2,8 C2,6.8954305 2.8954305,6 4,6 Z M18,16 C19.1045695,16 20,15.1045695 20,14 C20,12.8954305 19.1045695,12 18,12 C16.8954305,12 16,12.8954305 16,14 C16,15.1045695 16.8954305,16 18,16 Z"
                                        fill="#000000" />
                                </g>
                            </svg>
                            <span>@lang('common.wallet')</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>

                    <ul class="collapse submenu list-unstyled {{ $category_name === 'wallet' ? 'show' : '' }}"
                        id="wallet" data-parent="#accordionExample">
                        <li class="{{ $page_name === 'main_service' ? 'active' : '' }}">
                            <a href="{{ route('mainServices.index') }}"> @lang('common.main_service') </a>
                        </li>
                        <li class="{{ $page_name === 'category' ? 'active' : '' }}">
                            <a href="{{ route('categories.index') }}"> @lang('common.categories') </a>
                        </li>
                        <li class="{{ $page_name === 'required_work' ? 'active' : '' }}">
                            <a href="{{ route('requiredWorks.index') }}"> @lang('common.orders') </a>
                        </li>
                    </ul>
                </li>


                <li onclick="location.href='{{ route('home') }}'"
                    class="menu {{ $category_name === 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('home') }}" data-active="{{ $category_name === 'dashboard' ? 'true' : 'false' }}"
                        data-toggle="collapse" aria-expanded="{{ $category_name === 'dashboard' ? 'true' : 'false' }}"
                        class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                                        fill="#000000" opacity="0.3" />
                                    <path
                                        d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                                        fill="#000000" />
                                    <rect fill="#000000" opacity="0.3" x="7" y="10" width="5" height="2" rx="1" />
                                    <rect fill="#000000" opacity="0.3" x="7" y="14" width="9" height="2" rx="1" />
                                </g>
                            </svg>
                            <span>@lang('common.invoices')</span>
                        </div>
                    </a>
                </li>

                
                <li onclick="location.href='{{ route('home') }}'"
                    class="menu {{ $category_name === 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('home') }}" data-active="{{ $category_name === 'dashboard' ? 'true' : 'false' }}"
                        data-toggle="collapse" aria-expanded="{{ $category_name === 'dashboard' ? 'true' : 'false' }}"
                        class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M17.2718029,8.68536757 C16.8932864,8.28319382 16.9124644,7.65031935 17.3146382,7.27180288 C17.7168119,6.89328641 18.3496864,6.91246442 18.7282029,7.31463817 L22.7282029,11.5646382 C23.0906029,11.9496882 23.0906029,12.5503176 22.7282029,12.9353676 L18.7282029,17.1853676 C18.3496864,17.5875413 17.7168119,17.6067193 17.3146382,17.2282029 C16.9124644,16.8496864 16.8932864,16.2168119 17.2718029,15.8146382 L20.6267538,12.2500029 L17.2718029,8.68536757 Z M6.72819712,8.6853647 L3.37324625,12.25 L6.72819712,15.8146353 C7.10671359,16.2168091 7.08753558,16.8496835 6.68536183,17.2282 C6.28318808,17.6067165 5.65031361,17.5875384 5.27179713,17.1853647 L1.27179713,12.9353647 C0.909397125,12.5503147 0.909397125,11.9496853 1.27179713,11.5646353 L5.27179713,7.3146353 C5.65031361,6.91246155 6.28318808,6.89328354 6.68536183,7.27180001 C7.08753558,7.65031648 7.10671359,8.28319095 6.72819712,8.6853647 Z" fill="#000000" fill-rule="nonzero"/>
                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-345.000000) translate(-12.000000, -12.000000) " x="11" y="4" width="2" height="16" rx="1"/>
                                </g>
                            </svg>
                            <span>@lang('common.promo_code')</span>
                        </div>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
