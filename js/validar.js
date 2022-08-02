function validar() {
    var tipoDocumento, id, nombres, apellidos, direccion, correo, password, expresion;
    tipoDocumento = document.getElementById("Tipo_documneto").value;
    id = document.getElementById("ID").value;
    nombres = document.getElementById("NAME").value;
    apellidos = document.getElementById("APELL").value;
    direccion = document.getElementById("DIREC").value;
    correo = document.getElementById("CORREO").value;
    password = document.getElementById("inputPassword").value;
    
    expresion = /\w+@\w+\.+[a-z]/;
    
    if(tipoDocumento === "" || id === ""  || nombres === ""  || apellidos === ""  || direccion === ""  || correo === "" || password === ""){
        alert("Todos los campos son obligatorios");
        return false;
    }
    else if (id.length>15) {
        alert("El número de documento ingresado es muy largo");
        return false;
    }
    else if (nombres.length>50) {
        alert("El nombre ingresado es muy largo");
        return false;
    }
    else if (apellidos.length>50) {
        alert("Los apellidos ingresados son muy largos");
        return false;
    }
    else if (direccion.length>60) {
        alert("La dirección ingresada es muy larga");
        return false;
    }
    else if (correo.length>40) {
        alert("El correo ingresado es muy larga");
        return false;
    }
    else if (!expresion.test(correo)){
        alert("El correo no es valido");
        return false;
    }
    else if (password.length>50) {
        alert("La contraseña solo debe tener 25 caracteres como máximo");
        return false;
    }
    else if(isNaN(id)) {
        alert("El número de identificación ingresado no es un número");
        return false;
    }
    
    

}