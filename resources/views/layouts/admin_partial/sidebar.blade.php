<?php
$setting = DB::table('settings')->first();
?>



<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a style="text-decoration:none" href="index3.html" class="brand-link">
      <img src="{{ url($setting->favicon) }}" class="brand-image img-circle elevation-3" style="opacity: .8;">
      <span class="brand-text font-weight-light">SRS Ecommerce</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://www.w3schools.com/w3images/avatar6.png" class="img-circle elevation-2" >
        </div>
        <div class="info">
          <a style="text-decoration:none" href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <!-- //romove menu-open -->
          <li class="nav-item ">
            <a href="{{ route('admin.home') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard

              </p>
            </a>

          </li>
          
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Category
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('category.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('subcategory.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sub Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('childcategory.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Child Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('brand.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brand</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('warehouse.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Warehouse</p>
                </a>
              </li>

            </ul>
          </li>
          </li>




          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Product
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('product.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('product.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Product</p>
                </a>
              </li>
            

            </ul>
          </li>
          </li>




          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Offer
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('coupon.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Coupon</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('campaign.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>E Campaign</p>
                </a>
              </li>

              
            </ul>
          </li>
          </li>



          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Orders
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.order.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Orders</p>
                </a>
              </li>
              
            </ul>
          </li>
          </li>



          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Blogs
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('admin.blog.category') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.blog.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blog</p>
                </a>
              </li>
              
            </ul>
          </li>
          </li>




          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Pickup Point
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('pickuppoint.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pickup Point</p>
                </a>
              </li>
          
              
            </ul>
          </li>
          </li>

          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Ticket
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('ticket.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ticket</p>
                </a>
              </li>
          
              
            </ul>
          </li>
          </li>


          
          
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Contact Message
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('pickuppoint.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact Message</p>
                </a>
              </li>
          
              
            </ul>
          </li>
          </li>



          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Reports
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('pickuppoint.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Order Reports</p>
                </a>
              </li>
              
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('pickuppoint.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer Reports</p>
                </a>
              </li>
              
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('pickuppoint.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stock Reports</p>
                </a>
              </li>
              
            </ul>


            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('pickuppoint.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Reports</p>
                </a>
              </li>
              
            </ul>


            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('pickuppoint.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ticket Reports</p>
                </a>
              </li>
              
            </ul>


          </li>
          </li>




          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('seo.setting') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SEO Setting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('website.setting') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Website Setting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('page.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Page Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('smtp.setting') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SMTP Setting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('payment.getway') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Payment Getway</p>
                </a>
              </li>
            </ul>
          </li>
          </li>


          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                User Role
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('seo.setting') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create New Role</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('website.setting') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Role</p>
                </a>
              </li>
             
            </ul>
          </li>
          </li>


          

         
          <li class="nav-header">PROFILE</li>

          <li class="nav-item">
            <a href="{{ route('admin.password.change') }}" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p class="text">Password Change</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{ route('admin.logout') }}" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Logout</p>
            </a>
          </li>
  
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>