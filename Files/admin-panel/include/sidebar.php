<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>

  <div class="leftpanel">

    <div class="logopanel">
        <h1><span>[</span> <?php echo $ttl[0]; ?>  <span>]</span></h1>
    </div><!-- logopanel -->

    <div class="leftpanelinner">

        <!-- This is only visible to small devices -->
        <div class="visible-xs hidden-sm hidden-md hidden-lg">

            <h5 class="sidebartitle actitle">Account</h5>
            <ul class="nav nav-pills nav-stacked nav-bracket mb30">
           <li><a href="changepassword"><i class="fa fa-cog"></i> <span>Change Password</span></a></li>
              <li><a href="signout.php"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
            </ul>
        </div>

      <h5 class="sidebartitle">Navigation</h5>
      <ul class="nav nav-pills nav-stacked nav-bracket">
        <li><a href="home.php"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>

		<li class="nav-parent"><a href="#"><i class="fa fa-cog"></i> <span>Setting</span></a>
          <ul class="children">
            <li><a href="setgeneral.php"><i class="fa fa-caret-right"></i> General Setting</a></li>
            <li><a href="sethome.php"><i class="fa fa-caret-right"></i> Home Page Setting</a></li>
           <li><a href="setpayment.php"><i class="fa fa-caret-right"></i> Deposit Methods</a></li>
            <li><a href="setlogo.php"><i class="fa fa-caret-right"></i> LOGO</a></li>
            <li><a href="setslider.php"><i class="fa fa-caret-right"></i> SLIDER</a></li>

          </ul>
        </li>
		
        <li class="nav-parent"><a href="#"><i class="fa fa-gamepad"></i> <span>Games</span></a>
          <ul class="children">
            <li><a href="seventrade.php"><i class="fa fa-caret-right"></i> 7 Trade</a></li>
            <li><a href="hnt.php"><i class="fa fa-caret-right"></i> Head and Tail</a></li>
          </ul>
        </li>
		
        <li class="nav-parent"><a href="#"><i class="fa fa-gamepad"></i> <span>BID GAME</span></a>
          <ul class="children">
            <li><a href="bid.php"><i class="fa fa-caret-right"></i> Add Game</a></li>
            <li><a href="bidview.php"><i class="fa fa-caret-right"></i> View Game</a></li>
          </ul>
        </li>

				
        <li class="nav-parent"><a href="#"><i class="fa fa-dollar"></i> <span>Finance</span></a>
          <ul class="children">
            <li><a href="addbalance.php"><i class="fa fa-caret-right"></i> Add Balance Req</a></li>
            <li><a href="withdrawbalance.php"><i class="fa fa-caret-right"></i>Withdraw Balance Req</a></li>
          </ul>
        </li>

		

      </ul>

      

    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->

  <div class="mainpanel">

    <div class="headerbar">

      <a class="menutoggle"><i class="fa fa-bars"></i></a>


      <div class="header-right">
        <ul class="headermenu">
          <li>
            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <img src="images/photos/loggeduser.png" alt="" />
<?php
echo " $user";
?>
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
              <li><a href="changepass.php"><i class="fa fa-cog"></i> <span>Change Password</span></a></li>
              <li><a href="signout.php"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
              </ul>
            </div>
          </li>

        </ul>
      </div><!-- header-right -->

    </div><!-- headerbar -->
