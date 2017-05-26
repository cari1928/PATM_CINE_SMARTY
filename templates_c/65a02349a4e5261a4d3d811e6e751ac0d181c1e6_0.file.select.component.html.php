<?php
/* Smarty version 3.1.30, created on 2017-05-26 14:46:15
  from "C:\xampp\htdocs\cineMaster\templates\select.component.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_592823977a4794_86801684',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '65a02349a4e5261a4d3d811e6e751ac0d181c1e6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cineMaster\\templates\\select.component.html',
      1 => 1495802741,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_592823977a4794_86801684 (Smarty_Internal_Template $_smarty_tpl) {
?>
<select class="form-control" name="<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
">
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['datos']->value, 'dato');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['dato']->value) {
?>
  
  <option value="<?php echo $_smarty_tpl->tpl_vars['dato']->value[0];?>
" <?php if ($_smarty_tpl->tpl_vars['dato']->value[0] == $_smarty_tpl->tpl_vars['selected']->value) {?> selected <?php }?>> 
  	<?php
$_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int) ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? $_smarty_tpl->tpl_vars['lim']->value+1 - (0) : 0-($_smarty_tpl->tpl_vars['lim']->value)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0) {
for ($_smarty_tpl->tpl_vars['foo']->value = 0, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++) {
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>
  		<?php ob_start();
echo $_smarty_tpl->tpl_vars['foo']->value+1;
$_prefixVariable1=ob_get_clean();
echo $_smarty_tpl->tpl_vars['dato']->value[$_prefixVariable1];?>
 -
  	<?php }
}
?>

	</option>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</select><?php }
}
