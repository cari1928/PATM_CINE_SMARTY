<?php
/* Smarty version 3.1.30, created on 2017-05-25 16:43:20
  from "C:\xampp\htdocs\cineMaster\templates\login.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5926ed881baf68_87298733',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6b3c4d1b7d0378f2f1737b9b4d714e6b9763db3f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cineMaster\\templates\\login.html',
      1 => 1495398070,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
    'file:footer.html' => 1,
  ),
),false)) {
function content_5926ed881baf68_87298733 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  
  <div class="wrapper">

    <form class="form-signin" action="login.php?accion=login" method="post">

      <h2 class="form-signin-heading">Please login</h2>
    
      <div class="form-group">  
          <input type="text" class="form-control" name="username" placeholder="Email Address" required="" autofocus="" />
      </div>

      <div class="form-group">  
          <input type="password" class="form-control" name="pass" placeholder="Password" required=""/>      
      </div>
      
      <div class="form-group">
          <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
      </div>

      <div class="form-group" align="right">  
          <label><a href="#" class="btn btn-link">Sign In</a></label>
      </div>
    </form>
  </div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
