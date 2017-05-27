<?php
/* Smarty version 3.1.30, created on 2017-05-27 05:02:04
  from "C:\xampp\htdocs\cineMaster\templates\client\sucursal.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5928ec2c5e8086_75263765',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e5368902593dfb6df7a0e53a00e8906f6cc378d1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cineMaster\\templates\\client\\sucursal.html',
      1 => 1495853718,
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
function content_5928ec2c5e8086_75263765 (Smarty_Internal_Template $_smarty_tpl) {
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
    <a class='btn btn-success btn-xs' href="#"><i class="fa fa-table"></i> Sucursales</a>
  </div>

  <div class="card-block">
      <div class="table-responsive">
          <table class="table table-bordered" width="100%" id="dataTable" 
          cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>PAIS</th>
                  <th>CIUDAD</th>
                  <th>DIRECCION</th>
                  <th>LATITUD</th>
                  <th>LONGITUD</th>
                  <th>OPCIONES</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>PAIS</th>
                  <th>CIUDAD</th>
                  <th>DIRECCION</th>
                  <th>LATITUD</th>
                  <th>LONGITUD</th>
                  <th>OPCIONES</th>
                </tr>
              </tfoot>
              <tbody>
              <?php if (isset($_smarty_tpl->tpl_vars['sucursales']->value)) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sucursales']->value, 's');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['s']->value) {
?>
                  <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['s']->value['sucursal_id'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['s']->value['pais'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['s']->value['ciudad'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['s']->value['direccion'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['s']->value['latitud'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['s']->value['longitud'];?>
</td>
                    <td class="text-center">
                      <a class='btn btn-primary btn-xs' 
                      href="sucursal.php?accion=select&id=<?php echo $_smarty_tpl->tpl_vars['s']->value['sucursal_id'];?>
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
