

<div class="row partition-white padding-10">
    <div class="col-md-12">
        <h3>Información de la Cuenta</h3>
        <hr>
    </div>
    <div class="col-md-6">
        <div class="user-left">
            <div class="center">

                <div data-provides="fileupload" class="fileupload fileupload-new center">
                    <div class="user-image">
                        <div class="fileupload-new thumbnail">
                            <img alt="" src="<?php echo Yii::app()->theme->baseUrl . '/img/User2.png'; ?>">
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail"></div>
                        <div class="user-image-buttons">
                            <span class="btn btn-azure btn-file btn-sm"><span class="fileupload-new"><i class="fa fa-pencil"></i></span><span class="fileupload-exists"><i class="fa fa-pencil"></i></span>
                                <input type="file">
                            </span>
                            <a data-dismiss="fileupload" class="btn fileupload-exists btn-red btn-sm" href="#">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                </div></div>
            <div id="nombreUsuarioError" class="form-group">
                <label class="control-label">
                    Nombre
                    <span class="symbol required"></span>
                </label>
                <span class="input-icon">
                    <input type="text" name="nombreUsuario" id="nombreUsuario" class="form-control" placeholder="nombre">
                    <i class="fa fa-user"></i> </span>                                            
            </div>
            <div id="apellidosUsuarioError" class="form-group">
                <label class="control-label">
                    Apellidos
                    <span class="symbol required"></span>
                </label>
                <span class="input-icon">
                    <input type="text" name="apellidosUsuario" id="apellidosUsuario" class="form-control" placeholder="apellidos">
                    <i class="fa fa-user"></i> </span>                                            
            </div>
            <div id="cedulaUsuarioError" class="form-group">
                <label class="control-label">
                    Cédula
                    <span class="symbol required"></span>
                </label>
                <span class="input-icon">
                    <input type="text" name="cedulaUsuario" id="cedulaUsuario" class="form-control" placeholder="cedula" >
                    <i class="fa fa-user"></i> </span>                                            
            </div>

            <div id="correoElectronicoUsuarioError" class="form-group">
                <label class="control-label">
                    Correo Electrónico
                    <span class="symbol required"></span>
                </label>
                <span class="input-icon">
                    <input type="text" name="correoElectronicoUsuario" id="correoElectronicoUsuario" class="form-control" placeholder="correo electronico">
                    <i class="fa fa-envelope"></i> </span>  
            </div>
            <!-- phone mask -->
            <div id="telefonoUsuarioError" class="form-group">
                <label>Teléfono
                <span class="symbol required"></span>
                </label>
                <span class="input-icon">
                    <input id="telefonoUsuario" name="telefonoUsuario" type="text" class="form-control" data-inputmask='"mask": "(###) ###-###-###"' data-mask />
                    <i class="fa fa-phone"></i> </span> 
            </div><!-- /.form group -->
            <span class="help-inline "> <i class="fa fa-info-circle text-primary fa-2x"></i> Los campos con (*) son requeridos para el registro del usuario.</span>
        </div>


    </div>
    <div class="col-md-6">

        <div id="loginUsuarioError" class="form-group">
            <label class="control-label">
                Usuario del Sistema
                <span class="symbol required"></span>
            </label>
            <span class="input-icon">
                <input type="text" id="loginUsuario" name="loginUsuario" class="form-control" placeholder="usuario">
                <i class="fa fa-key"></i> </span> 

        </div>
        <div id="passwordUsuarioError" class="form-group">
            <label class="control-label">
                Contraseña
                <span class="symbol required"></span>
            </label>
            <span class="input-icon">
                <input type="password" id="passwordUsuario" name="passwordUsuario" class="form-control ">
                <i class="fa fa-key"></i> </span> 

        </div>
        <div id="passwordError" class="form-group">
            <label class="control-label">
                Confirmar Cotraseña
                <span class="symbol required"></span>
            </label>
            <span class="input-icon">
                <input type="password" id="password" name="password" class="form-control">
                <i class="fa fa-key"></i> </span>
            <span id="passwordErrorText" class="help-block" style="display: none"> Las contraseñas no coinciden </span>
        </div> 



    </div>
    <div class="row">
    <div class="col-md-10">

    </div>
    <div class="col-md-2">
        <button id="crearUsuario" name="crearUsuario" type="submit" onclick="" class="btn btn-primary btn-block">
            Crear <i class="fa fa-refresh fa-spin"></i>
        </button>
    </div>
</div>
</div>






<script type="text/javascript">
    $(document).ready(function() {
        $("#crearUsuario").click(function() {
            var $nombre = $("#nombreUsuario").val(); // Nos devuelve el valor
            var $apellidos = $("#apellidosUsuario").val(); // Nos devuelve el valor
            var $cedula = $("#cedulaUsuario").val(); // Nos devuelve el valor
            var $correo = $("#correoElectronicoUsuario").val(); // Nos devuelve el valor
            var $telefono = $("#telefonoUsuario").val(); // Nos devuelve el valor
            var $usuario = $("#loginUsuario").val(); // Nos devuelve el valor
            var $contrasenna = $("#passwordUsuario").val(); // Nos devuelve el valor
            var $confirmacion = $("#password").val(); // Nos devuelve el valor

            var fine = true;

            if ($nombre == '') {
                $("#nombreUsuarioError").addClass("has-error");
                fine = false;
            }
            if ($apellidos == '') {
                $("#apellidosUsuarioError").addClass("has-error");
                fine = false;
            }
            if ($cedula == '') {
                $("#cedulaUsuarioError").addClass("has-error");
                fine = false;
            }
            if ($correo == '') {
                $("#correoElectronicoUsuarioError").addClass("has-error");
                fine = false;
            }
            if ($telefono == '') {
                $("#telefonoUsuarioError").addClass("has-error");
                fine = false;
            }
            if ($usuario == '') {
                $("#loginUsuarioError").addClass("has-error");
                fine = false;
            }
            if ($contrasenna == '') {
                $("#passwordUsuarioError").addClass("has-error");
                fine = false;
            }
            if ($confirmacion == '') {
                $("#passwordError").addClass("has-error");
                fine = false;
            }
            if ($contrasenna != $confirmacion) {
                $("#passwordUsuarioError").addClass("has-error");
                $("#passwordError").addClass("has-error");
                $("#passwordErrorText").toggle();
                fine = false;

            }
            if (fine) {

                var $params = {'nombre': $nombre, 'apellidos': $apellidos, 'cedula': $cedula, 'correo': $correo, 'telefono': $telefono, 'usuario': $usuario, 'contrasenna': $contrasenna};
                $.ajax({
                    url: '<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=Configuracion/usuario/create' ?>',
                    type: 'POST',
                    data: $params,
                    success: function() {
                        location.href = '<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=Configuracion/usuario/admin' ?>';
                    }
                });
            }
            //              
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {

        $("#nombreUsuario").on("input", function() {
            var count = $("#nombreUsuario").val().length;
            if (count >= 5) {
                $("#nombreUsuarioError").removeClass("has-error"); 
            } 
        });
        $("#apellidosUsuario").on("input", function() {
            var count = $("#apellidosUsuario").val().length;
            if (count >= 5) {
                $("#apellidosUsuarioError").removeClass("has-error"); 
            } 
        });
        $("#cedulaUsuario").on("input", function() {
            var count = $("#cedulaUsuario").val().length;
            if (count >= 5) {
                $("#cedulaUsuarioError").removeClass("has-error"); 
            } 
        });
        $("#correoElectronicoUsuario").on("input", function() {
            var count = $("#correoElectronicoUsuario").val().length;
            if (count >= 5) {
                $("#correoElectronicoUsuarioError").removeClass("has-error"); 
            } 
        });
        $("#telefonoUsuario").on("input", function() {
            var count = $("#telefonoUsuario").val().length;
            if (count >= 5) {
                $("#telefonoUsuarioError").removeClass("has-error"); 
            } 
        });
        $("#loginUsuario").on("input", function() {
            var count = $("#loginUsuario").val().length;
            if (count >= 5) {
                $("#loginUsuarioError").removeClass("has-error"); 
            } 
        });
        $("#passwordUsuario").on("input", function() {
            var count = $("#passwordUsuario").val().length;
            if (count >= 7) {
                $("#passwordUsuarioError").removeClass("has-error");
                $("#passwordUsuarioError").addClass("has-success");
            }
            else {
                $("#passwordUsuarioError").removeClass("has-success");
            }
        });
        $("#password").on("input", function() {
            var passwordUsuario = $("#passwordUsuario").val();
            var password = $("#password").val();
            var count1 = $("#passwordUsuario").val().length;

            if (passwordUsuario === password && count1 >= 7) {
                $("#passwordError").removeClass("has-error");
                $("#passwordError").addClass("has-success");
            }
            else {
                $("#passwordError").removeClass("has-success");
            }
        });


    });
</script>
