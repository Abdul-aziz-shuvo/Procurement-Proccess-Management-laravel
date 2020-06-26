<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{url('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="{{url('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
          <a href="{{route('admin.dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          @if (Auth::user()->role == 'buyer')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Product
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a  href="{{route('product.all')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Product</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                procurement request
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a  href="{{route('procurement.all')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>add request</p>
                </a>
              </li>
              <li class="nav-item">
              <a  href="{{route('procurements.show')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All request</p>
                </a>
              </li>
              <li class="nav-item">
              <a  href="{{route('procurements.bid')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Supplires bid</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          @if (Auth::user()->role == 'supplier')
          <li class="nav-item has-treeview">
          <a href="{{route('supplier.index')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Buyer Request
              </p>
            </a>
           
          </li>
          @endif

          <li class="nav-item has-treeview">
          
             
              <form id="logout-form" action="{{ route('logout') }}"   method="POST" >
                @csrf
                <button type="Submit" style="border: none; background-color:#007bff;color:white;padding:0 20px" >Logout</button>
            </form>
             
         
            
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>