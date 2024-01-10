<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <span class="brand-text font-weight-light">Append</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        
          <li class="nav-item">
            <a href="{{ route('admin.posts.index') }}" class="nav-link">
              <p>Posts</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.post-categories.index') }}" class="nav-link">
              <p>Post categories</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.tags.index') }}" class="nav-link">
              <p>Tags</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.projects.index') }}" class="nav-link">
              <p>Projects</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.project-categories.index') }}" class="nav-link">
              <p>Project categories</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{ route('admin.clients.index') }}" class="nav-link">
              <p>Clients</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.services.index') }}" class="nav-link">
              <p>Services</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.features.index') }}" class="nav-link">
              <p>Features</p>
            </a>
          </li>

          

          <li class="nav-item">
            <a href="{{ route('admin.questions.index') }}" class="nav-link">
              <p>Questions</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.testimonials.index') }}" class="nav-link">
              <p>Testimonials</p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>