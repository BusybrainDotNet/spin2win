<section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="<?= baseURL('md-index/'); ?><?= $moderatorInfo['uniqueid']; ?>/" class="logo"><img src="/Images/favicon.png" alt="Logo" class="img-circle" style="max-width: 80px; max-height: 50px; padding: 5px;"></a>
      <!--logo end-->
      <div class="top-menu">

      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <i class="fa fa-tasks"></i>
              <span class="badge bg-theme"><?= $newProject; ?></span>
              </a>
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You Have <?= $newProject; ?> Pending Project(s)</p>
              </li>
              <li>
              <!-- <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Payments Sent</div>
                    <div class="percent">70%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                      <span class="sr-only">70% Complete (Important)</span>
                    </div>
                  </div>
                </a>
              </li> -->
              <li class="external">
                <a href="<?= baseURL('projects/'); ?><?= $adminInfo['uniqueid']; ?>/?c=All">See All Project(s)</a>
              </li>
            </ul>
          </li>
          <!-- settings end -->
          <!-- inbox dropdown start-->
          <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <i class="fa fa-envelope-o"></i>
              <span class="badge bg-theme"><?= $countMsg; ?></span>
              </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You Have <?= $countMsg; ?> New Message(s)</p>
              </li>
              <!-- <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="img/ui-zac.jpg"></span>
                  <span class="subject">
                  <span class="from">Zac Snider</span>
                  <span class="time">Just now</span>
                  </span>
                  <span class="message">
                  Hi mate, how is everything?
                  </span>
                  </a>
              </li> -->
              <li>
                <a href="<?= baseURL('messages/'); ?><?= $adminInfo['uniqueid']; ?>/?c=Unread">See New Message(s)</a>
              </li>
            </ul>
          </li>
          <!-- inbox dropdown end -->

          <!-- notification dropdown start-->
          <!-- <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <i class="fa fa-bell-o"></i>
              <span class="badge bg-warning"><?= $unreadTicket; ?></span>
              </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-yellow"></div>
              <li>
                <p class="yellow">You have <?= $unreadTicket; ?> new notifications</p>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Server Overloaded.
                  <span class="small italic">4 mins.</span>
                  </a>
              </li>
            
              <li>
                <a href="index.html#">See all notifications</a>
              </li>
            </ul>
          </li> -->
          <!-- notification dropdown end -->

        </ul>
        <!--  notification end -->
      </div>
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="<?= baseURL('logout/'); ?><?= $adminInfo['uniqueid']; ?>/?user=<?= $adminInfo['username']; ?>">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->