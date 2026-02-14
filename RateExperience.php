
<?php
require_once 'webs.php';
require_once 'dbcon.php';
require_once 'Users.php';

if (!isPatientLoggedIn()) {
    redirect('Index.php');
}
if (isset($_GET['pId']) && isset($_GET['dId'])) {
    // $PatientDetails= getPatientProfileInfo($_GET['pId']);
    if (isset($_POST['rate'])) {
        $isSuccess=rateExperience($_POST['num_stars'],$_GET['pId'],$_GET['dId']);
        if ($isSuccess) {
            alertMessage('Thank You for Rating Our Services ^_^');
            redirect('MyMedRecord.php');
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Go Home Clinic | Rate Your Experience</title>
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" type="text/css" href="css/navstyles.css">
    <link rel="stylesheet" type="text/css" href="css/newstyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
    <style>
        #review{
            resize: vertical;
        }
        .title {
            font-size: larger;
            font-weight: 700;
            text-align: center;
        }
        .title::before{
            content: '';
            border-radius: 10px;
            border-color: black;
        }
    </style>
</head>

<body class="re_body">
    <header class="navbar">
        <a class="navlogo" href="Index.php"><img src="imgs/logo-without background .png" alt="logo" width="70"
                height="70"></a>
    </header>
    <div class="reg_form edit_form">
        <div class="re-sub-form">
            <form method="post" action="#" class="re_form">
                <br><h2 style="text-align: center;">Rate Your Experience</h2><br>
                <input type="hidden" name="recipient">
                <p class="title"><?php echo isset($_GET['dId'])? getDoctorName($_GET['dId'])['dr_name']: ""?></p>
                <div class="review_stars">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                    </div>
                    <input type="hidden" id="num_stars" name="num_stars" value="5">
                    <button type="submit" name="rate">Rate</button>
                    <a href="MyMedRecord.php" class="cancel" >Cancel</a><br><br>
            </form>
        </div>
    </div>
    <!-- <script>
  // Get all star elements
  const stars = document.querySelectorAll('.review_stars span');

  // Add click event listener to each star
  stars.forEach((star, index) => {
    star.addEventListener('click', () => {
      // Remove "checked" class from all stars
      stars.forEach((s) => {
        s.classList.remove('checked');
      });

      // Add "checked" class to clicked star and previous stars
      for (let i = 0; i <= index; i++) {
        stars[i].classList.add('checked');
      }
    });
  });
</script> -->




<script>
  // Get all star elements
  const stars = document.querySelectorAll('.review_stars span');
  const numOfStars = document.getElementById('num_stars');

  // Add click event listener to each star
  stars.forEach((star, index) => {
    star.addEventListener('click', () => {
      // Remove "checked" class from all stars
      stars.forEach((s) => {
        s.classList.remove('checked');
      });

      // Add "checked" class to clicked star and previous stars
      for (let i = 0; i <= index; i++) {
        stars[i].classList.add('checked');
      }

      // Update the number of checked stars
      numOfStars.value = index + 1;
    });
  });
  console.log(numOfStars.value);
</script>
    <script type="text/javascript" src="mobile.js"></script>


</body>



</html>