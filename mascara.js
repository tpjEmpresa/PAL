function mascara_telefone()
{
    //limitador
    var tel = document.getElementById("telefone").value
    tel=tel.slice(0,14) //(pode limitar a quantidade de char na entrada pelo java script)
    document.getElementById("telefone").value=tel
    tel=document.getElementById("telefone").value.slice(0,10)
           
    //máscara
    var tel_formatado = document.getElementById("telefone").value
    if (tel_formatado[0]!="(")
    {
        if(tel_formatado[0]!=undefined)
        {
            document.getElementById("telefone").value="("+tel_formatado[0];
        }
    }

    if (tel_formatado[3]!=")")
    {
        if(tel_formatado[3]!=undefined)
        {
            document.getElementById("telefone").value=tel_formatado.slice(0,3)+")"+tel_formatado[3]
        }
    }

    if (tel_formatado[4]!="9")
    {
        if(tel_formatado[4]!=undefined)
        {
            document.getElementById("telefone").value=tel_formatado.slice(0,4)+"9"+tel_formatado[4]
        }
    }

    if (tel_formatado[9]!="-")
    {
        if(tel_formatado[9]!=undefined)
        {
            document.getElementById("telefone").value=tel_formatado.slice(0,9)+"-"+tel_formatado[9]
        }
    }
}

//0000-00-00
function mascara_nasc()
{   
    //limitador
    var nasc = document.getElementById("nasc").value
    nasc=nasc.slice(0,10) //(pode limitar a quantidade de char na entrada pelo java script)
    document.getElementById("nasc").value=nasc
    nasc=document.getElementById("nasc").value.slice(0,10)
           
    //máscara
    var nasc_formatado = document.getElementById("nasc").value
    if (nasc_formatado[4]!="-")
    {
        if(nasc_formatado[4]!=undefined)
        {
            document.getElementById("nasc").value=nasc_formatado.slice(0,4)+"-"+nasc_formatado[4]
            //document.getElementById("nasc").value="-"+nasc_formatado[4];
        }
    }

    if (nasc_formatado[7]!="-")
    {
        if(nasc_formatado[7]!=undefined)
        {
            document.getElementById("nasc").value=nasc_formatado.slice(0,7)+"-"+nasc_formatado[7]
        }
    }
}

function mascara_user()
{    
    var user = document.getElementById("user").value
    user=user.slice(0,20) //(pode limitar a quantidade de char na entrada pelo java script)
    document.getElementById("user").value=user
    user=document.getElementById("user").value.slice(0,20)

    //máscara
    var user_formatado = document.getElementById("user").value
    if (user_formatado[0]!="@")
    {
        if(user_formatado[0]!=undefined)
        {
            document.getElementById("user").value="@"+user_formatado[0];
        }
    }
}

document.getElementById("user").onkeypress = function(e) {
    var chr = String.fromCharCode(e.which);
    if ("1234567890qwertyuioplkjhgfdsazxcvbnm".indexOf(chr) < 0)
        return false;};

document.getElementById("email").onkeypress = function(e) {
    var chr = String.fromCharCode(e.which);
    if ("1234567890qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM@.".indexOf(chr) < 0)
        return false;};

var input = document.getElementById("nasc");
input.addEventListener("keypress", somenteNumeros);
var input = document.getElementById("telefone");
input.addEventListener("keypress", somenteNumeros);

function somenteNumeros(e) {
    var charCode = (e.which) ? e.which : e.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
    e.preventDefault();}