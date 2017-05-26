<?php
/* Smarty version 3.1.30, created on 2017-05-26 15:02:51
  from "C:\xampp\htdocs\cineMaster\templates\admin\form_sala.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5928277b098907_10421830',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0284b9ec40f8bc9d3626afefdd458febb853b3f3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cineMaster\\templates\\admin\\form_sala.html',
      1 => 1495803756,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_ext.html' => 1,
    'file:footer_ext.html' => 1,
  ),
),false)) {
function content_5928277b098907_10421830 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header_ext.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<style type="text/css">
  #success_message{ display: none;}
</style>

<div class="container">
  <form class="well form-horizontal"  
  action="sala.php?accion=<?php if (isset($_smarty_tpl->tpl_vars['sala_id']->value)) {?>editar<?php } else { ?>nuevo<?php }?>"  
  method="post" id="contact_form">
    <fieldset>

    <legend><?php if (isset($_smarty_tpl->tpl_vars['sala_id']->value)) {?> Actualizar <?php } else { ?> Nueva <?php }?> Sala</legend>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label">Nombre</label>  
      <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
          <span class="input-group-addon">
          <i class="glyphicon glyphicon-asterisk"></i></span>
          <input name="nombre" placeholder="Nombre" class="form-control" type="text"
          <?php if (isset($_smarty_tpl->tpl_vars['sala_id']->value)) {?>
            value="<?php echo $_smarty_tpl->tpl_vars['sala']->value['nombre'];?>
"
          <?php }?>>
        </div>
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" >Número de Filas</label> 
      <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
          <span class="input-group-addon">
          <i class="glyphicon glyphicon-plus"></i></span>
          <input name="num_filas" placeholder="Número de Filas" class="form-control" type="number"<?php if (isset($_smarty_tpl->tpl_vars['sala_id']->value)) {?> value="<?php echo $_smarty_tpl->tpl_vars['sala']->value['num_filas'];?>
"<?php }?>>
        </div>
      </div>
    </div>

    <!-- Text input-->
   <div class="form-group">
    <label class="col-md-4 control-label">Número de Columnas</label>  
      <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
          <span class="input-group-addon">
          <i class="glyphicon glyphicon-euro"></i></span>
          <input name="num_cols" placeholder="Número de Columnas" class="form-control" type="number"
          <?php if (isset($_smarty_tpl->tpl_vars['sala_id']->value)) {?>
            value="<?php echo $_smarty_tpl->tpl_vars['sala']->value['num_cols'];?>
"
          <?php }?>>
        </div>
      </div>
    </div>

    <!-- PONER SPINNER AQUI!!!! -->
    <div class="form-group"> 
      <label class="col-md-4 control-label">State</label>
        <div class="col-md-4 selectContainer">
        <div class="input-group">
            <span class="input-group-addon">
            <i class="glyphicon glyphicon-list"></i></span>
            <?php echo $_smarty_tpl->tpl_vars['cmb_salas']->value;?>

      </div>
    </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label">Número de Sala</label>  
        <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
          <span class="input-group-addon">
          <i class="glyphicon glyphicon-minus"></i></span>
          <input name="numero_sala" placeholder="Número de Sala" class="form-control" type="number"
          <?php if (isset($_smarty_tpl->tpl_vars['sala_id']->value)) {?>
            value="<?php echo $_smarty_tpl->tpl_vars['sala']->value['numero_sala'];?>
"
          <?php }?>>
        </div>
      </div>
    </div>

    <?php if (isset($_smarty_tpl->tpl_vars['sala_id']->value)) {?>
      <input type="hidden" name="sala_id" value="<?php echo $_smarty_tpl->tpl_vars['sala_id']->value;?>
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
