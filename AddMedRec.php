<?php
require_once 'webs.php';
require_once 'dbcon.php';
require_once 'Users.php';

if (!isset($_GET['ap'])) {
redirect('index.php');
}
if (!isDoctorLoggedIn()) {
  redirect('Index.php');
}
if (isset($_GET['ap'])) {
  $patient= getPationByAppID($_GET['ap']);
  if(isset($_POST['createMedRec'])) {
    $isSuccess=createMedRec($_GET['ap'],$patient['p_id'],currentDoctorId(),$_POST['medRecDetails']);
    if($isSuccess) {
      alertMessage('Creation is done successfully !');
        redirect('UpcomingAbo.php');
    }
  }
}

?>
<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Go Home Clinic | Create Medical Record </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="css/newstyle.css">
  <link rel="stylesheet" href="css/navstyles.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">

</head>
<body>
<?php require_once('navbar.php'); ?>

  <div>
    <h1>Create Medical Record</h1>
  </div>
  <form action="#" method="post" class="app_form">
    <fieldset>
      <label for="pname">Patient Name</label>
      <input type="text" id="pname" name="pname" value="<?php echo $patient['f_name'].' '. $patient['l_name'];?>" readonly><br><br>
      <label for="medRecDetails">Medical Record Details*</label>
      <textarea name="medRecDetails" id="medRecDetails" cols="30" rows="10" required></textarea> <br><br>
    </fieldset>
    <button type="submit" class="next_button" name="createMedRec">Create</button>

  </form>
  <script type="text/javascript" src="mobile.js"></script>

</body>
</html>