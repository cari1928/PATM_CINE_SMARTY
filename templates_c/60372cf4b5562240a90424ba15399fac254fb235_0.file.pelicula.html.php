<?php
/* Smarty version 3.1.30, created on 2017-05-27 00:19:01
  from "C:\xampp\htdocs\cineMaster\templates\admin\pelicula.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5928a9d591a302_09736643',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '60372cf4b5562240a90424ba15399fac254fb235' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cineMaster\\templates\\admin\\pelicula.html',
      1 => 1495837127,
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
function content_5928a9d591a302_09736643 (Smarty_Internal_Template $_smarty_tpl) {
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

    <a class='btn btn-link btn-xs' href="#"><i class="fa fa-table"></i> Películas</a>

    <a class='btn btn-primary btn-xs' 
    href="pelicula.php?accion=form_nuevo">
    <i class="fa fa-plus"></i> Nuevo</a> 
  </div>

  <div class="card-block">
      <div class="table-responsive">
          <table class="table table-bordered" width="100%" id="dataTable" 
          cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>TITULO</th>
                  <th>DESCRIPCION</th>
                  <th>LANZAMIENTO</th>
                  <th>LENGUAJE</th>
                  <th>DURACION</th>
                  <th>POSTER</th>
                  <th>OPCIONES</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>TITULO</th>
                  <th>DESCRIPCION</th>
                  <th>LANZAMIENTO</th>
                  <th>LENGUAJE</th>
                  <th>DURACION</th>
                  <th>POSTER</th>
                  <th>OPCIONES</th>
                </tr>
              </tfoot>
              <tbody>
              <?php if (isset($_smarty_tpl->tpl_vars['peliculas']->value)) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['peliculas']->value, 'p');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
?>
                  <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['p']->value['pelicula_id'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['p']->value['titulo'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['p']->value['descripcion'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['p']->value['f_lanzamiento'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['p']->value['lenguaje'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['p']->value['duracion'];?>
</td>
                    <td><img src="<?php echo $_smarty_tpl->tpl_vars['p']->value['poster'];?>
" alt="sorry..." width="100"></td>
                    <td class="text-center">
                      <a class='btn btn-info btn-xs' 
                      href="pelicula.php?accion=form_editar&id=<?php echo $_smarty_tpl->tpl_vars['p']->value['pelicula_id'];?>
">
                      <i class="fa fa-edit"></i> Edit</a> 

                      <a class="btn btn-danger btn-xs" 
                      href="pelicula.php?accion=eliminar&id=<?php echo $_smarty_tpl->tpl_vars['p']->value['pelicula_id'];?>
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
