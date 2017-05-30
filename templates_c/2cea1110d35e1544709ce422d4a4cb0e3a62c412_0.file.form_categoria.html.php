<?php
/* Smarty version 3.1.30, created on 2017-05-30 04:18:33
  from "C:\xampp\htdocs\cineMaster\templates\admin\form_categoria.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_592cd679b17455_81549353',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2cea1110d35e1544709ce422d4a4cb0e3a62c412' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cineMaster\\templates\\admin\\form_categoria.html',
      1 => 1496110711,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_ext.html' => 1,
    'file:footer_ext.html' => 1,
  ),
),false)) {
function content_592cd679b17455_81549353 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header_ext.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<style type="text/css">
  #success_message{ display: none;}
</style>

<div class="container">
  <form class="well form-horizontal"  
  action="categoria.php?accion=<?php if (isset($_smarty_tpl->tpl_vars['categoria_id']->value)) {?>editar<?php } else { ?>nuevo<?php }?>"  
  method="post" id="contact_form">
    <fieldset>

    <legend>
      <?php if (isset($_smarty_tpl->tpl_vars['categoria_id']->value)) {?> Actualizar <?php } else { ?> Nueva <?php }?> Categoria
    </legend>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label">Categoria</label>  
      <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
          <span class="input-group-addon">
          <i class="glyphicon glyphicon-asterisk"></i></span>
          <input name="categoria" placeholder="Categoria" class="form-control" type="text"
          <?php if (isset($_smarty_tpl->tpl_vars['categoria_id']->value)) {?>
            value="<?php echo $_smarty_tpl->tpl_vars['categoria']->value['categoria'];?>
"
          <?php }?>>
        </div>
      </div>
    </div>

    <?php if (isset($_smarty_tpl->tpl_vars['categoria_id']->value)) {?>
      <input type="hidden" name="categoria_id" value="<?php echo $_smarty_tpl->tpl_vars['categoria_id']->value;?>
">
    <?php }?>

    <!-- Success message -->
    <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>

    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label"></label>
      <div class="col-md-4">
        <button type="submit" class="btn btn-success" >Guardar <span class="glyphicon glyphicon-send"></span></button>
      </div>
    </div>

    </fieldset>
  </form>
</div>

<?php echo '<script'; ?>
 type="text/javascript">
    $(document).ready(function() {
    $('#contact_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            first_name: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Please supply your first name'
                    }
                }
            },
             last_name: {
                validators: {
                     stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please supply your last name'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your email address'
                    },
                    emailAddress: {
                        message: 'Please supply a valid email address'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your phone number'
                    },
                    phone: {
                        country: 'US',
                        message: 'Please supply a vaild phone number with area code'
                    }
                }
            },
            address: {
                validators: {
                     stringLength: {
                        min: 8,
                    },
                    notEmpty: {
                        message: 'Please supply your street address'
                    }
                }
            },
            city: {
                validators: {
                     stringLength: {
                        min: 4,
                    },
                    notEmpty: {
                        message: 'Please supply your city'
                    }
                }
            },
            state: {
                validators: {
                    notEmpty: {
                        message: 'Please select your state'
                    }
                }
            },
            zip: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your zip code'
                    },
                    zipCode: {
                        country: 'US',
                        message: 'Please supply a vaild zip code'
                    }
                }
            },
            comment: {
                validators: {
                      stringLength: {
                        min: 10,
                        max: 200,
                        message:'Please enter at least 10 characters and no more than 200'
                    },
                    notEmpty: {
                        message: 'Please supply a description of your project'
                    }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#contact_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});
<?php echo '</script'; ?>
>    

<?php $_smarty_tpl->_subTemplateRender("file:footer_ext.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
