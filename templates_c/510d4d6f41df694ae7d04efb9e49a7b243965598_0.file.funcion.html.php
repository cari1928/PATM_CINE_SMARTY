<?php
/* Smarty version 3.1.30, created on 2017-05-27 02:16:28
  from "C:\xampp\htdocs\cineMaster\templates\admin\funcion.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5928c55ce854c1_64258992',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '510d4d6f41df694ae7d04efb9e49a7b243965598' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cineMaster\\templates\\admin\\funcion.html',
      1 => 1495843327,
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
function content_5928c55ce854c1_64258992 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="card mb-3">
  <div class="card-header">

    <?php if (isset($_smarty_tpl->tpl_vars['msg']->value)) {?> <?php $_smarty_tpl->_subTemplateRender("file:../mensajes.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
 <?php }?>

    <a class='btn btn-link btn-xs' 
    href="index.php">
    <i class="fa fa-fw fa-dashboard"></i>  Dashboard</a> 

    <a class='btn btn-link btn-xs' href="#"><i class="fa fa-table"></i> Funciones</a>

    <a class='btn btn-primary btn-xs' 
    href="funcion.php?accion=form_nuevo">
    <i class="fa fa-plus"></i> Nuevo</a> 
  </div>

  <div class="card-block">
      <div class="table-responsive">
          <table class="table table-bordered" width="100%" id="dataTable" 
          cellspacing="0">
              <thead>
                <tr>
                  <th class="text-center">ID</th>
                  <th class="text-center">PELÍCULA</th>
                  <th class="text-center">SALA</th>
                  <th class="text-center">DURACION EN CARTELERA</th>
                  <th class="text-center">HORARIO</th>
                  <th class="text-center">OPCIONES</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th class="text-center">ID</th>
                  <th class="text-center">PELÍCULA</th>
                  <th class="text-center">SALA</th>
                  <th class="text-center">DURACION EN CARTELERA</th>
                  <th class="text-center">HORARIO</th>
                  <th class="text-center">OPCIONES</th>
                </tr>
              </tfoot>
              <tbody>
              <?php if (isset($_smarty_tpl->tpl_vars['funciones']->value)) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['funciones']->value, 'f');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['f']->value) {
?>
                  <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['f']->value['funcion_id'];?>
</td>
                    <td> <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['f']->value['pelicula'], 'peli');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['peli']->value) {
?> <?php echo $_smarty_tpl->tpl_vars['peli']->value['titulo'];?>
 <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
 </td>
                    <td>
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['f']->value['sala'], 'sala');
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
                    <td><?php echo $_smarty_tpl->tpl_vars['f']->value['fecha'];?>
 - <?php echo $_smarty_tpl->tpl_vars['f']->value['fecha_fin'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['f']->value['hora'];?>
 - <?php echo $_smarty_tpl->tpl_vars['f']->value['hora_fin'];?>
</td>
                    <td class="text-center">
                      <a class='btn btn-info btn-xs' 
                      href="funcion.php?accion=form_editar&id=<?php echo $_smarty_tpl->tpl_vars['f']->value['funcion_id'];?>
">
                      <i class="fa fa-edit"></i> Edit</a> 

                      <a class="btn btn-danger btn-xs" 
                      href="funcion.php?accion=eliminar&id=<?php echo $_smarty_tpl->tpl_vars['f']->value['funcion_id'];?>
">
                      <i class="fa fa-eraser"></i> Del</a>
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
