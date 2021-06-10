<form action="/comunidades/crearComunidad" class="form-horizontal" name='form_comunidad'
      method="post" role="form">
    <div class="row">
        <div class="col-lg-7">
            <fieldset id="id_comunidad" disabled>
                <legend>Datos de la comunidad de propietarios</legend>
                <div>                        <!-- Denominación  -->
                    <div class="form-group">
                        <label class="col-sm-3 col-md-2 col-lg-3 control-label" for="com_denom">Denominación</label>
                        <div class="col-sm-9 col-lg-8">
                            <input type="text" class="form-control" name="com_denom" value="" id="com_denom" required
                                   maxlength="50"/>
                        </div>  
                    </div>

                    <!-- CIF  -->
                    <div class="form-group">
                        <label class="col-xs-3 col-md-2 col-lg-3 control-label" for="com_cif">CIF</label>
                        <div class="col-xs-8 col-md-4">
                            <input type="text" class="form-control" name="com_cif" id="com_cif" value="" maxlength="12"/>
                        </div>
                    </div>

                    <!-- Fecha de alta  -->
                    <div class="form-group">
                        <label class="col-xs-3 col-md-2 col-lg-3 control-label" for="com_fechaalta">Alta</label>
                        <div class="col-xs-7 col-md-4">
                            <input type="date" class="form-control" name="com_fechaalta" id="com_fechaalta" 
                                   placeholder="aaaa-mm-dd" value="<?php echo (new \DateTime())->format('Y-m-d'); ?>" />
                        </div>
                    </div>

                    <!-- Dirección  -->
                    <div class="form-group">
                        <label for="com_dir" class="col-xs-3 col-md-2 col-lg-3 control-label">Dirección</label>
                        <div class="col-xs-9 col-md-6 col-lg-8">
                            <textarea class="form-control" rows="2" id="com_dir" name="com_dir"></textarea>
                        </div> 
                    </div>


                    <!-- Imágen en los archivos?  -->
                    <div class="form-group">
                        <label class="col-xs-3 col-md-2 col-lg-3 control-label" for="exampleInputFile">Imágen</label>
                        <input class="col-xs-9 col-md-10 col-lg-9" type="file" disabled="disabled" id="exampleInputFile">
                    </div>

                    <!-- Muro desactivado?  -->
                    <div class="checkbox">
                        <label class="col-lg-10 col-md-9 col-sm-5 col-xs-10" for="com_muro">Muro desactivado</label>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            <input type="checkbox" name="com_muro" id="com_muro" value="">
                        </div>
                    </div>

                    <!-- Tablón desactivado?  -->
                    <div class="checkbox">
                        <label class="col-xs-10 col-sm-5 col-md-9 col-lg-10" for="com_tablon">Tablón desactivado</label>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            <input type="checkbox" name="com_tablon" id="com_tablon" value="">
                        </div>
                    </div>

                    <!-- Incidencias desactivado?  -->
                    <div class="checkbox">
                        <label class="col-xs-10 col-sm-5 col-md-9 col-lg-10" for="com_incid">Incidencias desactivado</label>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            <input type="checkbox" name="com_incid" id="com_incid" value="">
                        </div>
                    </div>

                    <!-- Control de gastos desactivado?  -->
                    <div class="checkbox">
                        <label class="col-xs-10 col-sm-5 col-md-9 col-lg-10" for="com_controlgastos">Control gastos desact.</label>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            <input type="checkbox" name="com_controlgastos" id="com_controlgastos" value="">
                        </div>
                    </div>

                    <!-- control de ingresos desactivado?  -->
                    <div class="checkbox">
                        <label class="col-xs-10 col-sm-5 col-md-9 col-lg-10" for="com_controlingresos">Control ingresos desact.</label>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            <input type="checkbox" name="com_controlingresos" id="com_controlingresos" value="">
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col-lg-5">    
            <fieldset id="fieldset2" disabled>
                <legend>Datos financieros</legend>
                <div>
                    <!-- Moneda  -->
                    <div class="form-group">
                        <label class="col-xs-3 col-lg-8 control-label" for="com_divisa">Moneda</label>
                        <div class="col-xs-5 col-md-4 col-lg-4">
                            <select class="form-control" id="com_divisa" name="divisa_com">
                                <option value="€" selected>EUR - Euro</option>
                                <option value="$">USD - Dólar</option>
                                <option default value="CHF">CHF - Franco suizo</option>
                            </select>
                        </div>
                    </div>

                    <!-- Separador decimal  -->
                    <div class="form-group">
                        <label class="control-label col-xs-3 col-lg-8">Separador decimal</label>
                        <div class="col-xs-5 col-md-4 col-lg-4">
                            <select class="form-control" name="com_sep_dec">
                                <option value="p">Punto ( . )</option>
                                <option value="c" selected>Coma ( , )</option>
                            </select>
                        </div>
                    </div>

                    <!-- Notificaciones  -->
                    <div class="form-group">
                        <label class="control-label col-xs-3 col-lg-8">Notificaciones</label>
                        <div class="col-xs-8 col-md-4 col-lg-4">
                            <select class="form-control" name="com_contacto">
                                <option value="T">A todos</option>
                                <option value="CP" selected>Contacto principal</option>
                            </select>
                        </div>
                    </div>

                    <!-- Ver cuentas de la comunidad  -->
                    <div class="form-group">
                        <label class="control-label col-xs-3 col-lg-8">Ver cuentas de la comunidad de propietarios</label>
                        <div class="col-xs-6 col-md-4 col-lg-4">
                            <select class="form-control" name="prop_vencuentas_com">
                                <option value="T">Todos</option>
                                <option value="A">Administrador</option>
                                <option value="JP" selected>Junta de propietarios</option>
                            </select>
                        </div>
                    </div>

                    <!-- Ver cuentas propias  -->
                    <div class="form-group">
                        <label class="control-label col-lg-8 col-xs-3">Propietarios ven sus cuentas</label>
                        <div class="col-xs-5 col-md-3 col-lg-3">
                            <select class="form-control" name="prop_vensuscuentas">
                                <option value="S" selected>Sí</option>
                                <option value="N">No</option>
                            </select>
                        </div>
                    </div>
                </div>

            </fieldset>

        </div>
    </div>
    <!--               Barra de botones con operaciones CRUD -->

    <nav clas="navbar navbar-expand-sm navbar-light fixed-bottom" id="pie">

        <div class="btn-group">
            <button type="button" class="btn btn-primary" onclick="editarComunidad()">
                <i class="fas fa-edit"></i> Editar                     
            </button>

            <button type="button" class="btn  btn-secondary" id="com_guardar" disabled="true" onclick="guardarComunidad()">
                <i class="fas fa-save"></i> Guardar                     
            </button>
        </div>

        <div class="btn-group float-right">
            <button type="button" class="btn btn-danger" onclick="eliminarComunidad()">
                Eliminar <i class="fas fa-trash"></i>                      
            </button>
        </div>
    </nav>
</form> 