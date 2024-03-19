{{-- Sidebar Menu --}}
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    {{-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library --}}
    <li class="nav-item">
      <a href="{{ route('home') }}" class="nav-link {{ ($page['parent'] == '') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Dashboard</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('votes') }}" class="nav-link {{ ($page['parent'] == 'votes') ? 'active' : '' }}">
        <i class="nav-icon fas fa-vote-yea"></i>
        <p>Vote Management</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('candidates') }}" class="nav-link {{ ($page['parent'] == 'candidates') ? 'active' : '' }}">
        <i class="nav-icon fas fa-fingerprint"></i>
        <p>Candidate Management</p>
      </a>
    </li>
    <li class="nav-item has-treeview {{ ($page['parent'] == 'reference-libraries') ? 'menu-open' : '' }}">
      <a href="#" class="nav-link {{ ($page['parent'] == 'reference-libraries') ? 'active' : '' }}">
        <i class="nav-icon fas fa-book"></i>
        <p>Reference Libraries<i class="right fas fa-angle-left"></i></p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('users') }}" class="nav-link {{ ($page['child'] == 'users') ? 'active' : '' }}">
            <i class="fas fa-users nav-icon"></i>
            <p>User Management</p>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</nav> {{-- /.sidebar-menu --}}