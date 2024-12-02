        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">


            <!-- Sidebar -->
            <div class="sidebar">
                <ul class="nav nav-pills nav-sidebar flex-column pt-3" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{ route('admin.main.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Main</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.user.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Users</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.post.index') }}" class="nav-link">
                            <i class="nav-icon far fa-clipboard"></i>
                            <p>Post</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.category.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-th-list"></i>
                            <p>Category</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.tag.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>Tags</p>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- /.sidebar -->
        </aside>
