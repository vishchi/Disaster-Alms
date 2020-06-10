<div class="span3">
          <div class="sidebar">


<ul class="widget widget-menu unstyled">
              <li>
                <a class="collapsed" data-toggle="collapse" href="#togglePages">
                  <i class="menu-icon icon-cog"></i>
                  <i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
                  Manage Payment
                </a>
                <ul id="togglePages" class="collapse unstyled">
                  <li>
                    <a href="notprocess-complaint.php">
                      
                      Make Payment
                      
                    </a>
                  </li>
                  <li>
                    <a href="inprocess-complaint.php">
                      </i>
                      Pending Payment
                   <?php 
  $status="in Process";                   
$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where status='$status'");
$num1 = mysqli_num_rows($rt);
{?>
<?php } ?>
                    </a>
                  </li>
                  <li>
                    <a href="closed-complaint.php">
                      
                      Closed Payment
       <?php 
  $status="closed";                   
$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where status='$status'");
$num1 = mysqli_num_rows($rt);
{?>
<?php } ?>

                    </a>
                  </li>
                </ul>
              </li>
              
              <li>
                <a href="manage-users.php">
                  <i class="menu-icon icon-group"></i>
                  Manage Payments
                </a>
              </li>
            </ul>


            <ul class="widget widget-menu unstyled">
                                <li><a href="category.php"><i class="menu-icon icon-tasks"></i> Add Category </a></li>
                                <li><a href="subcategory.php"><i class="menu-icon icon-tasks"></i>Submit A Disaster </a></li>
                                <li><a href="state.php"><i class="menu-icon icon-paste"></i>Add State</a></li>
                          
                        
                            </ul><!--/.widget-nav-->

            <ul class="widget widget-menu unstyled">
              <li><a href="user-logs.php"><i class="menu-icon icon-tasks"></i>Transaction Logs</a></li>
              
              <li>
                <a href="logout.php">
                  <i class="menu-icon icon-signout"></i>
                  Logout
                </a>
              </li>
            </ul>

          </div><!--/.sidebar-->
        </div><!--/.span3-->
