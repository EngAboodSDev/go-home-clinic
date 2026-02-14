<?php
require_once 'webs.php';
require_once 'dbcon.php';
require_once 'Users.php';


if (!isDoctorLoggedIn()) {
  redirect('Index.php');
}
else {

  if (!isset($_GET['md']) || !isset($_GET['ap']) ) {
    redirect('index.php');
  }
  else if (isset($_GET['md']) && isset($_GET['ap'])) {
    $patient= getPationByAppID($_GET['ap']);
    $medDetails=getMedicalRecordDetails($_GET['md']);
    if(isset($_POST['updateMedRec'])) {
      $isSuccess=updateMedRec($_GET['md'],$_POST['medRecDetails']);
      if($isSuccess) {
        alertMessage('Modified successfully  ^_^');
          redirect('MedicalRecords.php');
      }
    }
  }
  else{
    redirect('Index.php');
  }
}
?>
<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Go Home Clinic | Edit Medical Record Details </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="css/newstyle.css">
  <link rel="stylesheet" href="css/navstyles.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">

</head>
<body>
<?php require_once('navbar.php'); ?>

  <div>
    <h1>Edit Medical Record Details</h1>
  </div>
  <form action="#" method="post" class="app_form">
    <fieldset>
      <!-- <legend><span class="number">1</span>Your basic details</legend> -->
      <label for="pname">Patient Name:</label>
      <input type="text" id="pname" name="pname" value="<?php echo $patient['f_name'].' '. $patient['l_name'];?>" readonly><br><br>
      <label for="medRecDetails">Medical Record Details*:</label>
      <textarea name="medRecDetails" id="medRecDetails" cols="30" rows="10"><?php echo $medDetails['med_rec_details'];?></textarea> <br><br>
    </fieldset>
    <button type="submit" class="" name="updateMedRec" >Update and Save </button>
    <button type="button"class="redButton" onclick="window.location.href='MedicalRecords.php';">Cancel</button>

  </form>
  <script type="text/javascript" src="mobile.js"></script>

</body>
</html>