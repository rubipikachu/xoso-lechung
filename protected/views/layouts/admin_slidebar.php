<div id="sidebar" class="nav-collapse collapse">
    <div class="sidebar-toggler hidden-phone">
    </div>
    <div class="navbar-inverse">
      <form class="navbar-search visible-phone" />
        <div class="search-input-area">
            <input id=" " class="search-query" type="text" placeholder="Tìm kiếm">
            <i class="icon-search">
            </i>
        </div>
    </form>
  </div>
  <ul class="sidebar-menu">
    <li>
      <a class="" href="<?php echo $this->createAbsoluteUrl("/admincp"); ?>">
        <span class="icon-box">
          <i class="icon-dashboard">
          </i>
        </span>
        Bảng điều khiển
      </a>
    </li>
    <li class="has-sub">
      <a href="javascript:;" class="">
        <span class="icon-box">
          <i class="icon-book">
          </i>
        </span>
        Bài viết 
        <span class="arrow">
        </span>
      </a>
      <ul class="sub">
        <li>
          <a class="" href="<?php echo $this->createAbsoluteUrl("/adminpost"); ?>">
            Danh sách bài viết
          </a>
        </li>
        <li>
          <a class="" href="<?php echo $this->createAbsoluteUrl("/adminpost/default/create"); ?>">
            Thêm bài viết
          </a>
        </li>
        <li>
          <a class="" href="<?php echo $this->createAbsoluteUrl("/adminpost/category"); ?>">
            Danh mục bài viết
          </a>
        </li>
        <li>
          <a class="" href="<?php echo $this->createAbsoluteUrl("/adminpost/category/create"); ?>">
            Thêm danh mục
          </a>
        </li>
      </ul>
    </li>
    <li class="has-sub">
      <a href="javascript:;" class="">
        <span class="icon-box">
          <i class="icon-cogs">
          </i>
        </span>
        Kết quả xổ số
        <span class="arrow">
        </span>
      </a>
      <ul class="sub">
        <li>
          <a class="" href="<?php echo $this->createAbsoluteUrl("/kqxs"); ?>">
            Danh sách kqxs
          </a>
        </li>
      </ul>
    </li>
    <li class="has-sub">
      <a href="javascript:;" class="">
        <span class="icon-box">
          <i class="icon-cogs">
          </i>
        </span>
        Cấu hình 
        <span class="arrow">
        </span>
      </a>
      <ul class="sub">
        <li>
          <a class="" href="<?php echo $this->createAbsoluteUrl("/adminglobal"); ?>">
            Cấu hình site
          </a>
        </li>
        <li>
          <a class="" href="<?php echo $this->createAbsoluteUrl("/adminglobal/default/mail"); ?>">
            Cấu hình gửi mail
          </a>
        </li>
      </ul>
    </li>
    <li class="has-sub">
      <a href="javascript:;" class="">
        <span class="icon-box">
          <i class="icon-cogs">
          </i>
        </span>
        Người dùng 
        <span class="arrow">
        </span>
      </a>
      <ul class="sub">
        <li>
          <a class="" href="<?php echo $this->createAbsoluteUrl("/adminuser"); ?>">
            Danh sách người dùng
          </a>
        </li>
        <li>
          <a class="" href="<?php echo $this->createAbsoluteUrl("/adminuser/default/adduser"); ?>">
            Thêm người dùng
          </a>
        </li>
        <li>
          <a class="" href="<?php echo $this->createAbsoluteUrl("/adminuser/default/permission"); ?>">
            Danh sách quyền
          </a>
        </li>
        <li>
          <a class="" href="<?php echo $this->createAbsoluteUrl("/adminuser/default/createpermission"); ?>">
            Thêm quyền
          </a>
        </li>
      </ul>
    </li>
  </ul>
</div>