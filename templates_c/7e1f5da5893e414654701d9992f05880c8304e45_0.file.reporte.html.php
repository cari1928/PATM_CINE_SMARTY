<?php
/* Smarty version 3.1.30, created on 2017-05-27 20:17:17
  from "C:\xampp\htdocs\cineMaster\templates\client\reporte.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5929c2ad49fe23_35620057',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e1f5da5893e414654701d9992f05880c8304e45' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cineMaster\\templates\\client\\reporte.html',
      1 => 1495909015,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../header.html' => 1,
    'file:header.html' => 1,
    'file:footer.html' => 1,
  ),
),false)) {
function content_5929c2ad49fe23_35620057 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<style type="text/css">
  #success_message{ display: none;}
</style>

<div class="container">
  <form class="well form-horizontal" action="reporte.php?accion=comprar"
  method="post" id="contact_form">
    <fieldset>

    <legend>Reporte</legend>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label">Usuario</label>  
      <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
          <span class="input-group-addon">
          <i class="glyphicon glyphicon-asterisk"></i></span>
          <input name="usuario_id" class="form-control" type="text"
          disabled <?php if (isset($_smarty_tpl->tpl_vars['reporte_id']->value)) {?> value="<?php echo $_smarty_tpl->tpl_vars['reporte']->value['usuario'];?>
"<?php }?>>
        </div>
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" >Película</label> 
      <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-plus">
          </i></span>
          <input name="pelicula_id" class="form-control" type="text" disabled
          <?php if (isset($_smarty_tpl->tpl_vars['reporte_id']->value)) {?>
            value="<?php echo $_smarty_tpl->tpl_vars['reporte']->value['pelicula'];?>
"
          <?php }?>>
        </div>
      </div>
    </div>

    <!-- Text input-->
   <div class="form-group">
    <label class="col-md-4 control-label">Sala</label>  
      <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
          <span class="input-group-addon">
          <i class="glyphicon glyphicon-euro"></i></span>
          <input name="sala_id" class="form-control" type="text" disabled
          <?php if (isset($_smarty_tpl->tpl_vars['reporte_id']->value)) {?>
            value="<?php echo $_smarty_tpl->tpl_vars['reporte']->value['sala'];?>
"
          <?php }?>>
        </div>
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label">Hora</label>  
        <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
          <span class="input-group-addon">
          <i class="glyphicon glyphicon-minus"></i></span>
          <input name="hora" class="form-control" type="text" disabled
          <?php if (isset($_smarty_tpl->tpl_vars['reporte_id']->value)) {?>
            value="<?php echo $_smarty_tpl->tpl_vars['reporte']->value['funcion'];?>
"
          <?php }?>>
        </div>
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label">Entradas</label>  
        <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
          <span class="input-group-addon">
          <i class="glyphicon glyphicon-cloud"></i></span>
          <input name="entradas" class="form-control" type="number" disabled
          <?php if (isset($_smarty_tpl->tpl_vars['reporte_id']->value)) {?>
            value="<?php echo $_smarty_tpl->tpl_vars['reporte']->value['entradas'];?>
"
          <?php }?>>
        </div>
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label">Total</label>  
        <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
          <span class="input-group-addon">
          <i class="glyphicon glyphicon-cloud"></i></span>
          <input name="total" class="form-control" type="number" disabled
          <?php if (isset($_smarty_tpl->tpl_vars['reporte_id']->value)) {?>
            value="<?php echo $_smarty_tpl->tpl_vars['reporte']->value['total'];?>
"
          <?php }?>>
        </div>
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label">Tipo de Pago</label>  
        <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
          <span class="input-group-addon">
          <i class="glyphicon glyphicon-cloud"></i></span>
          <input name="tipo_pago" class="form-control" type="text" disabled
          <?php if (isset($_smarty_tpl->tpl_vars['reporte_id']->value)) {?>
            value="<?php echo $_smarty_tpl->tpl_vars['reporte']->value['tipo_pago'];?>
"
          <?php }?>>
        </div>
      </div>
    </div>

    <?php if (isset($_smarty_tpl->tpl_vars['reporte_id']->value)) {?>
      <input type="hidden" name="total" value="<?php echo $_smarty_tpl->tpl_vars['reporte']->value['total'];?>
">
      <input type="hidden" name="entradas" value="<?php echo $_smarty_tpl->tpl_vars['reporte']->value['entradas'];?>
">
      <input type="hidden" name="tipo_pago" value="<?php echo $_smarty_tpl->tpl_vars['reporte']->value['tipo_pago'];?>
">
    <?php }?>

    <!-- Success message -->
    <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>

    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label"></label>
      <div class="col-md-4">
        <input type="submit" class="btn btn-success" value="Aceptar">
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

<?php $_smarty_tpl->_subTemplateRender("file:footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
