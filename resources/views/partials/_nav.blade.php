<aside class="app-side" id="app-side">
    <!-- BEGIN .side-content -->
    <div class="side-content ">
        <!-- BEGIN .user-profile -->
        <div class="user-profile">
            <img src="{{ asset('img/user.png') }}" class="profile-thumb" alt="User Thumb">
            <h6 class="profile-name">Yuki Hayashi</h6>
            <ul class="profile-actions">
                <li>
                    <a href="#">
                        <i class="icon-social-skype"></i>
                        <span class="count-label red"></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-social-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="login.html">
                        <i class="icon-export"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- END .user-profile -->
        <!-- BEGIN .side-nav -->

        <nav class="side-nav">
            <!-- BEGIN: side-nav-content -->
            <ul class="unifyMenu" id="unifyMenu">
                <li class="active selected">
                    <a href="#" class="has-arrow" aria-expanded="false">
                        <span class="has-icon">
                            <i class="icon-profile-male"></i>
                        </span>
                        <span class="nav-title">Dashboards</span>
                    </a>
                    <ul aria-expanded="false" class="collapse in">
                        <li>
                            <a href='{{ route("AllStudents") }}'>Students</a>
                        </li>
                        <li>
                            <a href='{{ route("StudentCourseGrades") }}'>Students Total Grades</a>
                        </li>
                        <li>
                            <a href='{{ route("StudentCourseIndex") }}'>Courses</a>
                        </li>
                        <li>
                            <a href='{{ route("ExportPDF") }}'>Export To PDF</a>
                        </li>

                    </ul>
                </li>
            </ul>
            <!-- END: side-nav-content -->
        </nav>



        <!-- END: .side-nav -->
    </div>
    <!-- END: .side-content -->
</aside>



