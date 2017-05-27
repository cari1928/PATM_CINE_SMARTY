<?php
/* Smarty version 3.1.30, created on 2017-05-27 17:42:39
  from "C:\xampp\htdocs\cineMaster\templates\client\compra.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59299e6f78c5a8_03601027',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e07c9f3ce82df7c4ecdbbabe25b81ecde53e4f9f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cineMaster\\templates\\client\\compra.html',
      1 => 1495899623,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
    'file:../mensajes.html' => 1,
    'file:footer.html' => 1,
  ),
),false)) {
function content_59299e6f78c5a8_03601027 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="card mb-3">
  <div class="card-header">

    <?php if (isset($_smarty_tpl->tpl_vars['msg']->value)) {?> <?php $_smarty_tpl->_subTemplateRender("file:../mensajes.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
 <?php }?>

    <a class='btn btn-success btn-xs' 
    href="index.php">
    <i class="fa fa-fw fa-dashboard"></i>  Dashboard</a> 
    <a class='btn btn-success btn-xs' href="#"><i class="fa fa-table"></i> 
    Tipo de Pago</a>
  </div>

  <div class="card-block">
      <div class="table-responsive">
          <table class="table table-bordered" width="100%" id="dataTable" 
          cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>TIPO</th>
                  <th>OPCIONES</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>TIPO</th>
                  <th>OPCIONES</th>
                </tr>
              </tfoot>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Efectivo</td>
                  <td class="text-center">
                    <a class='btn btn-primary btn-xs' 
                    href="compra.php?accion=select&id=1">
                    <i class="fa fa-edit"></i> Select</a>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Tarjeta</td>
                  <td class="text-center">
                    <a class='btn btn-primary btn-xs' 
                    href="compra.php?accion=select&id=2">
                    <i class="fa fa-edit"></i> Select</a>
                  </td>
                </tr>
              </tbody>
          </table>
      </div>
  </div>
  <div class="card-footer small text-muted">
    Updated yesterday at 11:59 PM
  </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
