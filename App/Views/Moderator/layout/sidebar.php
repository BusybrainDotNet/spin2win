 <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="<?= baseURL('profile-setting/'); ?><?= $adminInfo['uniqueid']; ?>/"><img src="<?= public_asset('/other_assets/Profile/'); ?><?= $adminInfo['profileimage']; ?>" class="img-circle" width="80"></a></p>
          <h5 class="centered">Welcome <?= $adminInfo['username']; ?></h5>
          <li class="mt">
            <a class="active" href="<?= baseURL('ad-index/'); ?><?= $adminInfo['uniqueid']; ?>/">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-home"></i>
              <span>Company</span>
              </a>
            <ul class="sub">
              <li><a href="<?= baseURL('view-coy/'); ?><?= $adminInfo['uniqueid']; ?>/">Profile</a></li>
              <li><a href="<?= baseURL('projects/'); ?><?= $adminInfo['uniqueid']; ?>/?c=Catalogue">Projects</a></li>
              <li><a href="<?= baseURL('team-members/'); ?><?= $adminInfo['uniqueid']; ?>/">Team Members</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-users"></i>
              <span>Users</span>
              </a>
            <ul class="sub">
              <li><a href="<?= baseURL('all-users/'); ?><?= $adminInfo['uniqueid']; ?>/?c=All">All Users</a></li>
            </ul>
          </li>


          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-file"></i>
              <span>Selling Now</span>
              </a>
            <ul class="sub">
              <li><a href="<?= baseURL('projects/'); ?><?= $adminInfo['uniqueid']; ?>/?c=All">Catalogue</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-envelope-o"></i>
              <span>Messaging</span>
              </a>
            <ul class="sub">
              <!-- <li><a href="<?= baseURL('tickets/'); ?><?= $adminInfo['uniqueid']; ?>/?c=All">Ticket</a></li> -->
              <li><a href="<?= baseURL('messages/'); ?><?= $adminInfo['uniqueid']; ?>/?c=All">Message</a></li>
              <li><a href="<?= baseURL('ad-webmail/'); ?><?= $adminInfo['uniqueid']; ?>/">Webmail</a></li>
            </ul>
          </li>


          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>App Settings</span>
              </a>
            <ul class="sub">
              <li><a href="<?= baseURL('utility-settings/'); ?><?= $adminInfo['uniqueid']; ?>/">Finance</a></li>
            </ul>
          </li>
          
          <li>
            <a href="<?= baseURL('logout/'); ?><?= $adminInfo['uniqueid']; ?>/?user=<?= $adminInfo['username']; ?>">
              <i class="fa fa-power-off"></i>
              <span>Log Out </span>
              </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->