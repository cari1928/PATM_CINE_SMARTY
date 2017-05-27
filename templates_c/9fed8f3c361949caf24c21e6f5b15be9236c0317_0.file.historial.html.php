<?php
/* Smarty version 3.1.30, created on 2017-05-27 23:52:22
  from "C:\xampp\htdocs\cineMaster\templates\client\historial.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5929f516370613_12872003',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9fed8f3c361949caf24c21e6f5b15be9236c0317' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cineMaster\\templates\\client\\historial.html',
      1 => 1495911436,
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
function content_5929f516370613_12872003 (Smarty_Internal_Template $_smarty_tpl) {
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
    <a class='btn btn-success btn-xs' href="#"><i class="fa fa-table"></i> Historial</a>
  </div>

  <div class="card-block">
      <div class="table-responsive">
          <table class="table table-bordered" width="100%" id="dataTable" 
          cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>PELICULA</th>
                  <th>SALA</th>
                  <th>SUCURSAL</th>
                  <th>FUNCION: HORA</th> <!-- Funcion -->
                  <th>COMPRA: FECHA - HORA</th>
                  <th># ENTRADAS</th>
                  <th>TOTAL</th>
                  <th>TIPO DE PAGO</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>PELICULA</th>
                  <th>SALA</th>
                  <th>SUCURSAL</th>
                  <th>HORA</th> <!-- Funcion -->
                  <th>FECHA</th>
                  <th># ENTRADAS</th>
                  <th>TOTAL</th>
                  <th>TIPO DE PAGO</th>
                </tr>
              </tfoot>
              <tbody>
              <?php if (isset($_smarty_tpl->tpl_vars['compras']->value)) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['compras']->value, 'compra');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['compra']->value) {
?>
                  <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['compra']->value['compra_id'];?>
</td>
                    <td>
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['compra']->value['pelicula'], 'peli');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['peli']->value) {
?>
                         <?php echo $_smarty_tpl->tpl_vars['peli']->value['titulo'];?>
 
                      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </td>
                    <td>
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['compra']->value['sala'], 'sala');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['sala']->value) {
?>
                         <?php echo $_smarty_tpl->tpl_vars['sala']->value['nombre'];?>
 
                      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </td>
                    <td>
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['compra']->value['sucursal'], 'sucursal');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['sucursal']->value) {
?>
                         <?php echo $_smarty_tpl->tpl_vars['sucursal']->value['pais'];?>
 - <?php echo $_smarty_tpl->tpl_vars['sucursal']->value['ciudad'];?>
 - <?php echo $_smarty_tpl->tpl_vars['sucursal']->value['direccion'];?>

                      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </td>
                    <td>
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['compra']->value['funcion'], 'funcion');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['funcion']->value) {
?>
                         <?php echo $_smarty_tpl->tpl_vars['funcion']->value['hora'];?>
 - <?php echo $_smarty_tpl->tpl_vars['funcion']->value['hora_fin'];?>

                      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['compra']->value['fecha'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['compra']->value['entradas'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['compra']->value['total'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['compra']->value['tipo_pago'];?>
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
