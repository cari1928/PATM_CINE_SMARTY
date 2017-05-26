<?php
/* Smarty version 3.1.30, created on 2017-05-25 17:25:18
  from "C:\xampp\htdocs\cineMaster\templates\mensajes.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5926f75ee3b1c8_00573835',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e068dd5b6c077f4ee2e7a91b764a05f3e495771c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cineMaster\\templates\\mensajes.html',
      1 => 1495724829,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5926f75ee3b1c8_00573835 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['msg']->value)) {?>
	<div class="alert alert-<?php echo $_smarty_tpl->tpl_vars['alert']->value;?>
 alert-dismissible" role="alert">
	  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  		<span aria-hidden="true">&times;</span></button>
	  <strong>¡Aviso!</strong> <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

	</div>
<?php }
}
}
