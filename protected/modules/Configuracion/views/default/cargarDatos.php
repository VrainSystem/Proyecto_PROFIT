
<div class="row">


    <div class="col-xs-12">
        <!-- general form elements disabled -->
        <div class="box box-info">
            <div class="box-header no-padding-bottom">
                <h3 class="box-title"><i class="fa fa-cog text-info"></i> Extracción de Datos</h3>

                <a class="btn btn-transparent-grey pull-right" id="exportar" data-toggle="tooltip" title="Exportar a CSV" data-placement="bottom"><i class="fa fa-download" style="font-size:18px;"></i>  </a>
            </div>
            <!-- /.box-header  -->
            <div class="box-body">
                <form>
                    <div class="box-body no-padding">
                        <div class="">
                            <label for="exampleInputFile">Archivo de entrada</label>
                            <input type="file" id="csvCCPRelacion" name="csvCCPRelacion">
                            <p class="help-block">El archivo a cargar debe estar en formato CSV.</p>
                        </div>                                   
                    </div>

                </form>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button class="btn btn-info" type="button" id="importarCsv">
                    Cargar <i class="fa fa-refresh fa-spin"></i>
                </button> 
            </div>
        </div><!-- /.box -->


    </div><!--/.col (right) -->

</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#exportar").on('click', function() {

            $.ajax({
                url: '<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=Configuracion/default/exportar' ?>',
                type: 'POST',
                data: {id: 'cosa'},
                success: function(datos) {
                    alert('Se exportaron los riesgos correctamente');
                },
                error: function(datos) {
                    alert('No se puedo  completar la accion');
                }
            });
        });
    });

    //importar csv
    $(document).ready(function() {
        $("#importarCsv").on('click', function() {
            var file = $("#csvCCPRelacion").val();
            $.ajax({
                url: '<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=Configuracion/default/importar' ?>',
                type: 'POST',
                data: {file: file},
                success: function(datos) {
                    alert(datos);
                },
                error: function(datos) {
                    alert('No se puedo  completar la accion');
                }
            });

        });
    });
</script> 
