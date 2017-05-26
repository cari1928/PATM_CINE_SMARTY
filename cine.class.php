<?php

session_start(); //iniciamos la sesion 2016-10-20

include 'configs/configuration.php';
require_once 'lib/smarty/Smarty.class.php';

class Cine
{
  /****************************************************************************
  CLASS VARIABLES
   ****************************************************************************/
  public $cliente   = null;
  public $conn      = null;
  public $tabla     = null;
  public $response  = null; //para las respuestas de los Servicios Web
  private $PHP_PATH = "http://192.168.1.67/cineSlim/public/index.php/api/";
  private $JAVA_PHP = "http://192.168.1.67:8082/PATM_CINE/apirest/";

  public function getPhpPath()
  {
    return $this->PHP_PATH;
  }

  public function getJavaPath()
  {
    return $this->JAVA_PHP;
  }

  /****************************************************************************
  DATABASE CONNECTION  METHODS
   ****************************************************************************/
  public function conexion()
  {
    $this->conn = new PDO(
      DB_ENGINE . ':host=' . DB_IP . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
  }

  /**
   * Ejecuta un web service con petición GET
   * @param  [String] $url [Dirección del web service]
   * @return [array]      [Datos]
   */
  public function execGET($url)
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL            => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING       => "",
      CURLOPT_MAXREDIRS      => 10,
      CURLOPT_TIMEOUT        => 30,
      CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST  => "GET",
      CURLOPT_HTTPHEADER     => array(
        "authorization: Basic cm9vdDpyb290",
        "cache-control: no-cache",
        "postman-token: 007e6b22-3ae6-1ee8-84bd-6e57d9f90976",
      ),
    ));
    $this->response = curl_exec($curl);
    $err            = curl_error($curl);
    curl_close($curl);
    if ($err) {
      echo "cURL Error #:" . $err;
      $this->response = $err;
    } else {
      return json_decode($this->response, true);
    }
  }

  public function execPOST($url, $json)
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL            => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING       => "",
      CURLOPT_MAXREDIRS      => 10,
      CURLOPT_TIMEOUT        => 30,
      CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST  => "POST",
      CURLOPT_POSTFIELDS     => $json,
      CURLOPT_HTTPHEADER     => array(
        "authorization: Basic cm9vdDpyb290",
        "cache-control: no-cache",
        "content-type: application/json",
        "postman-token: 12da6577-7a65-046f-0387-3ecca8dbb3df",
      ),
    ));
    $response = curl_exec($curl);
    $err      = curl_error($curl);
    curl_close($curl);
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
      return json_decode($this->response, true);
    }
  }

  public function execPUT($url, $json)
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL            => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING       => "",
      CURLOPT_MAXREDIRS      => 10,
      CURLOPT_TIMEOUT        => 30,
      CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST  => "PUT",
      CURLOPT_POSTFIELDS     => $json,
      CURLOPT_HTTPHEADER     => array(
        "authorization: Basic cm9vdDpyb290",
        "cache-control: no-cache",
        "content-type: application/json",
        "postman-token: 91a0eb3f-5277-2089-54c4-7646551cba04",
      ),
    ));
    $response = curl_exec($curl);
    $err      = curl_error($curl);
    curl_close($curl);
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
      return json_decode($this->response, true);
    }
  }

  public function execDELETE($url)
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL            => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING       => "",
      CURLOPT_MAXREDIRS      => 10,
      CURLOPT_TIMEOUT        => 30,
      CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST  => "DELETE",
      CURLOPT_HTTPHEADER     => array(
        "authorization: Basic cm9vdDpyb290",
        "cache-control: no-cache",
        "postman-token: 4f462b55-c917-49e0-4386-c75d47914612",
      ),
    ));
    $response = curl_exec($curl);
    $err      = curl_error($curl);
    curl_close($curl);
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
      return json_decode($this->response, true);
    }
  }

  /****************************************************************************
  METHOD TO GET AN INDEXED ARRAY WITH THE INFORMATION OF A QUERY
  @param   String $query QUERY SQL
   ****************************************************************************/
  public function getAll($query)
  {
    $datos = array();
    foreach ($this->conn->query($query) as $fila) {
      array_push($datos, $fila);
    }
    return $datos;
  }

  /****************************************************************************
  METHOD TO GET AN ASSOCIATIVE ARRAY WITH THE INFORMATION OF A QUERY
  @param   String $query QUERY SQL
   ****************************************************************************/
  public function fetchAll($query)
  {
    $statement = $this->conn->Prepare($query);
    $statement->Execute();
    $datos = $statement->FetchAll(PDO::FETCH_ASSOC);
    return $datos;
  }

  /****************************************************************************
  METHOD INITIALIZE SMARTY TEMPLATES
   ****************************************************************************/
  // 2016-09-27_SMARTY_INICIOS
  public function templateEngine()
  {
    $smarty = new Smarty(); //instancia la variable smarty
    $smarty->setTemplateDir(TEMPLATE);
    $smarty->setCompileDir(TEMPLATE_C);
    $smarty->setConfigDir(CONFIGS);
    $smarty->setCacheDir(CACHE);
    return $smarty;
  }

  /****************************************************************************
  METHOD TO GET HTML CODE OF A DROPDOWN LIST
  @param   String $query QUERY SQL
  @param   int $selected ELEMNT TO SELECT
   ****************************************************************************/
  //2016-10-04, regresa un arreglo asociativo, es para hacer combo
  public function showList($query, $selected = null)
  {
    $datos     = $this->getAll($query);
    $nombDatos = array_keys($datos[0]);
    $template  = $this->templateEngine();
    $template->assign('selected', $selected); //2016-10-06
    $template->assign('datos', $datos);
    $template->assign('nombDatos', $nombDatos);
    //fecth: procesa la plantilla, el resultado lo guarda en una variable
    return $template->fetch('select.component.html'); //Esto es hermoso T-T
  }

  /****************************************************************************
  METHOD TO STABLISH THE MANIPULATED TABLE
  @param   array $tabla CONTAINS THE COLUMNS OF GET OR POST TABLE
   ****************************************************************************/
  //2016-10-10
  public function setTabla($tabla)
  {
    //Método para asignar la tabla
    $this->tabla = $tabla;
  }

  /****************************************************************************
  METHOD TO GET THE NAME OF THE TABLE
   ****************************************************************************/
  //2016-10-10
  public function getTabla()
  {
    return $this->tabla;
  }

  /****************************************************************************
  GENERIC METHOD TO UPDATE ANY TABLE
  @param   array  $datos      CONTAINS THE COLUMNS OF GET OR POST
  @param   String $id         INDICATES PRIMARY KEY
  @param   array  $condition  ELEMENTS OF WHERE CONDITION
   ****************************************************************************/
  //2016-10-10
  public function update($datos, $id, $condition = null)
  {
    $nombresColumnas = $this->getNombresColumnas($datos); //2016-10-11
    $columnas        = $this->getColumnas($datos, 'update'); //2016-10-11

    $where = "";
    if (!empty($condition)) {
      $where                = " where ";
      $nombresColumnasWhere = array_keys($condition); //2016-10-11
      for ($i = 0; $i < sizeof($nombresColumnasWhere); $i++) {
        $where .= $nombresColumnasWhere[$i]; //2016-10-11
        $where .= '=:' . $nombresColumnasWhere[$i]; //2016-10-11
        if ($i != sizeof($nombresColumnasWhere) - 1) {
          $where .= ' and ';
        }

      }
    }

    $sql  = "update " . $this->getTabla() . " set " . $columnas . $where;
    $stmt = $this->conn->prepare($sql);
    for ($i = 0; $i < sizeof($nombresColumnas); $i++) { //2016-10-11
      $stmt->bindParam(':' . $nombresColumnas[$i], $datos[$nombresColumnas[$i]]); //2016-10-11
    }
    $stmt->execute();
  }

  /****************************************************************************
  GENERIC METHOD TO INSERT ANY TABLE
  @param   array  $datos      CONTAINS THE COLUMNS OF GET OR POST
   ****************************************************************************///2016-10-11
  public function insert($datos)
  {
    $nombresColumnas = $this->getNombresColumnas($datos);
    $columnas[0]     = $this->getColumnas($datos, 'insert');
    $columnas[1]     = ":" . str_replace(',', ',:', $columnas[0]);

    $sql = "insert into " . $this->getTabla() . " (" . $columnas[0] . ") values(" . $columnas[1] . ")";

    $stmt = $this->conn->prepare($sql);
    for ($i = 0; $i < sizeof($nombresColumnas); $i++) {
      $stmt->bindParam(':' . $nombresColumnas[$i], $datos[$nombresColumnas[$i]]);
    }
    $stmt->execute();
  }

  /****************************************************************************
  RETURNS THE COLUMNS INGRESED SEPARATED WITH COMMAS OR ,=:
  @param   array    $datos  CONTAINS THE COLUMNS OF THE TABLE
  @param   String   $accion INDICATES THE DML OPERATION: INSERT OR UPDATE
   ****************************************************************************/
  //2016-10-11
  public function getColumnas($datos, $accion = null)
  {
    $nombresColumnas = $this->getNombresColumnas($datos);
    $columnas        = "";
    for ($i = 0; $i < sizeof($nombresColumnas); $i++) {
      $columnas .= $nombresColumnas[$i];

      if ($accion == 'update') //si es por update se separa por =:
      {
        $columnas .= '=:' . $nombresColumnas[$i];
      }

      if ($i != sizeof($nombresColumnas) - 1) {
        $columnas .= ',';
      }
      //separa por comas
    }
    return $columnas;
  }

  /****************************************************************************
  GENERIC METHOD TO UPDATE ANY TABLE
  @param   array  $datos      CONTAINS THE COLUMNS OF GET OR POST
   ****************************************************************************/
  //2016-10-11 //regresa los campos separados por comas y por :=
  public function getNombresColumnas($datos)
  {
    return array_keys($datos);
  }

/****************************************************************************
METHOD THAT RETURNS A QUERY IN HTML SINTAX
@param   String  $query      CONTAINS THE SQL QUERY
 ****************************************************************************/
  //2016-10-13
  public function getQuery2HTML($query)
  {
    $datos    = $this->getAll($query);
    $campos   = $this->getNombresColumnas($datos[0]);
    $template = $this->templateEngine();
    $template->assign('datos', $datos);
    $template->assign('campos', $campos);
    return $template->fetch('query2html2.component.html'); //Esto es hermoso T-T
  }

//------------------------------------------------------------------------------

  public function checarAcceso($rol = null)
  {
    $data = $_SESSION;
    if (isset($data['validado'])) {
      if ($data['validado']) {

        //CHECAR ESTO!!!!
        //Se debe checar que el rol ingresado esté dentro del arreglo de session, si lo está, lo deja pasar sino no
        $roles = $_SESSION['roles'];
        $flag  = true;
        // echo "<pre>";
        for ($i = 0; $i < count($roles); $i++) {
          if ($roles[$i]['rol'] != $rol) {
            $flat = false;
          }
        }

        if (!$flag) {
          header('Location: login.php');
        }

      } else {
        header('Location: login.php');
      }
    } else {
      header('Location: login.php');
    }
  }

  //------------------------------------------------------------------------------
  public function forgotpassword($email, $cadena)
  {
    $mail = new PHPMailer();
    // $body             = file_get_contents('contents.html');
    // $body             = eregi_replace("[\]",'',$body);
    $mail->IsSMTP(); // telling the class to use SMTP
    // $mail->SMTPDebug  = 2; // enables SMTP debug information (for testing)
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
    <br> <br>
    <a href='http://www.cp_web.com/cp_web/forgot.php?action=recuperar&clave=" . $cadena . "' class='btn btn-primary'> Recuperar Contraseña </a>
    <br> <br>
    Este vínculo tendrá vigencia de dos día a partir de la recepción de este email
    <br>
    Atentamente: <br>
    Contadores CPWEB
    ";

    $mail->MsgHTML($body);
    $address = $email;
    $mail->AddAddress($address, "Usuario CPWEB");

    if (!$mail->Send()) {
      // echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
      // echo "Message sent!";
    }
  }

  /**
   * Para mostrar el contenido de un arreglo
   * Usado en fase de pruebas
   * @param  [type] $array [description]
   * @return [type]        [description]
   */
  public function debug($array)
  {
    echo "<pre>";
    print_r($array);
    die();
  }

  /**
   * Versión simple de la función message, asigna los elementos necesarios para mostrar mensajes
   * de error
   * @param  String $alert warning | danger principalmente
   * @param  String $msg   Mensaje de error a mostrar
   * @param  Class  $web   Objeto para poder hacer uso de smarty
   */
  public function simple_message($template, $alert, $msg)
  {
    $template->assign('alert', $alert);
    $template->assign('msg', $msg);
  }

  /**
   * get all assigned template vars
   * @return variables asignadas con smarty->assing y sus contenidos
   */
  public function getSmartyAssigns($templates)
  {
    $pageName = $templates->getTemplateVars();
    $this->debug($pageName);
  }

  // returns true if $needle is a substring of $haystack
  public function contains($needle, $haystack)
  {
    return strpos($haystack, $needle) !== false;
  }

} //END OF THE CLASS
//-----------------------------------------------------------------------------------------------

//Incluimos todos los controladores - //2016-09-29 se agregó foreach
// foreach (glob("controllers/*.php") as $nombre_fichero) {
//     include($nombre_fichero);
// }

// include 'controllers/clientes.php'; ////2016-09-29 En lo que se arregla el foreach de arriba
// include 'controllers/estados.php';
// include 'controllers/tipos.php';
// include 'controllers/roles.php';
// include 'controllers/privilegios.php';
// include 'controllers/usuarios.php';
// include 'controllers/usuario_rol.php';
include 'controllers/login.php';
include 'controllers/admin/notification.php';
include 'controllers/admin/sucursal.php';

$web = new Cine;
$web->conexion();
$template = $web->templateEngine(); //2016-09-27_SMARTY_INICIOS
//
