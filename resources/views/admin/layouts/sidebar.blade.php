<!-- Sidebar -->
    <ul style="background-color: #32847c;" class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('admin/home') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="https://hybreathe.com/admin/Services" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-list"></i>
      <span>Services</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(5px, 56px, 0px);">
        <a class="dropdown-item" href="{!! url('/admin/addnewservice'); !!}">Add Service</a>
         <a class="dropdown-item" href="{!! url('/admin/allservices'); !!}">All Services</a>
      </div>
   </li>
<!--    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="https://hybreathe.com/admin/Services" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-question-circle"></i>
      <span>Our Products</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(5px, 56px, 0px);">
         <a class="dropdown-item" href="{!! url('/admin/addproduct'); !!}">Add Products</a>
         <a class="dropdown-item " href="{!! url('/admin/allfaq'); !!}">All Products</a>
         <a class="dropdown-item " href="{!! url('/admin/addstorecategory'); !!}">Product Category</a>
         <a class="dropdown-item " href="{!! url('/admin/addstoretags'); !!}">Product Tags</a>
      </div>
   </li> -->
<!--    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="https://hybreathe.com/admin/Services" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-question-circle"></i>
      <span>FAQ</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(5px, 56px, 0px);">
         <a class="dropdown-item" href="{!! url('/admin/addfaq'); !!}">Add FAQ</a>
         <a class="dropdown-item " href="{!! url('/admin/allfaq'); !!}">ALL FAQ</a>
      </div>
   </li> -->
   <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="https://hybreathe.com/admin/Services" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-bell"></i>
      <span>CMS</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(5px, 56px, 0px);">
         <a class="dropdown-item" href="{!! url('/admin/homepagecms'); !!}">Homepage</a>
         <!-- <a class="dropdown-item " href="{!! url('/admin/comissionpage'); !!}">Comission</a> -->
      </div>
   </li>
   <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="https://hybreathe.com/admin/Services" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-bell"></i>
      <span>Testimonials</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(5px, 56px, 0px);">
         <a class="dropdown-item" href="{!! url('/admin/addtestimonials'); !!}">Add New</a>
         <a class="dropdown-item " href="{!! url('/admin/viewtestimonials'); !!}">View All</a>
      </div>
   </li>
<!--    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="https://hybreathe.com/admin/Services" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-users"></i>
      <span>Users</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(5px, 56px, 0px);">
         <a class="dropdown-item" href="{!! url('/admin/websiteusers'); !!}">Website Users</a>
         <a class="dropdown-item " href="{!! url('/admin/adminusers'); !!}">Admin Users</a>
         <a class="dropdown-item " href="{!! url('/admin/addadminusers'); !!}">Add Admin User</a>
      </div>
   </li> -->
   <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="https://hybreathe.com/admin/Services" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-newspaper"></i>
      <span>Blogs</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(5px, 56px, 0px);">
         <a class="dropdown-item" href="{!! url('/admin/allblogs'); !!}">All Blogs</a>
         <a class="dropdown-item " href="{!! url('/admin/addblog'); !!}">Add Blogs</a>
         <a class="dropdown-item " href="{!! url('/admin/addblogcategory'); !!}">Blog Categories</a>
         <a class="dropdown-item " href="{!! url('/admin/addblogtags'); !!}">Blog Tags</a>
      </div>
   </li>
    <li class="nav-item">
      <a class="nav-link" href="{!! url('/admin/websitesettings'); !!}">
        <i class="fas fa-fw fa-cog"></i>
        <span>Site Settings</span></a>
    </li>

<!--     <li class="nav-item">
      <a class="nav-link" href="{!! url('/admin/websiteurls'); !!}">
        <i class="fas fa-fw fa-link"></i>
        <span>Website URLs</span></a>
    </li> -->
    <!--<li class="nav-item">-->
    <!--  <a class="nav-link" href="{!! url('/admin/quoterequests'); !!}">-->
    <!--    <i class="fas fa-fw fa-gift"></i>-->
    <!--    <span>Quote Requests</span> <span style="top: unset; margin-left: 20px;font-size: 16px;font-weight: 600;" class="badge badge-danger"><?php echo DB::table('bigdealsoffers')->where('status' , 1)->count(); ?></span> </a>-->
    <!--</li>-->
    <li class="nav-item">
      <a class="nav-link" href="{!! url('/admin/contactrequests'); !!}">
        <i class="fas fa-fw fa-phone"></i>
        <span>Contact Requests</span> <span style="top: unset; margin-left: 20px;font-size: 16px;font-weight: 600;" class="badge badge-danger"><?php echo DB::table('fundingrequests')->where('status' , 1)->count(); ?></span> </a>
    </li>
    <!--<li class="nav-item">-->
    <!--  <a class="nav-link" href="{!! url('/admin/leavechatbox'); !!}">-->
    <!--    <i class="fas fa-fw fa-comment-alt"></i>-->
    <!--    <span>Leave Message</span> <span style="top: unset; margin-left: 20px;font-size: 16px;font-weight: 600;" class="badge badge-danger"><?php echo DB::table('chatleavemessages')->where('readstatus' , 1)->count(); ?></span> </a>-->
    <!--</li>-->
<!--     <li class="nav-item">
      <a class="nav-link" href="{!! url('/admin/allcountries'); !!}">
        <i class="fas fa-fw fa-cog"></i>
        <span>Country List</span></a>
    </li> -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-bell"></i>
      <span>Policies</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(5px, 56px, 0px);">
         <a class="dropdown-item " href="{!! url('/admin/privacypolicyadmin'); !!}">Privacy Policy</a>
         <a class="dropdown-item"  href="{!! url('/admin/termsandconditionadmin'); !!}">Terms and Condition</a>
      </div>
   </li>
</ul>