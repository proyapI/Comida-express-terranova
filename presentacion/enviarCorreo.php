<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;    
    require_once "Composer/vendor/autoload.php";      
    $cambio = new cambioClave($_GET["correo"]);
    $cambio ->crear();
    $mail = new PHPMailer();
    $mail ->IsSMTP();
    $mail->SMTPDebug = 2;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host = "smtp.gmail.com";
    $mail->Port= 465;
    $mail->Username = "proyectoapidm@gmail.com";
    $mail->Password = "proyapi2020";
    $mail->SetFrom('proyectoapidm@gmail.com', 'proyecto api');
    $mail->AddReplyTo("proyectoapidm@gmail.com", "proyecto api");
    $mail->Subject = "Cambio de contraseña";
    $mail->MsgHTML("¡Has pedido un cambio de contraseña! <br>Por favor hacer click en en link para cambiar tu contraseña<br>" . 'http://localhost/Comida%20express%20terranova/index.php?pid=' . base64_encode("presentacion/cambioContraseña.php") . "");    
    $address = $_GET["correo"];
    
    $mail->AddAddress($address);
    try {
        $mail->send();
        echo "<script>alert('Message has been sent successfully');window.location = 'index.php';</script>";
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
    
?>