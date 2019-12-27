<aside>
		          <div class="sidebar left ">
		            <div class="user-panel">
		              <div class="pull-left image">
		      
		                <img src="images/<?php echo $_SESSION['logo'] ?>" class="rounded-circle" width="50" height="50" alt="User Image">        	
		              </div>
		              <div class="pull-left info" style="margin-left: 70px">
		                <p>Status  </p>
		                <a href="#"><i class="fa fa-circle text-success"></i> <?=$_SESSION['status']?></a>
		              </div>
		            </div>

		        <?php if($_SESSION['status'] == "pending") { ?>

		            <ul class="list-sidebar bg-defoult">

		              <li> <a onclick="refuseAction()" href="#" data-toggle="collapse" data-target="#dashboard" class="collapsed active" > <i class="fa fa-th-large"></i> <span class="nav-label"> My Profile </span> <span class="fa fa-chevron-left pull-right"></span> </a>
		              <ul class="sub-menu collapse" id="dashboard">
		                <li class="active"><a onclick="refuseAction()" href="#">View Profile</a></li>
		                <li><a onclick="refuseAction()" href="editAdminProfile.php">Edit Profile</a></li>
		              </ul>
		            </li>
		              <li> <a onclick="refuseAction()" href="#" data-toggle="collapse" data-target="#dashboard" class="collapsed active" > <i class="fa fa-th-large"></i> <span class="nav-label"> View Job Records </span> <span class="fa fa-chevron-left pull-right"></span> </a>
		              <ul class="sub-menu collapse" id="dashboard">
		                <li class="active"><a onclick="refuseAction()" href="job_post_review.php">Posted Jobs</a></li>
		                <li><a onclick="refuseAction()" href="#">Pending Jobs</a></li>
		                <li><a onclick="refuseAction()" href="#">Declined Jobs</a></li>
		                <li><a onclick="refuseAction()" href="#">Closed Jobs</a></li>
		                
		              </ul>
		            </li>
		            <li> <a onclick="refuseAction()" href="post_job.php"><i class="fa fa-diamond"></i> <span class="nav-label">Post New Job</span></a> </li>
		            <li> <a onclick="refuseAction()" href="#"><i class="fa fa-diamond"></i> <span class="nav-label">View Employee Records</span></a> </li>
		            <li> <a href="logout.php?id= <?php echo $_SESSION['id']?>"><i class="fa fa-pie-chart"></i> <span class="nav-label">Logout</span> </a></li>
		            
		   		 <?php  }else{ ?>      

		    	
		            <ul class="list-sidebar bg-defoult">

		              <li> <a onclick="" href="#" data-toggle="collapse" data-target="#dashboard" class="collapsed active" > <i class="fa fa-th-large"></i> <span class="nav-label"> My Profile </span> <span class="fa fa-chevron-left pull-right"></span> </a>
		              <ul class="sub-menu collapse" id="dashboard">
		                <li class="active"><a onclick="" href="#">View Profile</a></li>
		                <li><a onclick="" href="editAdminProfile.php" onchange="preview_img(event)">Edit Profile</a></li>
		              </ul>
		            </li>
		              <li> <a onclick="" href="#" data-toggle="collapse" data-target="#dashboard" class="collapsed active" > <i class="fa fa-th-large"></i> <span class="nav-label"> View Job Records </span> <span class="fa fa-chevron-left pull-right"></span> </a>
		              <ul class="sub-menu collapse" id="dashboard">
		                <li class="active"><a onclick="" href="job_post_review.php">Posted Jobs</a></li>
		                <li><a onclick="" href="#">Pending Jobs</a></li>
		                <li><a onclick="" href="#">Declined Jobs</a></li>
		                <li><a onclick="" href="#">Closed Jobs</a></li>
		                
		              </ul>
		            </li>
		            <li> <a onclick="" href="post_job.php"><i class="fa fa-diamond"></i> <span class="nav-label">Post New Job</span></a> </li>
		            <li> <a onclick="" href="#"><i class="fa fa-diamond"></i> <span class="nav-label">View Employee Records</span></a> </li>
		      	  <li> <a href="logout.php?id= <?php echo $_SESSION['id']?>"><i class="fa fa-pie-chart"></i> <span class="nav-label">Logout</span> </a></li>
		      	<?php  } ?>
		       </ul>
		      </div>
		    </aside>
