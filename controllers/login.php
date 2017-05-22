<?php

class Login extends Cine
{

  public function fakeLogin()
  {
    header('Location: admin');
  }

  public function newLogin($username, $pass)
  {
    $pass = md5($pass);
    $sql  = "SELECT * FROM persona
    WHERE username='" . $username . "' and pass='" . $pass . "'";
    $data = $this->fetchAll($sql);

    if (isset($data[0])) {
      unset($data[0]['pass']); //se destruye la contraseña
      $_SESSION['username']   = $data[0]['username'];
      $_SESSION['id_usuario'] = $data[0]['id_usuario'];
      $_SESSION['validado']   = true;

      $roles = $this->fetchAll(
        "select * from rol
          where id_rol in (select id_rol from usuario_rol
                            where id_usuario in (select id_usuario from usuario
                                                  where username='" . $data[0]['username'] . "'))");
      $_SESSION['roles'] = $roles;

      //print_r($roles);
      //die();

      if ($roles[0]['rol'] == 'Cliente') {
        header("Location: cliente/index.php");
      } else {
        header("Location: admin/index.php");
      }

    } else {
      $this->logout();
    }
  }

//------------------------------------------------------------------------------
  public function logout()
  {
    session_destroy(); //se destruye la sesion
  }
//------------------------------------------------------------------------------
  public function forgotpassword($username, $cadena)
  {
    $mail = new PHPMailer();
    $body = file_get_contents('contents.html');
    $body = eregi_replace("[\]", '', $body);
    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPDebug = 2; // enables SMTP debug information (for testing)
    // 1 = errors and messages
    // 2 = messages only
    $mail->SMTPAuth   = true; // enable SMTP authentication
    $mail->SMTPSecure = "tls"; // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port       = 587; // set the SMTP port for the GMAIL server
    $mail->Username   = "namikaze1928@gmail.com"; // GMAIL username
    $mail->Password   = "radogan1995"; // GMAIL password

    $mail->SetFrom('namikaze1928@gmail.com', 'Carolina Santana');
    $mail->Subject = "Recuperación de Contraseña CPWEB";
    $body          = "Querido usuario usted ha solicitado reestablecimiento de contraseña, por favor presione el siguiente vínculo:

      http://www.cp_web.com/admin/forgot.php?action=recuperar&clave=" . $cadena . "

      Este vínculo tendrá vigencia de dos día a partir de la recepción de este username
      Atentamente:
      Contadores CPWEB

      ";

    $mail->MsgHTML($body);
    $address = $username;
    $mail->AddAddress($address, "Usuario CPWEB");

    if (!$mail->Send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
      echo "Message sent!";
    }
    die();
  }
}
