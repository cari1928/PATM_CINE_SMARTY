<?php
/* Smarty version 3.1.30, created on 2017-05-28 06:33:08
  from "C:\xampp\htdocs\cineMaster\templates\admin\form_sucursal.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_592a5304caec33_70508528',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ad319382638727caea8941766cc277ba9a2e8b67' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cineMaster\\templates\\admin\\form_sucursal.html',
      1 => 1495945986,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_ext.html' => 1,
    'file:footer_ext.html' => 1,
  ),
),false)) {
function content_592a5304caec33_70508528 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header_ext.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<style type="text/css">
  #success_message{ display: none;}
</style>

<div class="container">
  <form class="well form-horizontal"  
  action="sucursal.php?accion=<?php if (isset($_smarty_tpl->tpl_vars['sucursal_id']->value)) {?>editar<?php } else { ?>nuevo<?php }?>"  
  method="post" id="contact_form">
    <fieldset>

    <legend><?php if (isset($_smarty_tpl->tpl_vars['sucursal_id']->value)) {?> Actualizar <?php } else { ?> Nueva <?php }?> Sucursal</legend>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label">País</label>  
      <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
          <span class="input-group-addon">
          <i class="glyphicon glyphicon-asterisk"></i></span>
          <input name="pais" placeholder="País" class="form-control" type="text"
          <?php if (isset($_smarty_tpl->tpl_vars['sucursal_id']->value)) {?>
            value="<?php echo $_smarty_tpl->tpl_vars['sucursal']->value['pais'];?>
"
          <?php }?>>
        </div>
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" >Ciudad</label> 
      <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>
          <input name="ciudad" placeholder="Ciudad" class="form-control" type="text"
          <?php if (isset($_smarty_tpl->tpl_vars['sucursal_id']->value)) {?>
            value="<?php echo $_smarty_tpl->tpl_vars['sucursal']->value['ciudad'];?>
"
          <?php }?>>
        </div>
      </div>
    </div>

    <!-- Text input-->
   <div class="form-group">
    <label class="col-md-4 control-label">Dirección</label>  
      <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
          <span class="input-group-addon">
          <i class="glyphicon glyphicon-euro"></i></span>
          <input name="direccion" placeholder="Dirección" class="form-control" type="text"
          <?php if (isset($_smarty_tpl->tpl_vars['sucursal_id']->value)) {?>
            value="<?php echo $_smarty_tpl->tpl_vars['sucursal']->value['direccion'];?>
"
          <?php }?>>
        </div>
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label">Latitud</label>  
        <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
          <span class="input-group-addon">
          <i class="glyphicon glyphicon-minus"></i></span>
          <input name="latitud" placeholder="Latitud" class="form-control" type="text"
          <?php if (isset($_smarty_tpl->tpl_vars['sucursal_id']->value)) {?>
            value="<?php echo $_smarty_tpl->tpl_vars['sucursal']->value['latitud'];?>
"
          <?php }?>>
        </div>
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label">Longitud</label>  
        <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
          <span class="input-group-addon">
          <i class="glyphicon glyphicon-cloud"></i></span>
          <input name="longitud" placeholder="Longitud" class="form-control" type="text"
          <?php if (isset($_smarty_tpl->tpl_vars['sucursal_id']->value)) {?>
            value="<?php echo $_smarty_tpl->tpl_vars['sucursal']->value['longitud'];?>
"
          <?php }?>>
        </div>
      </div>
    </div>

    <?php if (isset($_smarty_tpl->tpl_vars['sucursal_id']->value)) {?>
      <input type="hidden" name="sucursal_id" value="<?php echo $_smarty_tpl->tpl_vars['sucursal_id']->value;?>
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
