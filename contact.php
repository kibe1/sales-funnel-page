<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require __DIR__ . '/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require __DIR__ . '/vendor/phpmailer/phpmailer/src/SMTP.php';
require __DIR__ . '/vendor/phpmailer/phpmailer/src/Exception.php';

//Load Composer's autoloader
require __DIR__ . '/vendor/autoload.php';



if(isset($_POST['submit'])){

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);


// servername => localhost
// username => root
// password => empty
// database name => stacey
    $conn = mysqli_connect("localhost", "root", "", "stacey");

// Check connection
    if($conn === false){
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }

// Taking all values from the form data(input)
    $name =  $_REQUEST['name'];
    $email = $_REQUEST['email'];

// Performing insert query execution
// here our table name is subscribers
    $sql = "INSERT INTO subscribers  VALUES ('NULL', '$name','$email')";

    if(mysqli_query($conn, $sql)){
        echo "Data Stored";
    }

    else

    {
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
    }

// Close connection
    mysqli_close($conn);




    try {

        //Server settings
//        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'kibete20@gmail.com';                     //SMTP username
        $mail->Password   = 'Blessed@2020';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('kibete20@gmail.com', 'Erick');
        $mail->addAddress('kibete20@outlook.com', 'Erick');     //Add a recipient
//    $mail->addAddress('tactutor248@gmail.com', 'Erick');     //Add a recipient
        $mail->addAddress('cherukib@gmail.com', 'Erick');     //Add a recipient

//    //Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Landing Page Contact List';
        $mail->Body    = "<b>Client Details:</b> <br> 
                          <b>Name:</b> ".$name." <br>
                          <b>Email:</b> ".$email."";


        $mail->send();
        echo 'Message has been sent';

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}
