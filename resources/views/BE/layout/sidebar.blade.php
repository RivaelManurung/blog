<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{url('/admin/dashboard')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="forms-elements.html">
                        <i class="bi bi-circle"></i><span>Form Elements</span>
                    </a>
                </li>
                <li>
                    <a href="forms-layouts.html">
                        <i class="bi bi-circle"></i><span>Form Layouts</span>
                    </a>
                </li>
                <li>
                    <a href="forms-editors.html">
                        <i class="bi bi-circle"></i><span>Form Editors</span>
                    </a>
                </li>
                <li>
                    <a href="forms-validation.html">
                        <i class="bi bi-circle"></i><span>Form Validation</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#categori-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Categori</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="categori-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{url('/admin/categori')}}">
                        <i class="bi bi-circle"></i><span>Categori</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/admin/categori/create')}}">
                        <i class="bi bi-circle"></i><span>Categori Create</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#artikel-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Artikel</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="artikel-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{url('/admin/artikel')}}">
                        <i class="bi bi-circle"></i><span>Artikel</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/admin/artikel/create')}}">
                        <i class="bi bi-circle"></i><span>Artikel Create</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->




    </ul>

</aside><!-- End Sidebar-->