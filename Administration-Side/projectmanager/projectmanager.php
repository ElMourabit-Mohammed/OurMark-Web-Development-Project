<?php

@include '../config/config.php';

session_start();

if(!isset($_SESSION['member_name'])){
   header('location:../LOGIN/login.php');
}
else{
    $sql="SELECT * FROM members_accounts WHERE name ='".$_SESSION['member_name']."'";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) > 0) {
        $row = $result->fetch_assoc();
        $name=$row["name"];
        $profile=$row["member_type"];
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEMBER PAGE</title>
    <link rel="shortcut icon" href="../../Client-Side/Assets-Global/LOGO/icon/fingerprint-solid-red.svg" />
    <!----===== fontawesom CSS ===== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./projectmanagercss/projectmanager.css">
</head>
<body>
<nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../../Client-Side/Assets-Global/LOGO/icon/fingerprint-solid-red.svg" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">OurMark</span>
                </div>
            </div>
            <div class="toggle">
                <i class="fa-solid fa-angle-right"></i>
            </div>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <!-- <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li> -->

                <ul class="menu-links">

                    <li class="nav-link">
                        <button data-tab-value="#tab_2">
                            <i class="fa-solid fa-user icon"></i>
                            <span class="text nav-text">Profile</span>
                        </button>
                    </li>

                    <li class="nav-link notification" onclick = "notifrmv('newnotif');">
                        <button data-tab-value="#tab_3">
                            <i class="fa-solid fa-bell icon"> <span class="badge" id="newnotif"></span></i>
                            <span class="text nav-text">Notifications</span>
                        </button>
                    </li>

                    <li class="nav-link">
                        <button data-tab-value="#tab_5">
                            <i class="fa-solid fa-users icon"></i>
                            <span class="text nav-text">Employees</span>
                        </button>
                    </li>

                    <li class="nav-link">
                        <button data-tab-value="#tab_1">
                            <i class="fa-solid fa-envelope icon"></i>
                            <span class="text nav-text">Customers Requests</span>
                        </button>
                    </li>

                    <li class="nav-link">
                        <button data-tab-value="#tab_4">
                            <i class="fa-solid fa-chart-pie icon"></i>
                            <span class="text nav-text">Projects Status</span>
                        </button>
                    </li>

                    <!-- <li class="nav-link" data-tab-value="#tab_6">
                        <button>
                            <i class="fa-solid fa-wallet icon"></i>
                            <span class="text nav-text">Wallets</span>
                        </button>
                    </li> -->

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="../Logout/logout.php">
                        <i class="fa-solid fa-circle-left icon"></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
                
            </div>
        </div>

    </nav>
    <section class="tabs__tab active" id="tab_2"  data-tab-info>
        <div class="text">
            <h1>Profile</h1>
            <div class="profile">
                <div class="profileinformations">
                    <h3><?php echo $name ?></h3>
                    <h5><?php echo $profile ?></h5>
                </div>
                <div class="date_events_container">
                    <div class="calendarcontainer">
                        <div class="events">
                            <div class="events_content">
                                <h3>Events</h3>
                                <?php
                                    $selectevents = " SELECT * FROM events_date WHERE event_date >= CURRENT_TIMESTAMP ORDER BY `events_date`.`event_date` ASC";
                                    $events=mysqli_query($conn,$selectevents);
                                    if($events){
                                        while($rowevent=mysqli_fetch_assoc($events)){
                                            $event=$rowevent['event'];
                                            $event_date=$rowevent['event_date'];
                                ?>
                                    <div class="event">
                                        <div class="event-content">
                                            <h6><?php echo"$event";?></h6>
                                            <h6><?php echo"$event_date";?></h6>
                                        </div>
                                    </div>
                                <?php
                                        }
                                    }   
                                ?>
                            </div>
                        </div>
                        <div class="calendar">
                            <div class="month">
                            <i class="fas fa-angle-left prev"></i>
                            <div class="date">
                                <h1></h1>
                                <p></p>
                            </div>
                            <i class="fas fa-angle-right next"></i>
                            </div>
                            <div class="weekdays">
                            <div>Sun</div>
                            <div>Mon</div>
                            <div>Tue</div>
                            <div>Wed</div>
                            <div>Thu</div>
                            <div>Fri</div>
                            <div>Sat</div>
                            </div>
                            <div class="days">
                            </div>
                        </div>
                        <script src="./calendar/calendar.js"></script>
                    </div>
                    <div class="addevents">
                        <div class="addevents_content">
                            <h3>New Event</h3>
                            <form action="./addevent/addevent.php" method="post">
                                <div class="addevent">
                                    <label for="newevent">Event</label>
                                    <input type="text" id="newevent" name="newevent" required>
                                </div>
                                <div class="addevent">
                                    <label for="neweventdate">Date</label>
                                    <input type="datetime-local" id="neweventdate" name="neweventdate" required>
                                </div>
                                <div>
                                    <input type="submit" id="eventbtn" name="addeventbtn" value="ADD">
                                </div> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tabs__tab" id="tab_5"  data-tab-info>
        <div class="text">
            <h1>Employees<h1>
            <div class="employeesliste">
                <div class="searchadd">
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search name">
                    <a class="addbtn" href="../Add-member/addmember.php"><i class="fa-solid fa-user-plus"></i></a>
                </div>
                
                <table id="myTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Profile</th>
                            <th>Email</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $select = " SELECT * FROM members_accounts WHERE member_type != 'Projects Manager' ";
                        $res=mysqli_query($conn,$select);
                        if($res){
                            while($row=mysqli_fetch_assoc($res)){
                                $id=$row['id'];
                                $nom=$row['name'];
                                $profile=$row['member_type'];
                                $email=$row['email'];
                    ?>
                        <tr>
                            <td><?php echo"$nom";?></td>
                            <td><?php echo"$profile";?></td>
                            <td><?php echo"$email";?></td>
                            <td class="btndu"><a href="./delete/delete.php?deleteid=<?php echo"$id";?>" ><button>Delete</button></a></td>
                            <td class="btndu"><a href="./update/update.php?updateid=<?php echo"$id";?>" ><button>Update</button></a></td>
                        </tr>
                    <?php
                            }
                        }                    
                    ?>
                    </tbody>

                </table>
                <button class="exportbtn" onclick="exportTableToExcel('myTable', 'members-data')"><i class="fa-solid fa-file-excel"></i> Export Table Data To Excel File</button>
            </div>
        </div>

    </section>

    <section class="tabs__tab" id="tab_1"  data-tab-info>
        <div class="text">
            <h1>Customers Requests</h1>
                <div class="customers_requests">
                    <div class="all_requests">
                        <?php
                            $i=0;
                            $select = " SELECT * FROM customers_requests ";
                            $res=mysqli_query($conn,$select);
                            if($res){
                                while($row=mysqli_fetch_assoc($res)){
                                    $fname=$row['fname'];
                                    $lname=$row['lname'];
                                    $prjsubject=$row['prj_subject'];
                                    $date_send=$row['date_send'];
                                    $namid="div".$i;
                                    ?>
                                        <div class="request" onclick = "replace('<?php echo $namid;?>','about_request_content');">
                                            <h5><span>Customer name : </span><?php echo"$fname $lname"; ?> <br><span>Project Subject : </span><?php echo"$prjsubject"; ?></h5>
                                            <h6><?php echo"$date_send"; ?></h6>
                                        </div>
                                    <?php
                                    $i++;
                                }
                            }                    
                        ?>
                    </div>
                    <div class="about_request">
                        <?php
                            $x=0;
                            $select = " SELECT * FROM customers_requests ";
                            $res=mysqli_query($conn,$select);
                            if($res){
                                while($row=mysqli_fetch_assoc($res)){
                                    $id=$row['id'];
                                    $fname=$row['fname'];
                                    $lname=$row['lname'];
                                    $prjsubject=$row['prj_subject'];
                                    $date_send=$row['date_send'];
                                    $email=$row['email'];
                                    $phone=$row['phone'];
                                    $prj_type=$row['prj_type'];
                                    $description=$row['description'];
                                    ?>
                                        <div class="about_request_content" id='div<?php echo"$x"; ?>'>
                                            <h4><span>Customer name : </span><?php echo"$fname $lname"; ?></h4>
                                            <h4><span>Email : </span><?php echo"$email"; ?></h4>
                                            <h4><span>Phone number : </span><?php echo"$phone"; ?></h4>
                                            <h4><span>Project type : </span><?php echo"$prj_type"; ?></h4>
                                            <h4><span>Project subject : </span><?php echo"$prjsubject"; ?></h4>
                                            <h4><span>Description : </span><?php echo"$description"; ?></h4>
                                            <time><h4><?php echo"$date_send"; ?></h4></time>
                                            <div class="request_validation">
                                                <a href="mailto:<?php echo"<$email>";?>"><button class="accept">Make Appointment</button></a>
                                                <!-- add subject & body to mail:---- ?subject=Testing out mailto!&body=This is only a test! -->
                                            </div>
                                        </div>
                                    <?php
                                    $x++;
                                }
                            }                    
                        ?>
                    </div>
                </div>
        </div>
    </section>

    <section class="tabs__tab" id="tab_3"  data-tab-info>
        <div class="text">
            <h1>Notifications</h1>    
        </div>
    </section>

    <section class="tabs__tab" id="tab_4"  data-tab-info>
        <div class="text">
            <h1>Projects Status</h1>
            <div class="projectstatus">
                    <div class="all_projects">
                        <div class="addnewproject">
                            <a class="newprj" href="./add_project/add_project.php"><i class="fa-solid fa-plus"></i></a>
                        </div>
                        <table id="projectsTable">
                            <thead>
                                <tr>
                                    <th>Project code</th>
                                    <th>Project name</th>
                                    <th></th>
                                </tr>
                            </thead>
                        <tbody>
                        <?php
                            $i=0;
                            $select1 = " SELECT * FROM project_status ";
                            $res1=mysqli_query($conn,$select1);
                            if($res1){
                                while($row=mysqli_fetch_assoc($res1)){
                                    $code=$row['codeprj'];
                                    $pname=$row['prj_name'];
                                    $prjmanager=$row['prj_manager'];
                                    $namid="details".$i;
                                    ?>
                                        <tr>
                                            <td><?php echo"$code"; ?></td>
                                            <td><?php echo"$pname"; ?></td>
                                            <td class="status"><button onclick = "replace('<?php echo $namid;?>','project_team_details');">Show Details</button></td>
                                        </tr>
                                    <?php
                                    $i++;
                                }
                            }                    
                        ?>
                        </tbody>
                        </table>

                    </div>
                    <div class="all_projects_teams_details">
                    <?php
                            $x=0;
                            $select1 = " SELECT * FROM project_status ";
                            $res1=mysqli_query($conn,$select1);
                            if($res1){
                                while($row=mysqli_fetch_assoc($res1)){
                                    $code=$row['codeprj'];
                                    $pname=$row['prj_name'];
                                    $select2="SELECT * FROM project_team WHERE prjcode='$code'";
                                    $res2=mysqli_query($conn,$select2);
                                    if($res2){
                                        $row2=mysqli_fetch_assoc($res2);
                                        $prjcode=$row2['prjcode'];
                                        $manager=$row2['manager'];
                                        $developer=$row2['developer'];
                                        $content_writer=$row2['content_writer'];
                                        $graphic_designer=$row2['graphic_designer'];
                                        $marketer=$row2['marketer'];
                                        if(!empty($prjcode)){
                                            ?>
                                                <div class="project_team_details" id='details<?php echo"$x"; ?>'>
                                                    <div class="project_details">
                                                        <div class="project_details_content">
                                                                <h5><span>Project code : </span><?php echo"$code";?></h5>
                                                                <h5><span>Project name : </span><?php echo"$pname";?></h5>
                                                                <h5><span>Project Team</span></h5>
                                                                <h6><span>Project manager : </span><?php echo"$manager";?></h6>
                                                                <h6><span>Developer : </span><?php echo"$developer";?></h6>
                                                                <h6><span>Content writer : </span><?php echo"$content_writer";?></h6>
                                                                <h6><span>Graphic designer : </span><?php echo"$graphic_designer";?></h6>
                                                                <h6><span>Marketer : </span><?php echo"$marketer";?></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            $x++;
                                        }
                                    }
                                }
                            }
                        ?>
                    </div>

            </div>
        </div>
    </section>



    <section class="tabs__tab" id="tab_6"  data-tab-info>
        <div class="text">
            <h1>Wallets</h1>
        </div>
    </section>
    <!-- switch tabs script js -->
    <script type="text/javascript">
        const tabs = document.querySelectorAll('[data-tab-value]')
        const tabInfos = document.querySelectorAll('[data-tab-info]')
  
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const target = document
                    .querySelector(tab.dataset.tabValue);
  
                tabInfos.forEach(tabInfo => {
                    tabInfo.classList.remove('active')
                })
                target.classList.add('active');
            })
        })
    </script>
    <!--  -->
    <!-- switch requests js -->
    <script type = "text/javascript">
        function replace( show ,hide) {
            var divsToHide = document.getElementsByClassName(hide);
            for(var i = 0; i < divsToHide.length; i++){
                divsToHide[i].style.display = "none";
            }
            document.getElementById(show).style.display="flex";
        }
    </script>
    <!--  -->
    <!-- Notification -->
    <script type = "text/javascript">
        function notifrmv( badge) {
            document.getElementById(badge).style.display="none";
        }
    </script>
    <!--  -->
    <!-- filter table by search script js -->
    <script>
        function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
            }       
        }
        }
    </script>
    <!--  -->
    <!-- export excel file script js -->
    <script>
        function exportTableToExcel(tableID, filename = ''){
            var downloadLink;
            var dataType = 'application/vnd.ms-excel';
            var tableSelect = document.getElementById(tableID);
            var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
            
            // Specify file name
            filename = filename?filename+'.xls':'excel_data.xls';
            
            // Create download link element
            downloadLink = document.createElement("a");
            
            document.body.appendChild(downloadLink);
            
            if(navigator.msSaveOrOpenBlob){
                var blob = new Blob(['\ufeff', tableHTML], {
                    type: dataType
                });
                navigator.msSaveOrOpenBlob( blob, filename);
            }else{
                // Create a link to the file
                downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
            
                // Setting the file name
                downloadLink.download = filename;
                
                //triggering the function
                downloadLink.click();
            }
        }
    </script>
    <!--  -->
    <script type="text/javascript" src="projectmanager.js"></script>
</body>
</html>