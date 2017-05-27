<?php
/* Smarty version 3.1.30, created on 2017-05-27 20:30:04
  from "C:\xampp\htdocs\cineMaster\client\historial.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5929c5ac651028_88733849',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eb27f3f68a3f4ac73cd810e75f074f944ab0fabf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cineMaster\\client\\historial.php',
      1 => 1495909802,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5929c5ac651028_88733849 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php

';?>include '../cine.class.php';

$template = $web->templateEngine();
$template->setTemplateDir('../templates/client/');
$template->assign('titulo', 'CM-Cliente');
$template->display('historial.php');
<?php }
}
