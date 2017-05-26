<?php

class Login extends Cine
{

  public function newLogin($username, $pass)
  {
    $pass       = md5($pass);
    $url        = $this->getJavaPath() . "persona/validar/" . $username . "/" . $pass;
    $data       = $this->execGET($url);
    $token      = $data['token'];
    $persona_id = $data['persona_id'];

    if (isset($data['token'])) {
      unset($data['pass']); //se destruye la contraseña

      $_SESSION['userData'] = array(
        "username"   => $username,
        "token"      => $token,
        "persona_id" => $data['persona_id'],
        "edad"       => $data['edad'],
      );
      $_SESSION['validado'] = true;

      $url  = $this->getJavaPath() . "privilegio/ver/" . $persona_id . "/" . $token;
      $data = $this->execGET($url);

      // $this->debug($data);

      $roles = array();
      if (isset($data['privilegio'])) {
        if (isset($data['privilegio'][0])) {
          for ($i = 0; $i < sizeof($data['privilegio']); $i++) {
            array_push($roles, $data['privilegio'][$i]['rol_id']);
          }
        } else {
          array_push($roles, $data['privilegio']['rol_id']);
        }

      } else {
        $this->logout();
        header('Location: login.php');
      }

      $_SESSION['roles'] = $roles;
      switch ($_SESSION['roles'][0]) {
        case 1:
          header('Location: client');
          break;
        case 2:
          header('Location: admin');
          break;
        case 3:
          header('Location: worker');
          break;
      }

    } else {
      $this->logout();
    }
  }

  /**
   * [logout description]
   * @return [type] [description]
   */
  public function logout()
  {
    session_destroy(); //se destruye la sesion
  }

  /**
   * [forgotpassword description]
   * @param  [type] $username [description]
   * @param  [type] $cadena   [description]
   * @return [type]           [description]
   */
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
