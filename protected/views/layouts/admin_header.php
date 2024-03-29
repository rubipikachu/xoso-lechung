<div id="header" class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container-fluid">
      <a class="brand" href="<?php echo Yii::app()->homeUrl ?>admin/index.html">
        <img src="<?php echo Yii::app()->homeUrl ?>admin/img/logo.png" alt="TONY Admin" />
      </a>
      <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar">
        </span>
        <span class="icon-bar">
        </span>
        <span class="icon-bar">
        </span>
        <span class="arrow">
        </span>
      </a>
      <div class="top-nav ">
        <ul class="nav pull-right top-menu">
          <li class="dropdown" id="header_inbox_bar" style="padding-top: 5px;">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="icon-envelope-alt">
              </i>
              <span class="badge badge-important">
                5
              </span>
            </a>
            <ul class="dropdown-menu extended inbox">
              <li>
                <p>
                  You have 5 new messages
                </p>
              </li>
              <li>
                <a href="#">
                  <span class="photo">
                    <img src="<?php echo Yii::app()->homeUrl ?>admin/img/avatar-mini.png" alt="avatar" />
                  </span>
                  <span class="subject">
                    <span class="from">
                      Dulal Khan
                    </span>
                    <span class="time">
                      Just now
                    </span>
                  </span>
                  <span class="message">
                    Hello, this is an example messages please check 
                  </span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="photo">
                    <img src="<?php echo Yii::app()->homeUrl ?>admin/img/avatar-mini.png" alt="avatar" />
                  </span>
                  <span class="subject">
                    <span class="from">
                      Rafiqul Islam
                    </span>
                    <span class="time">
                      10 mins
                    </span>
                  </span>
                  <span class="message">
                    Hi, Mosaddek Bhai how are you ? 
                  </span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="photo">
                    <img src="<?php echo Yii::app()->homeUrl ?>admin/img/avatar-mini.png" alt="avatar" />
                  </span>
                  <span class="subject">
                    <span class="from">
                      Sumon Ahmed
                    </span>
                    <span class="time">
                      3 hrs
                    </span>
                  </span>
                  <span class="message">
                    This is awesome dashboard templates 
                  </span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="photo">
                    <img src="<?php echo Yii::app()->homeUrl ?>admin/img/avatar-mini.png" alt="avatar" />
                  </span>
                  <span class="subject">
                    <span class="from">
                      Dulal Khan
                    </span>
                    <span class="time">
                      Just now
                    </span>
                  </span>
                  <span class="message">
                    Hello, this is an example messages please check 
                  </span>
                </a>
              </li>
              <li>
                <a href="#">
                  See all messages
                </a>
              </li>
            </ul>
          </li>
          <li class="dropdown" id="header_notification_bar" style="padding-top: 5px;">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="icon-bell-alt">
              </i>
              <span class="badge badge-warning">
                7
              </span>
            </a>
            <ul class="dropdown-menu extended notification">
              <li>
                <p>
                  You have 7 new notifications
                </p>
              </li>
              <li>
                <a href="#">
                  <span class="label label-important">
                    <i class="icon-bolt">
                    </i>
                  </span>
                  Server #3 overloaded. 
                  <span class="small italic">
                    34 mins
                  </span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="label label-warning">
                    <i class="icon-bell">
                    </i>
                  </span>
                  Server #10 not respoding. 
                  <span class="small italic">
                    1 Hours
                  </span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="label label-important">
                    <i class="icon-bolt">
                    </i>
                  </span>
                  Database overloaded 24%. 
                  <span class="small italic">
                    4 hrs
                  </span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="label label-success">
                    <i class="icon-plus">
                    </i>
                  </span>
                  New user registered. 
                  <span class="small italic">
                    Just now
                  </span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="label label-info">
                    <i class="icon-bullhorn">
                    </i>
                  </span>
                  Application error. 
                  <span class="small italic">
                    10 mins
                  </span>
                </a>
              </li>
              <li>
                <a href="#">
                  See all notifications
                </a>
              </li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo Yii::app()->homeUrl ?>admin/img/avatar-mini.png" alt="" />
              <span class="username">
                <?php echo Yii::app()->user->username; ?>
              </span>
              <b class="caret">
              </b>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="#">
                  <i class="icon-user">
                  </i>
                  My Profile
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="icon-tasks">
                  </i>
                  My Tasks
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="icon-calendar">
                  </i>
                  Calendar
                </a>
              </li>
              <li class="divider">
              </li>
              <li>
                <a href="<?php echo Yii::app()->homeUrl ?>adminuser/default/logout">
                  <i class="icon-key">
                  </i>
                  Log Out
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>