<?php
/* Smarty version 3.1.30, created on 2017-05-27 04:41:32
  from "C:\xampp\htdocs\cineMaster\templates\client\footer.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5928e75cecb704_98215717',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '39c28bc1b15b547002cf5d5c5fc71b39f26dc1f4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cineMaster\\templates\\client\\footer.html',
      1 => 1495852884,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5928e75cecb704_98215717 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row-fluid">
  <div id="footer" class="span12"> 2012 &copy; Marutii Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>
<?php echo '<script'; ?>
 src="js/excanvas.min.js"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 src="js/jquery.min.js"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 src="js/jquery.ui.custom.js"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 src="js/bootstrap.min.js"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 src="js/jquery.flot.min.js"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 src="js/jquery.flot.resize.min.js"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 src="js/jquery.peity.min.js"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 src="js/fullcalendar.min.js"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 src="js/maruti.js"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 src="js/maruti.dashboard.js"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 src="js/maruti.chat.js"><?php echo '</script'; ?>
> 
 

<?php echo '<script'; ?>
 type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
