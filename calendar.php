<?php

include ("database.php");
 //readTasks();
session_start();

if(isset($_SESSION['data'])){
    $data = $_SESSION['data'];
}else {
    $data = array();
    for($i=1; $i<6; $i++) {
        for ($j=0; $j<9; $j++) {
            $data[$i][$j]['priority'] = "";
            $data[$i][$j]['note'] = "";
        }
    }
}

if(isset($_POST['add_task'])){

    $day = $_POST['day'];
    $hour = $_POST['hour'];
    $priority = $_POST['priority'];
    $note = $_POST['note'];

    insertTask($day, $hour, $priority, $note);
    //readTasks();

   // $data[$day][$hour]['priority'] = $priority;
   // $data[$day][$hour]['note'] = $note;

   // $_SESSION['data'] = $data;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bare - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    .hour{
        background: #C5C5C5;
        font-weight: bold;
        text-align: center;
        padding: 8px 2px !important;
    }
    tr,td{
        text-align: center;
    }
    td{
        border: 1px solid #ddd !important;
    }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1><?php echo $_SESSION['username']; ?> TODO list</h1>
                <p>________________________________________</p>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-box">
                <div class="form-top">
                    <div class="form-top-left">
                        <h3>Task Form</h3>
                    </div>
                    <div class="form-top-right">
                        <i class="fa fa-lock"></i>
                    </div>
                </div>
                <div class="form-bottom">
                    <form role="form" action="" method="post" class="login-form">
                        <div class="form-group">
                          <label class="" for="">Day:</label>
                            <select class="selectpicker" name="day">
                              <option value="1">Monday</option>
                              <option value="2">Tuesday</option>
                              <option value="3">Wednesday</option>
                              <option value="4">Thursday</option>
                              <option value="5">Friday</option>
                            </select>
                        </div>
                        <div class="form-group">
                          <label class="" for="">Hour:</label>
                            <select class="selectpicker" name="hour">
                              <option value="0">09</option>
                              <option value="1">10</option>
                              <option value="2">11</option>
                              <option value="3">12</option>
                              <option value="4">13</option>
                              <option value="5">14</option>
                              <option value="6">15</option>
                              <option value="7">16</option>
                              <option value="8">17</option>
                            </select>
                        </div>
                        <div class="form-group">
                          <label class="" for="">Priority:</label>
                            <select class="selectpicker" name="priority">
                              <option value="danger">Danger</option>
                              <option value="success">Success</option>
                              <option value="info">Info</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="form-text">Task Name:</label>
                            <input type="text" class="form-text form-control" id="form-text" name="note">
                        </div>
                        <button type="submit" class="btn" name="add_task">Add Task</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                  <tr>
                    <th></th>
                    <th>Monday</th>
                    <th>Tusday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                // for($i=0; $i<9; $i++){
                //     echo "<tr>";
                //     for($j=0; $j<6; $j++){
                //         if($j==0) {
                //             echo "<td class='hour'>" . ($i+9) . "</td>";
                //         } else {
                //             echo "<td class='" . $data[$j][$i]['priority']."'>" . $data[$j][$i]['note'] . "</td>";
                //         }
                //     }
                //     echo "</tr>";
                // }



               $data = readTasks();
               //print_r($data);
                foreach (range(9,17) as $hour){ ?>
                  <tr class="">
                      
                    <td class="hour"><?php echo $hour ?></td>
                      <?php foreach (range(1,5) as $day){?>
                                                <!--indexi-->
                      <td <?php if(isset($data[$day."_".$hour])){
                                   if($data[$day."_".$hour]['priority'] == 'Danger')
                                   { echo  'class="danger"';}
                                   elseif ($data[$day."_".$hour]['priority'] == 'Success')
                                   { echo 'class="success"';}
                                   else
                                   { echo 'class="info"';}
                           }
                            ?> >
                      <?php
                      $temp = $hour;

                      //var_dump($temp);
                      $temp = (int)$temp-9;
                      //var_dump($temp);

                      if(isset($data[$day."_".$hour])){
                        echo $data[$day."_".$hour]['name'];
                      }
                      ?>
                      </td>
                      <?php }?>
                  </tr>
                <?php }?>


                
                </tbody>
              </table>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
