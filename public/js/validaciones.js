function checkCedula() {
    var cedula = document.getElementById('cedula').value;
    var tipoid = $("#tipo_id").val();
    if (tipoid == 1) {
    $('#razon_social').attr('readonly', true);
            var cedulaValida = ValidarC(cedula + "");
            if (!cedulaValida) {
    $("#resultados_ajax").html("<div class='alert alert-danger' >\n\
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='fa fa-times-circle' aria-hidden='true'>¡Error!</i>Cédula Inválida, Intente nuevamente.</div>");
//            $("#estado").text("Cédula inválida").removeClass("text-success").addClass("text-danger");
            $("#cedula").focus();
            $('#guardar_datos').attr("disabled", true);
            return false;
    } else {
//            $.ajax({
//                url: 'ajax/verificarCedulaExistente.php',
//                type: 'POST',
//                async: true,
//                data: {cedula: cedula},
////  data: 'parametro1=valor1&parametro2=valor2',
//                success: function (datos) {
//                    if (datos == 1) {
//                        $("#resultados_ajax").html("<div class='alert alert-success'><i class='fa fa-check' aria-hidden='true'></i>Número de cédula aceptado con éxito.</div>");
//                       $("#nombres").focus();
//                        $('#guardar_datos').attr("disabled", false);
//                        
//                    } else if (datos == 0) {
//                        $("#resultados_ajax").html("<div class='alert alert-danger'><i class='fa fa-times-circle' aria-hidden='true'>¡Error!</i>Este N° de cédula ya existe.</div>");
//                        $('#guardar_datos').attr("disabled", true);
//                       $("#cedula").focus();
//                        return false;
//                    }
//                }
//            });
    $("#resultados_ajax").html("<div class='alert alert-success'><i class='fa fa-check' aria-hidden='true'></i>Número de cédula aceptado con éxito.</div>");
            $("#nombres").focus();
            $('#guardar_datos').attr("disabled", false);
    }
    } else if (tipoid == 2) {
    $('#razon_social').attr('readonly', false);
            var rucValido = validarRUC(cedula);
            if (!rucValido) {
    $("#resultados_ajax").html("<div class='alert alert-danger'><i class='fa fa-times-circle' aria-hidden='true'>¡Error!</i>R.U.C Inválido, Intente nuevamente.</div>");
            $('#guardar_datos').attr("disabled", true);
            $("#cedula").focus();
            return false;
    } else {
//            $.ajax({
//                url: 'ajax/verificarCedulaExistente.php',
//                type: 'POST',
//                async: true,
//                data: {cedula: cedula},
//
//                success: function (datos) {
//                    if (datos == 1) {
//                        $("#resultados_ajax").html("<div class='alert alert-success'><i class='fa fa-check' aria-hidden='true'></i> R.U.C aceptado con éxito.</div>");
//                        $('#guardar_datos').attr("disabled", false);
//                         $("#nombres").focus();
////          
//                    } else if (datos == 0) {
//                        $("#resultados_ajax").html("<div class='alert alert-danger'><i class='fa fa-times-circle' aria-hidden='true'>¡Error!</i>Este N° de R.U.C ya existe.</div>");
//                        $('#guardar_datos').attr("disabled", true);
//                        $("#cedula").focus();
//                        return false;
//                    }
//                }
//            });
    $("#resultados_ajax").html("<div class='alert alert-success'><i class='fa fa-check' aria-hidden='true'></i> R.U.C aceptado con éxito.</div>");
            $('#guardar_datos').attr("disabled", false);
            $("#nombres").focus();
    }

    } else if (tipoid == 3) {
    var pasaporteValido = ValidarP(cedula);
            $('#razon_social').attr('readonly', true);
            if (!pasaporteValido) {
    $("#resultados_ajax").html("<div class='alert alert-danger'><i class='fa fa-times-circle' aria-hidden='true'>¡Error!</i>Pasaporte Inválido, Intente nuevamente.</div>");
            $('#guardar_datos').attr("disabled", true);
            $("#cedula").focus();
            return false;
    } else {

//        }$.ajax({
//                url: 'ajax/verificarCedulaExistente.php',
//                type: 'POST',
//                async: true,
//                data: {cedula: cedula},
//                success: function (datos) {
//                    if (datos == 1) {
//                        $("#resultados_ajax").html("<div class='alert alert-success'><i class='fa fa-check' aria-hidden='true'></i>Pasaporte correcto.</div>");
//                        $('#guardar_datos').attr("disabled", false);
//                         $("#nombres").focus();
//                    } else if (datos == 0) {
//                        $("#resultados_ajax").html("<div class='alert alert-danger'><i class='fa fa-times-circle' aria-hidden='true'>¡Error!</i>Existe un cliente registrado con ese pasaporte.</div>");
//                        $('#guardar_datos').attr("disabled", true);
//                          $("#cedula").focus();
//                        return false;
//                    }
//                }
//            });
    $("#resultados_ajax").html("<div class='alert alert-success'><i class='fa fa-check' aria-hidden='true'></i>Pasaporte correcto.</div>");
            $('#guardar_datos').attr("disabled", false);
            $("#nombres").focus();
    }
    } 
//    else if (tipoid == 4) {
//    $('#razon_social').attr('readonly', true);
//    $.ajax({
//    url: 'ajax/verificarCedulaExistente.php',
//            type: 'POST',
//            async: true,
//            data: {cedula: cedula},
//            success: function (datos) {
//            if (datos == 1) {
//            $("#resultados_ajax").html("<div class='alert alert-success'><i class='fa fa-check' aria-hidden='true'></i>Correcto.</div>");
//                    $("#nombres").focus();
//                    $('#guardar_datos').attr("disabled", false);
//            } else if (datos == 0) {
//            $("#resultados_ajax").html("<div class='alert alert-danger'><i class='fa fa-times-circle' aria-hidden='true'>¡Error!</i>Existe un registro con estos datos</div>");
//                    $("#cedula").focus();
//                    $('#guardar_datos').attr("disabled", true);
//                    return false;
//            }
//            }
//    });
//    }
}


//function ValidarR(ruc) {
//    var ruc = ruc;
//    array = ruc.split("");
//    num = array.length;
//    if (num == 13) {
//
//        var ced = ruc.substring(0, 10);
//        var aux = ruc.substring(10, 13);
//
//        if (ValidarC(ced)) {
//            if (aux != 001) {
//                swal({title: "Error!",
//                    text: "Los tres últimos dígitos no tienen el código de RUC 001",
//                    type: "error",
//                    confirmButtonText: "Ok"});
////                boton.disabled = true;
//                return false;
//            } else {
////                boton.disabled = false;
//                return true;
//            }
//        } else {
//            swal({title: "Error!",
//                text: "Ruc no válido",
//                type: "error",
//                confirmButtonText: "Ok"});
////            boton.disabled = true;
//            return false;
//        }
//
//    } else {
//        swal({title: "Error!",
//            text: "El RUC no tiene el formato correcto",
//            type: "error",
//            confirmButtonText: "Ok"});
////        boton.disabled = true;
//        return false;
//    }
//}
//-------------------------VALIDAR CEDULA -------------------------------------
function ValidarC(cedula)
{
    var cedula = cedula;
    array = cedula.split("");
    num = array.length;
    if (num == 10)
    {
        total = 0;
        digito = (array[9] * 1);
        for (i = 0; i < (num - 1); i++)
        {
            mult = 0;
            if ((i % 2) != 0) {
                total = total + (array[i] * 1);
            } else
            {
                mult = array[i] * 2;
                if (mult > 9)
                    total = total + (mult - 9);
                else
                    total = total + mult;
            }
        }
        decena = total / 10;
        decena = Math.floor(decena);
        decena = (decena + 1) * 10;
        final = (decena - total);
        if ((final == 10 && digito == 0) || (final == digito)) {

            return true;
        } else
        {
            return false;
        }
    } else {
        return false;
    }
}
//-------------------------VALIDAR RUC -------------------------------------

function validarRUC(number) {

    var dto = number.length;
    var valor;
    var acu = 0;
    if (number == "") {
        return false;
    } else {
        for (var i = 0; i < dto; i++) {
            valor = number.substring(i, i + 1);
            if (valor == 0 || valor == 1 || valor == 2 || valor == 3 || valor == 4 || valor == 5 || valor == 6 || valor == 7 || valor == 8 || valor == 9) {
                acu = acu + 1;
            }
        }
        if (acu == dto) {
            while (number.substring(10, 13) != 001) {
//     alert('Los tres últimos dígitos no tienen el código del RUC 001.');
                return false;
            }
            while (number.substring(0, 2) > 24) {
//     alert('Los dos primeros dígitos no pueden ser mayores a 24.');
                return false;
            }
//    alert('El RUC está escrito correctamente');
//    alert('Se procederá a analizar el respectivo RUC.');
            var porcion1 = number.substring(2, 3);
            if (porcion1 < 6) {
                return true;
//                alert('El tercer dígito es menor a 6, por lo \ntanto el usuario es una persona natural.\n');
            } else {
                if (porcion1 == 6) {
                    return true;
//                    alert('El tercer dígito es igual a 6, por lo \ntanto el usuario es una entidad pública.\n');
                } else {
                    if (porcion1 == 9) {
                        return true;
//                        alert('El tercer dígito es igual a 9, por lo \ntanto el usuario es una sociedad privada.\n');
                    }
                }
            }
        } else {
            return false
//            alert("ERROR: Por favor no ingrese texto");
        }
    }
    return true;
}
//-------------------------VALIDAR PASAPORTE -------------------------------------
function ValidarP(pass) {
    var pass = pass;
    array = pass.split("");
    num = array.length;
    if (num == 8) {
        var col = 0;
        var colT = false;
        for (var i = 0; i < num; i++) {
            if (i == 0 || i == 1) {
                if (esLetra(array[i])) {
                    col++;
                    colT = true;
                } else {
//                    swal({title: "Error!",
//                        text: "El Pasaporte es incorrecto",
//                        type: "error",
//                        confirmButtonText: "Ok"});
//                    boton.disabled = true;
                    return false;
                }
            } else {
                if (isNaN(array[i]) == false) {
                    col++;
                    colT = true;
                } else {
//                    swal({title: "Error!",
//                        text: "El Pasaporte es incorrecto",
//                        type: "error",
//                        confirmButtonText: "Ok"});
//                    boton.disabled = true;
                    return false;
                }
            }
            if (i == 7) {
//                boton.disabled = false;
                return colT;
            }
        }

    } else {
        if (num == 9) {
            var ven = 0;
            var venT = false;
            for (var i = 0; i < num; i++) {
                if (isNaN(array[i]) == false) {
                    ven++;
                    venT = true;
                } else {
//                    swal({title: "Error!",
//                        text: "El Pasaporte es incorrecto",
//                        type: "error",
//                        confirmButtonText: "Ok"});
//                    boton.disabled = true;
                    return false;
                }

                if (i == 8) {
//                    boton.disabled = false;

                    return venT;
                }
            }

        } else {
//            swal({title: "Error!",
//                text: "El Pasaporte es incorrecto",
//                type: "error",
//                confirmButtonText: "Ok"});
//            boton.disabled = true;
            return false;
        }
    }
}




//-------------------------------VALIDACIONES
// Código ASCII

function esDigito() {
    var evento = window.event;
    var cod = evento.charCode || evento.keyCode;
    if (cod >= 48 && cod <= 57) {
        return true;
    }
    return false;
}
function esMoney() {
    var evento = window.event;
    var cod = evento.charCode || evento.keyCode;
    if ((cod >= 48) && (cod <= 57) || cod === 46) {
        return true;
    }
    return false;
}
function esDigitoAndSigno() {
    var evento = window.event;
    var cod = evento.charCode || evento.keyCode;
    if ((cod >= 48) && (cod <= 57) || cod === 45) {
        return true;
    }
    return false;
}
function esLetra() {
    var evento = window.event;
    var cod = evento.charCode || evento.keyCode;
    if (cod === 32 || (cod >= 65 && cod <= 90) || (cod >= 97 && cod <= 122) || (cod >= 160 && cod <= 163)
            || cod === 241 || cod === 209 || cod === 193 || cod === 201 || cod === 205 || cod === 211 || cod === 218
            || cod === 225 || cod === 233 || cod === 237 || cod === 243 || cod === 250) {
        return true;
    }
    return false;
}
function limpiar_datos(id) {
    document.getElementById(id).reset();
    $("#nombre").focus();

}
function aMayus(e, elemento) {
    tecla = (document.all) ? e.keyCode : e.which;
    elemento.value = elemento.value.toUpperCase();
}
function aMinus(e, elemento) {
    tecla = (document.all) ? e.keyCode : e.which;
    elemento.value = elemento.value.toLowerCase();
}
function cod_producto() {
    var nombre = ($("#nombre").val()).substr(0, 3).toLowerCase();
    if (nombre != "") {
        $.ajax({
            type: 'POST',
            url: 'ajax/cod_pro.php',
            async: true,
            data: {nombre: nombre},
//  data: 'parametro1=valor1&parametro2=valor2',

            success: function (datos) {
                $("#codigo").val(datos);
                console.log(datos);
            }
        });
    }
}

