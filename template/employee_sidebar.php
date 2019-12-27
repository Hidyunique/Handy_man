<aside>
		          <div class="sidebar left ">
		            <div class="user-panel">
		              <div class="pull-left image">
		                <img src="" class="rounded-circle" width="50" height="50" alt="User Image">
		              </div>
		              <div class="pull-left info" style="margin-left: 80px">
		                <p>Status  </p>
		                <a href="#"><i class="fa fa-circle text-success"></i> <?=$_SESSION['status']?></a>
		              </div>
		            </div>

		        <?php if($_SESSION['status'] == "pending") { ?>

		            <ul class="list-sidebar bg-defoult">

		              <li> <a onclick="refuseAction()" href="employee_dashboard.php" class="active" ><i class="fa fa-diamond"></i> <span class="nav-label">My Dashboard</span></a> </li>

		              <li> <a onclick="refuseAction()" href="#" data-toggle="collapse" data-target="#dashboard" class="collapsed " > <i class="fa fa-th-large"></i> <span class="nav-label">  Resume </span> <span class="fa fa-chevron-left pull-right"></span> </a>
		              <ul class="sub-menu collapse" id="dashboard">
		              	<li class=""><a onclick="refuseAction()" href="post_resume.php">Post Resume</a></li>
		                <li class=""><a onclick="refuseAction()" href="#">View Resume</a></li>
		                <li><a onclick="refuseAction()" href="#">Edit Resume</a></li>
		                		                
		              </ul>
		            </li>
		            <li> <a onclick="refuseAction()" href="#" data-toggle="collapse" data-target="#dashboard2" class="collapsed" > <i class="fa fa-th-large"></i> <span class="nav-label">  Jobs </span> <span class="fa fa-chevron-left pull-right"></span> </a>
		              <ul class="sub-menu collapse" id="dashboard2">
		                <li class=""><a onclick="refuseAction()" href="#">Bookmark jobs</a></li>
		                <li><a onclick="refuseAction()" href="#">Applied Jobs</a></li>
		                		                
		              </ul>
		            </li>
		            <li> <a onclick="refuseAction()" href="#"><i class="fa fa-diamond"></i> <span class="nav-label">Profile Details</span></a> </li>
		            
		            
		        
		      	  <li> <a href="logout.php?id= <?php echo $_SESSION['id']?>"><i class="fa fa-pie-chart"></i> <span class="nav-label">Logout</span> </a></li>

		    <?php } else{ ?>    	  

		      	  <ul class="list-sidebar bg-defoult">

		              <li> <a onclick=""href="employee_dashboard.php" class="active"><i class="fa fa-diamond"></i> <span class="nav-label">My Dashboard</span></a> </li>

		              <li> <a onclick="" href="#" data-toggle="collapse" data-target="#dashboard" class="collapsed " > <i class="fa fa-th-large"></i> <span class="nav-label">  Resume </span> <span class="fa fa-chevron-left pull-right"></span> </a>
		              <ul class="sub-menu collapse" id="dashboard">
		              	<li class=""><a onclick="" href="post_resume.php">Post Resume</a></li>
		                <li class=""><a onclick="" href="view_resume.php">View Resume</a></li>
		                <li><a onclick="" href="update_resume.php">Edit Resume</a></li>
		                		                
		              </ul>
		            </li>
		            <li> <a onclick="" href="#" data-toggle="collapse" data-target="#dashboard2" class="collapsed" > <i class="fa fa-th-large"></i> <span class="nav-label">  Jobs </span> <span class="fa fa-chevron-left pull-right"></span> </a>
		              <ul class="sub-menu collapse" id="dashboard2">
		                <li class=""><a onclick="" href="bookmarked_job.php">Bookmark jobs</a></li>
		                <li><a onclick="" href="applied_job.php">Applied Jobs</a></li>               		                
		              </ul>
		            </li>
		            <li> <a onclick="" href="#"><i class="fa fa-diamond"></i> <span class="nav-label">Profile Details</span></a> </li>
		            
		            
		    <?php  } ?>      
		      	  <li> <a href="logout.php?id= <?php echo $_SESSION['id']?>"><i class="fa fa-pie-chart"></i> <span class="nav-label">Logout</span> </a></li>
		       </ul>
		      </div>
		    </aside>
