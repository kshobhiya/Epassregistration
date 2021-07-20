<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require "vendor/autoload.php";
    require "database.php";
    if(isset($_GET["formid"])){
        $form_id=$_GET["formid"];
        $sql= "SELECT * FROM `registration` WHERE  `form id`='$form_id'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $fname=$row["firstname"];
                $lname=$row["lastname"];
                $email=$row["email"];
                $mobilenum=$row["phonenumber"];
                $reason=$row["reason"];
                $district=$row["district"];
                $city=$row["from place"];
                $ddistrict=$row["destination district"];
                $dcity=$row["destination place"];
                $date=$row["date"];
                $vehicle=$row["vehicle number"];
            }
        }
    }
    $mail = new PHPMailer(true);
    try{
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host="smtp.gmail.com";
        $mail->SMTPAuth="true";
        $mail->SMTPSecure="tls";
        $mail->Port="587";
        $mail->Username="programmingcontrol02@gmail.com";
        $mail->Password="programming02";
        $mail->isHTML(true);
        $mail->Subject="Epass Registration Confirmation";
        $mail->setFrom("programmingcontrol02@gmail.com");
        $mail->Body=" Epass has been registered successfully<br>
                    in name:$fname $lname<br>
                    on date:$date<br>
                    vechile number:$vehicle<br>
                    Epass has been valid for 5days from the date of travel registered.";
        $mail->addAddress($email);
        $mail->Send();
        header("Location:index.php?success=mail sent successfully");
    }catch (Exception $e){
        header("Location:index.php?error=failure in sending mail");
    }
?>