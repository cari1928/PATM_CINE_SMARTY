<?php
/* Smarty version 3.1.30, created on 2017-05-27 17:32:24
  from "C:\xampp\htdocs\cineMaster\templates\client\asientos_disponibles.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59299c08c523d6_08701617',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8f0d09312960b47ba5e110d798283196c7d02e0e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cineMaster\\templates\\client\\asientos_disponibles.html',
      1 => 1495899141,
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
function content_59299c08c523d6_08701617 (Smarty_Internal_Template $_smarty_tpl) {
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
    <a class='btn btn-success btn-xs' href="#"><i class="fa fa-table"></i> Asientos Disponibles</a>
  </div>

  <div class="card-block">
      <div class="table-responsive">
          <table class="table table-bordered" width="100%" id="dataTable" 
          cellspacing="0">
              <thead>
                <tr>
                  <th class="text-center">ID</th> <!-- ASIENTO_ID -->
                  <th class="text-center">SALA</th>
                  <th class="text-center">FILA</th>
                  <th class="text-center">COLUMNA</th>
                  <th class="text-center">OPCIONES</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th class="text-center">ID</th> <!-- ASIENTO_ID -->
                  <th class="text-center">SALA</th>
                  <th class="text-center">FILA</th>
                  <th class="text-center">COLUMNA</th>
                  <th class="text-center">OPCIONES</th>
                </tr>
              </tfoot>
              <tbody>
              <?php if (isset($_smarty_tpl->tpl_vars['asientos']->value)) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['asientos']->value, 'dis');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['dis']->value) {
?>
                  <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['dis']->value['asiento_id'];?>
</td>
                    <td> 
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dis']->value['sala'], 'sala');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['sala']->value) {
?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sala']->value['sucursal'], 'suc');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['suc']->value) {
?>
                          <?php echo $_smarty_tpl->tpl_vars['sala']->value['nombre'];?>
 - <?php echo $_smarty_tpl->tpl_vars['suc']->value['pais'];?>
 - <?php echo $_smarty_tpl->tpl_vars['suc']->value['ciudad'];?>
 - <?php echo $_smarty_tpl->tpl_vars['suc']->value['direccion'];?>

                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
 
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['dis']->value['fila'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['dis']->value['columna'];?>
</td>
                    <td class="text-center">
                      <a class='btn btn-primary btn-xs'
                      href="asientos_disponibles.php?accion=select&id=<?php echo $_smarty_tpl->tpl_vars['dis']->value['asiento_id'];?>
">
                      <i class="fa fa-edit"></i> Select</a> 
                    </td>
                  </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
  
              <?php }?>                
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
