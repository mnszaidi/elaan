<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                @can('Admin_list')
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="{{ route('dashboard') }}" aria-expanded="false">
                        <i class="mdi mdi-av-timer"></i>
                        <span class="hide-menu">DASHBOARD</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-book-open-variant"></i>
                        <span class="hide-menu">ACADEMY </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('courses.index') }}" class="sidebar-link">
                                <i class="mdi mdi-book-open-variant"></i>
                                <span class="hide-menu">-- Courses</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('questions.index') }}" class="sidebar-link">
                                <i class="mdi mdi-book-open-variant"></i>
                                <span class="hide-menu">-- Questions</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('assignments.index') }}" class="sidebar-link">
                                <i class="mdi mdi-book-open-variant"></i>
                                <span class="hide-menu">-- Assignments</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-account-card-details"></i>
                        <span class="hide-menu">USERS </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('users.index') }}" class="sidebar-link">
                                <i class="mdi mdi-account-check"></i>
                                <span class="hide-menu">-- Users</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('roles.index') }}" class="sidebar-link">
                                <i class="mdi mdi-account-check"></i>
                                <span class="hide-menu">-- Roles</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <hr>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-settings"></i>
                        <span class="hide-menu">APPLICATION SETTINGS</span>
                    </a>
                </li>
                <hr>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-book-open-variant"></i>
                        <span class="hide-menu">ACADEMY SETTING</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('categories.index') }}" class="sidebar-link">
                                <i class="mdi mdi-puzzle"></i>
                                <span class="hide-menu">-- Categories</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('tags.index') }}" class="sidebar-link">
                                <i class="mdi mdi-puzzle"></i>
                                <span class="hide-menu">-- Tags</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('currencies.index') }}" class="sidebar-link">
                                <i class="mdi mdi-puzzle"></i>
                                <span class="hide-menu">-- Currencies</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-book-open-page-variant"></i>
                        <span class="hide-menu">Application Log</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('activities.index') }}" class="sidebar-link">
                                <i class="mdi mdi-book-open-page-variant"></i>
                                <span class="hide-menu">-- Activities</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan
                @can('User_list')
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="{{ route('home') }}" aria-expanded="false">
                        <i class="mdi mdi-av-timer"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-book-open-variant"></i>
                        <span class="hide-menu">ACADEMY </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <i class="mdi mdi-book-open-variant"></i>
                                <span class="hide-menu">-- My Courses</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <i class="mdi mdi-book-open-variant"></i>
                                <span class="hide-menu">-- My Assignments</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <i class="mdi mdi-book-open-variant"></i>
                                <span class="hide-menu">-- My Exams</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan
                @can('Teacher_list')
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="{{ route('teacher') }}" aria-expanded="false">
                        <i class="mdi mdi-av-timer"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-book-open-variant"></i>
                        <span class="hide-menu">ACADEMY </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <i class="mdi mdi-book-open-variant"></i>
                                <span class="hide-menu">-- Courses</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <i class="mdi mdi-book-open-variant"></i>
                                <span class="hide-menu">-- Questions</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <i class="mdi mdi-book-open-variant"></i>
                                <span class="hide-menu">-- Assignments</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
