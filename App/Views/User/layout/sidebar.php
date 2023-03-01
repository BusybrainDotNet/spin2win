 <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="<?= baseURL('us-setting/'); ?><?= $userInfo['uniqueid']; ?>/"><img src="<?= public_asset('/other_assets/Profile/'); ?><?= $userInfo['profileimage']; ?>" class="img-circle" width="80"></a></p>
          <h5 class="centered">Welcome <?= $userInfo['username']; ?></h5>
          <li class="mt">
            <a class="active" href="<?= baseURL('us-index/'); ?><?= $userInfo['uniqueid']; ?>/">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>

          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-building"></i>
              <span>Properties</span>
              </a>
            <ul class="sub">
              <li><a href="<?= baseURL('us-lease/'); ?><?= $userInfo['uniqueid']; ?>/?c=All">Lease</a></li>
              <li><a href="<?= baseURL('us-rent/'); ?><?= $userInfo['uniqueid']; ?>/?c=All">Rent</a></li>
              <li><a href="<?= baseURL('us-index/'); ?><?= $userInfo['uniqueid']; ?>/?c=All">Sale</a></li>
            </ul>
          </li>

          <?php if($settings) {  
                  if($settings['makepost'] === "Yes") {  ?>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-pencil"></i>
              <span>Listings</span>
              </a>
            <ul class="sub">
              <li><a href="<?= baseURL('us-project/'); ?><?= $userInfo['uniqueid']; ?>/?c=All">Project</a></li>
            </ul>
          </li>
          <?php } } ?>

          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-envelope-o"></i>
              <span>Messaging</span>
              </a>
            <ul class="sub">
              <li><a href="<?= baseURL('us-notifications/'); ?><?= $userInfo['uniqueid']; ?>/?c=All">Notifications</a></li>
              <li><a href="<?= baseURL('us-support/'); ?><?= $userInfo['uniqueid']; ?>">Support Tickets</a></li>
            </ul>
          </li>


          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>Transactions</span>
              </a>
            <ul class="sub">
              <li><a href="<?= baseURL('us-history/'); ?><?= $userInfo['uniqueid']; ?>/">History</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>Settings</span>
              </a>
            <ul class="sub">
              <li><a href="<?= baseURL('us-setting/'); ?><?= $userInfo['uniqueid']; ?>/">Profile</a></li>
            </ul>
          </li>
          
          <li class="sub-menu">
            <a href="<?= baseURL('logout/'); ?><?= $userInfo['uniqueid']; ?>/">
              <i class="fa fa-power-off"></i>
              <span>Log Out </span>
              </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->