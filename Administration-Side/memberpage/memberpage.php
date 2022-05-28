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
    <link rel="stylesheet" href="./memberpagecss/memberpage.css">
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
                        <button data-tab-value="#tab_1">
                            <i class="fa-solid fa-folder icon"></i>
                            <span class="text nav-text">Current Projects</span>
                        </button>
                    </li>

                    <!-- <li class="nav-link">
                        <button data-tab-value="#tab_4">
                            <i class="fa-solid fa-chart-pie icon"></i>
                            <span class="text nav-text">Analytics</span>
                        </button>
                    </li>

                    <li class="nav-link">
                        <button data-tab-value="#tab_5">
                            <i class="fa-solid fa-heart icon"></i>
                            <span class="text nav-text">Likes</span>
                        </button>
                    </li>

                    <li class="nav-link" data-tab-value="#tab_6">
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="tabs__tab" id="tab_1"  data-tab-info>
        <div class="text">
            <h1>Current Projects</h1>
            <div class="currentprj">
                <div class="all_projects">
                            <table id="projectsTable">
                                <thead>
                                    <tr>
                                        <th>Project code</th>
                                        <th>Project name</th>
                                        <!-- <th></th> -->
                                    </tr>
                                </thead>
                            <tbody>
                            <?php
                                $i=0;
                                $prjcode="SELECT * FROM project_status WHERE codeprj IN (SELECT prjcode FROM project_team WHERE (manager='$name' OR developer='$name' OR content_writer='$name' OR graphic_designer='$name' OR marketer='$name'))";
                                $rescode=mysqli_query($conn,$prjcode);
                                if($rescode){
                                    while($rowcode=mysqli_fetch_assoc($rescode)){
                                                $code=$rowcode['codeprj'];
                                                $pname=$rowcode['prj_name'];
                                                $prjmanager=$rowcode['prj_manager'];
                                                $namid="details".$i;
                                                ?>
                                                    <tr>
                                                        <td><?php echo"$code"; ?></td>
                                                        <td><?php echo"$pname"; ?></td>
                                                        <!-- <td class="status"><button onclick = "replace('<?php echo $namid;?>','project_team_details');">Show Details</button></td> -->
                                                    </tr>
                                                <?php
                                                $i++;
                                            }
                                        }                    
                                    ?>


                            </tbody>
                            </table>

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
            <h1>Analytics</h1>    
        </div>
    </section>
    <section class="tabs__tab" id="tab_5"  data-tab-info>
        <div class="text">
            <h1>Likes<h1>
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
    <!-- Notification -->
    <script type = "text/javascript">
        function notifrmv( badge) {
            document.getElementById(badge).style.display="none";
        }
    </script>
    <!--  -->
    <script type="text/javascript" src="memberpage.js"></script>
</body>
</html>