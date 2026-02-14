<?php
require_once 'webs.php';
require_once 'dbcon.php';
require_once 'Users.php';
if (!isPatientLoggedIn()) {
  redirect('Login.php');
}
if (isDoctorLoggedIn() || !isset($_GET['dr'])) {
  redirect('Index.php');
}
if (isset($_GET['dr'])) {
  $DoctorName = getDoctorName($_GET['dr']);
  $patientInfo = getPatientProfileInfo(currentPatientId());
  $allTimes = array("09:00 AM - 10:00 AM", "10:30 AM - 11:00 AM", "12:00 PM - 01:00 PM", "01:30 PM - 02:30 PM", "03:00 PM - 04:00 PM", "04:30 PM - 05:30 PM");
  $UnAvaliableTimesArray = array();

  if (isset($_GET['date'])) {
    $UnAvaliableTimes = getNonAvaliableDoctorTimes($_GET['dr'], $_GET['date']);
    if ($UnAvaliableTimes) {
      foreach (explode(",", $UnAvaliableTimes['unavilable_times']) as  $v)
        $UnAvaliableTimesArray[] = $v;
    }
    if (isset($_POST['bookApp'])) {
      $isSuccess = boodAppointment(
        $_POST['date'],
        $_POST['app_location'],
        $_POST['app_time'],
        $_POST['cost'],
        $_POST['card_number'],
        $_POST['name_in_card'],
        currentPatientId(),
        $_GET['dr']
      );
      if ($isSuccess) {
        alertMessage('Booking is done Successfully ^_^ ');
        redirect('Index.php');
      }
    }
  }
}



?>
<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Go Home Clinic | Book an Appointment </title>
  <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="css/newstyle.css">
  <link rel="stylesheet" href="css/navstyles.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
  <style>
    .parPay {
      font-size: medium;
      font-weight: 600;
    }

    .spanPrice {
      font-size: large;
      font-weight: 800;
    }

    .none {
      display: none;
    }
  </style>
</head>

<body>
  <?php require_once('navbar.php'); ?>

  <div>
    <h1>Book your Appointment !</h1>
  </div>

  <form action="#" method="post" class="app_form">
    <fieldset>
      <legend><span class="number">1</span>Your basic details</legend>
      <label for="name">Name:</label>
      <input type="text" id="name" readonly value="<?php echo $patientInfo['f_name'] . ' ' . $patientInfo['l_name']; ?>">
      <br><br>
      <label for="mail">Email:</label>
      <input type="email" id="mail" readonly value="<?php echo $patientInfo['p_email']; ?>">
      <br><br>
      <label for="tel">Contact Num:</label>
      <input type="tel" id="tel" readonly value="<?php echo $patientInfo['p_phoneNo']; ?>">
      <br><br>
    </fieldset>
    <fieldset>
      <legend><span class="number">2</span>Appointment Details</legend>
      <label for="doc_name">Selected Doctor Name:</label>
      <input type="text" id="doc_name" name="" value="<?php echo $DoctorName['dr_name']; ?>" readonly>
      <br><br>
      <label for="date">Date*:</label>
      <!-- <input type="hidden" > -->
      <input type="date" id="date" name="date" value="<?php echo isset($_GET['date']) ? "$_GET[date]" : "" ?>" min="<?= date('Y-m-d') ?>" max="<?= date('Y-m-d', strtotime('+7 days')) ?>" required></input>
      <br><br>

      <label for="time">Time*:</label><br>
      <label for="time"></label>
      <select id="time" name="app_time" required>
        <option value="" selected disabled>Select Appointment Time</option>

        <?php foreach ($allTimes as $time) { ?>
          <option value="<?php echo $time; ?>" <?php echo in_array($time, $UnAvaliableTimesArray) ? "disabled" : "" ?>><?php echo $time; ?></option>
        <?php } ?>
      </select>
      <br><br>
      <lable for="location">Location*:</lable>
      <select name="app_location" required>
        <option value="Al Hofuf">Al Hofuf</option>
        <option value="Al Mubarraz">Al Mubarraz</option>
      </select>
      <br><br>
      <p class="parPay">Price per hour: <span class="spanPrice">100 SR</span></p><br><br>

      <button type="button" class="next_button">Next</button>
    </fieldset>

    <fieldset class="none">
      <legend><span class="number">3</span>Payment Details</legend>
      <p class="parPay">Service Price: <span id="price" class="spanPrice">100 SR</span></b></p><br>
      <p class="parPay">Service Fee: <span class="spanPrice">10 SR</span></b></p><br>
      <p class="parPay">Toltal Price: <span id="totalprice" class="spanPrice">110 SR</span></b></p><br>
      <input type="hidden" id="inputcost" name="cost" value="110"><br><br>
      <label for="card_num">Card Number:</label>
      <input type="number" id="card_num" name="card_number" placeholder="Enter Curd Number ex:4535*****"><br><br>
      <label for="card_num">Name In Your Card:</label>
      <input type="text" id="name_card" name="name_in_card" placeholder="Enter Name in the Curd  ex:  Sara..."><br><br>
      <p class="parPay">Current Date : <span id="current_date" class="current_date"></span></b></p><br><br>
      <button type="submit" class="submit" name="bookApp">Submit</button>
    </fieldset>
  </form>


  <script>
    const app_date = document.getElementById("date");
    app_date.addEventListener("change", function() {
      var selectedDate = app_date.value;
      window.location.href = "BookAbo.php?dr=<?php echo $_GET['dr']; ?>&date=" + selectedDate;
    })
    // Get the current_date element 
    function getCurrentDateTime() {
      const dateTime = new Date();
      return dateTime.toLocaleString();
    }
    // const displayCurrentDate = document.getElementById("current_date");
    // displayCurrentDate.innerHTML=getCurrentDateTime();
    // // Get the input elements and price span
    // //const startTimeInput = document.getElementById("start-time");
    const selectedTime = document.getElementById("time");
    // //const endTimeInput = document.getElementById("end-time");

    // // Define the price per hour
    // const pricePerHour = 100;

    // // Define the service fee
    // const serviceFee = 10;


    // // Add event listeners to update the price when the user changes the start or end time
    // //startTimeInput.addEventListener("input", updatePrice);
    // //endTimeInput.addEventListener("input", updatePrice);
    // const priceSpan = document.getElementById("price");
    // const totalprice = document.getElementById("totalprice");
    // const inputcost = document.getElementById("inputcost");

    // function updatePrice() {
    //   //const startTime = parseTime(startTimeInput.value);
    //   //const endTime = parseTime(endTimeInput.value);

    //   if (!isNaN(startTime) && !isNaN(endTime) && startTime < endTime) {
    //     //const hours = (endTime - startTime) / 60;
    //     //const price = hours * pricePerHour;
    //     //const total = price + serviceFee;
    //     //inputcost.value = total.toFixed(2);
    //     //console.log(inputcost.value);
    //     //priceSpan.textContent =  price.toFixed(2)+ " SR" ;
    //     //totalprice.textContent = total.toFixed(2)+ " SR";
    //   } else {
    //     //priceSpan.textContent = "0 SR";
    //     //totalprice.textContent="0 SR";
    //   }
    // }

    // function parseTime(timeString) {
    //   const parts = timeString.split(":");
    //   if (parts.length === 2) {
    //     const hours = parseInt(parts[0]);
    //     const minutes = parseInt(parts[1]);
    //     if (!isNaN(hours) && !isNaN(minutes)) {
    //       return hours * 60 + minutes;
    //     }
    //   }
    //   return NaN;
    // }


    const nextButton = document.querySelector('.next_button');
    const form = document.querySelector('.app_form');
    const date = document.querySelector('#date');
    nextButton.addEventListener('click', e => {
      if (!date.value == "" && !selectedTime.value == "") {
        form.firstElementChild.classList.add('none');
        form.children[1].classList.add('none');
        form.lastElementChild.classList.remove('none');
      }
    })
  </script>
  <script type="text/javascript" src="mobile.js"></script>

</body>

</html>