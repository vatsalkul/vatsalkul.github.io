<?php
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Service = $_POST['services'];
    $Subject = $_POST['subject'];
    $date = date("M,d,Y h:i:s A") . " +4:30hrs";


    //Database Connection
    $conn = new mysqli('88.211.101.188', 'zbfbjwyw_vatsal', 'Rikky_07', 'zbfbjwyw_vatsal');
    if(mysqli_connect_error()) {
        echo "error...\n";
        die('Connection Error: \t'.mysqli_connect_error());
    }else {
        $stmt = $conn->prepare("insert into Data(name, email, subject, service, date) values(?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $Name, $Email, $Subject, $Service, $date);
        $stmt->execute();
        echo "<h1>Submitted successfully... will contact you soon 😃
        </h1>";
        $stmt->close();
        $conn->close();

    }

    $to      = 'nobody@example.com';
    $subject = 'the subject';
    $message = 'hello';
    $headers = 'From: vatsalkul@gmail.com'       . "\r\n" .
                 'Reply-To: webmaster@example.com' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
?>