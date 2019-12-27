<aside>
		          <div class="sidebar left ">
		            <div class="user-panel">
		              <div class="pull-left image">
		                <img src="http://via.placeholder.com/160x160" class="rounded-circle" alt="User Image">
		              </div>
		              <div class="pull-left info">
		                <p>Super Admin </p>
		                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
		              </div>
		            </div>
		            <ul class="list-sidebar bg-defoult">
		              <li> <a href="#" data-toggle="collapse" data-target="#dashboard" class="collapsed active" > <i class="fa fa-th-large"></i> <span class="nav-label"> View Job Records </span> <span class="fa fa-chevron-left pull-right"></span> </a>
		              <ul class="sub-menu collapse" id="dashboard">
		                <li class="active"><a href="job_post_review.php">Posted Jobs</a></li>
		                <li><a href="#">Pending Jobs</a></li>
		                <li><a href="#">Declined Jobs</a></li>
		                <li><a href="#">Closed Jobs</a></li>
		                
		              </ul>
		            </li>
		            <li> <a href="view_admin.php"><i class="fa fa-diamond"></i> <span class="nav-label">View Admin Records</span></a> </li>
		            <li> <a href="#"><i class="fa fa-diamond"></i> <span class="nav-label">View Employee Records</span></a> </li>

		            
		          <li> <a href="#" data-toggle="collapse" data-target="#e-commerce" class="collapsed" > <i class="fa fa-bar-chart-o"></i> <span class="nav-label">UAC</span> <span class="fa fa-chevron-left pull-right"></span> </a>
		            <ul class="sub-menu collapse" id="e-commerce">
		              <li class="active"><a href="#">Create New User</a></li>
		              <li><a href="#">Change Password</a></li>
		              <li><a href="#">Block/Unblock User</a></li>
		              <li><a href="#">User Status</a></li>
		              <li><a href="#">Login logs</a></li>
		              <li><a href="#">Activities Log</a></li>
		            </ul>
		          </li> 
		      	  <li> <a href="logout.php?id= <?php echo $_SESSION['id']?>"><i class="fa fa-pie-chart"></i> <span class="nav-label">Logout</span> </a></li>

		       </ul>
		      </div>
		    </aside>
