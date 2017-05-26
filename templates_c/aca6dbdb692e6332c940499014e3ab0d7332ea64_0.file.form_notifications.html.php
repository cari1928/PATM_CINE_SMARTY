<?php
/* Smarty version 3.1.30, created on 2017-05-26 09:54:19
  from "C:\xampp\htdocs\cineMaster\templates\admin\form_notifications.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5927df2bbcd3a6_45020000',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aca6dbdb692e6332c940499014e3ab0d7332ea64' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cineMaster\\templates\\admin\\form_notifications.html',
      1 => 1495426062,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_ext.html' => 1,
    'file:footer_ext.html' => 1,
  ),
),false)) {
function content_5927df2bbcd3a6_45020000 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header_ext.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  
  <div class="wrapper">

    <form class="form-signin" action="notification.php?accion=send" method="post">

      <h2 class="form-signin-heading">Write your notification</h2>
    
      <div class="form-group">  
          <input type="text" class="form-control" name="title" placeholder="Title" required="" autofocus="" />
      </div>

      <div class="form-group">  
          <input type="text" class="form-control" name="text" placeholder="Small Description" required="" autofocus="" />
      </div>

      <div class="form-group">  
        <textarea class="form-control" name="message" placeholder="Write your message here..." rows="7"></textarea>    
      </div>
      
      <div class="form-group">
          <button class="btn btn-lg btn-success btn-block" type="submit">Send</button>   
      </div>
    </form>
  </div>
<?php $_smarty_tpl->_subTemplateRender("file:footer_ext.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
