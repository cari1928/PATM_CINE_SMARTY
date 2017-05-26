<?php

class Sucursal extends Cine
{

  /**
   * regresa arreglo asociativo, solo títulos
   * @param  [type] $query [description]
   * @return [type]        [description]
   */
  public function fetchAll($query)
  {
    $statement = $this->conn->Prepare($query);
    $statement->Execute();
    $sucursales = $statement->FetchAll(PDO::FETCH_ASSOC);
    return $sucursales;
  }

  /**
   * Obtiene un sucursal en específico
   * @param  [type] $idSucursal [description]
   * @return [type]            [description]
   */
  public function getSucursal($idSucursal)
  {
    $sucursales = array();
    if (is_numeric($idSucursal)) {
      $statement = $this->conn->Prepare('select * from sucursal where id_sucursal=' . $idSucursal);
      $statement->Execute();
      $sucursales = $statement->FetchAll(PDO::FETCH_ASSOC);
    }
    return $sucursales;
  }

  /**
   * Actualiza un sucursal
   * @param  [type] $id_sucursal [description]
   * @param  [type] $datos      [description]
   * @return [type]             [description]
   */
  public function updateSucursal($id_sucursal, $datos)
  {
    print_r($datos);
    die($id_sucursal);
    $sql = "UPDATE sucursal SET id_sucursal= :id_sucursal, razon_social= :razon_social, rfc= :rfc,
                domicilio= :domicilio, email= :email, telefono= :telefono, id_tipo= :id_tipo
              WHERE id_sucursal = :id_sucursal";
    $stmt = $this->conn->Prepare($sql);
    $stmt->bindParam(':id_sucursal', $id_sucursal, PDO::PARAM_INT);
    $stmt->bindParam(':razon_social', $datos['razon_social'], PDO::PARAM_STR);
    $stmt->bindParam(':rfc', $datos['rfc'], PDO::PARAM_STR);
    $stmt->bindParam(':domicilio', $datos['domicilio'], PDO::PARAM_STR);
    $stmt->bindParam(':email', $datos['email'], PDO::PARAM_STR);
    $stmt->bindParam(':telefono', $datos['telefono'], PDO::PARAM_STR);
    $stmt->bindParam(':id_tipo', $datos['id_tipo'], PDO::PARAM_INT);
    $stmt->Execute();
  }

  /**
   * Inserta un sucursal
   * @param  [type] $id_sucursal [description]
   * @param  [type] $datos      [description]
   * @return [type]             [description]
   */
  public function insertSucursal($id_sucursal, $datos)
  {
    //AÚN NO ESTÁ
    print_r($datos);
    die($id_sucursal);
    $sql = "INSERT INTO sucursal SET id_sucursal= :id_sucursal, razon_social= :razon_social, rfc= :rfc,
                domicilio= :domicilio, email= :email, telefono= :telefono, id_tipo= :id_tipo
              WHERE id_sucursal = :id_sucursal";
    $stmt = $this->conn->Prepare($sql);
    $stmt->bindParam(':id_sucursal', $id_sucursal, PDO::PARAM_INT);
    $stmt->bindParam(':razon_social', $datos['razon_social'], PDO::PARAM_STR);
    $stmt->bindParam(':rfc', $datos['rfc'], PDO::PARAM_STR);
    $stmt->bindParam(':domicilio', $datos['domicilio'], PDO::PARAM_STR);
    $stmt->bindParam(':email', $datos['email'], PDO::PARAM_STR);
    $stmt->bindParam(':telefono', $datos['telefono'], PDO::PARAM_STR);
    $stmt->bindParam(':id_tipo', $datos['id_tipo'], PDO::PARAM_INT);
    $stmt->Execute();
  }
//----------------------------------------------------------------------------------------------------------
  public function deleteSucursal($id_sucursal)
  {
    //2016-09-29
    // $count = $this->conn->exec("DELETE FROM sucursal WHERE id_sucursal=".$id_sucursal);
    //Esto previene inyección SQL!!!
    $sql  = "DELETE FROM sucursal WHERE id_sucursal= :id_sucursal";
    $stmt = $this->conn->Prepare($sql);
    $stmt->bindParam(':id_sucursal', $id_sucursal, PDO::PARAM_INT);
    $stmt->execute();
  }
}
//----------------------------------------------------------------------------------------------------------
