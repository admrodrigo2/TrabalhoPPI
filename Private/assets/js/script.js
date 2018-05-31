$(function(){
  $("#newFunc").fadeIn(1000);
  $('select[name=cargo]').change(function(){
    if($(this).val() === "medico"){
      $("#divEsp").fadeIn(100);
      $("#divEsp").attr("required", true);
    }
    else{
      $("#divEsp").hide();
      $("#divEsp").attr("required", false);
    }
  });
  $('#cpf').mask('000.000.000-00');
  $('#cep').mask('99999-999');
  $('#carTrab').mask('9999999');
  $('#rg').mask('SS-99.999.999');
  buscaFunc();
  buscaCont();
  buscaAgend()
})

function openPage(idPagina, link)
{
  $(".tab").hide();
  $("ul.navbar-nav, li").removeClass("active");

  $("#" + idPagina).fadeIn(500);
  if (link != null)
    link.parentNode.className += " active";

  if($(".navbar-toggler").attr('aria-expanded') == "true"){
    $(".navbar-toggler").addClass("collapsed");
    $(".navbar-toggler").attr('aria-expanded', false);
    $(".navbar-collapse").removeClass("show");
  }
}

function cadFunc(form){
  if(!validaData()){
    alert("Por favor, selecione uma data válida!");
    return false;
  }

  if(!validaRadio()){
    alert("Por Favor, selecione um sexo!");
    return false;
  }

  var formData = new FormData($("#formFunc")[0]);

  $.ajax({
    url: 'assets/php/cadFunc.php',
    type: 'POST',
    async: false,
    dataType: 'html',
    data: formData,
    processData: false,
    contentType: false,

    success: function(result){
      if(result == "OK"){
        alert("Dados Cadastrados com sucesso!");
        return true;
      }        
      else{
        alert(result);
        return false;
      }
    },

    error: function(xhr, status, error){
      alert(status + error + xhr.responseText);
      return false;
    }
  });
}

function validaRadio(){
  if($('#sexo1').prop('checked') == false && $('#sexo2').prop('checked') == false)
    return false;

  return true;
}

function validaData(){
  var data = document.getElementById('dataNasc').value;

  var now = new Date();

  if(data.substring(0,4) > now.getFullYear())
    return false;

  if(data.substring(0,4) == now.getFullYear() && (data.substring(5,7) - 1 ) > now.getMonth())
    return false;

  if(data.substring(0,4) == now.getFullYear() && (data.substring(5,7) - 1 )== now.getMonth() &&
    data.substring(8, 10) > now.getDate())
    return false;

  return true;
}

function validaCPF(strCPF){
  if(strCPF.length != 14)
      return;

  strCPF = removeMask(strCPF);
  var Soma;
  var Resto;
  Soma = 0;
  //strCPF  = RetiraCaracteresInvalidos(strCPF,11);
  if (strCPF == "00000000000" || strCPF == "11111111111" || strCPF == "22222222222" ||
    strCPF == "33333333333" || strCPF == "44444444444" || strCPF == "55555555555" ||
    strCPF == "66666666666" || strCPF == "77777777777" || strCPF == "88888888888" ||
    strCPF == "99999999999" ){
    msgErrorCPF(0);
    return false;
  }
  for (i=1; i<=9; i++)
    Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
  
  Resto = (Soma * 10) % 11;
  
  if ((Resto == 10) || (Resto == 11))
    Resto = 0;
  if (Resto != parseInt(strCPF.substring(9, 10)) ){
    msgErrorCPF(0);
    return false;
  }
  
  Soma = 0;
  for (i = 1; i <= 10; i++)
    Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
  
  Resto = (Soma * 10) % 11;
  
  if ((Resto == 10) || (Resto == 11))
    Resto = 0;
  if (Resto != parseInt(strCPF.substring(10, 11) ) ){
    msgErrorCPF(0);
    return false;
  }

  msgErrorCPF(1);
}

function msgErrorCPF(i){
  if(i == 0){
    $("#errorMsgCPF").fadeIn(200);
    $("#cpf").val('');
  }
  else
    $("#errorMsgCPF").hide();
}

function removeMask(elem) {
  var strValue = elem;

  strValue = strValue.replace(".", "");
  strValue = strValue.replace(".", "");
  strValue = strValue.replace("-", "");
  strValue = strValue.replace("/", "");
  strValue = strValue.replace("/", "");

  return strValue;
}

function buscaEnd(cep){

  if (cep.length != 9)
    return;
  
  $.ajax({
    url: 'assets/php/buscaEnd.php?cep=',
    type: 'GET',
    async: true,
    dataType: 'json',
    data: {
      cep: cep
    },
    cache: false,

    success: function(result){
      if(result.lograd != null){
        $("#tipLog").val(result.lograd);
        $("#log").val(result.log);
        $("#bairro").val(result.bairro);
        $("#cidade").val(result.cidade);
        $("#estado").val(result.estado);
      }
    },

    error: function(xhr, status, error){
      console.log(status + error + xhr.responseText);
    }
  });
}

function buscaFunc(){
  $("#noFunc").hide();
  $("#buscandoF").fadeIn();

  $.ajax({
    url: 'assets/php/buscaFunc.php',
    type: 'POST',
    async: true,
    dataType: 'json',
    cache: false,
    success: function(result){
      $("#funcTable tbody>tr").remove();
      for(var i = 0; i < result.length; i ++){
        var newRow = $("<tr>");
        var cols = "";

        cols += "<td>" + result[i].nome + "</td>";
        cols += "<td>" + result[i].sexo + "</td>";
        cols += "<td>" + result[i].cargo + "</td>";
        cols += "<td>" + result[i].rg + "</td>";
        cols += "<td>" + result[i].log + "</td>";
        cols += "<td>" + result[i].cidade + "</td>";

        newRow.append(cols);
        $("#funcTable").append(newRow);
      }

      if(result.length == 0){
        $("#noFunc").fadeIn(2000);
      }
      $("#bucandoF").delay(2000).hide();

    },

    error: function(xhr, status, error){
      alert(status + error + xhr.responseText);
      return false;
    }
  });
}

function buscaCont(){
  $("#noCont").hide();
  $("#buscandoC").fadeIn();

  $.ajax({
    url: 'assets/php/buscaCont.php',
    type: 'POST',
    async: true,
    dataType: 'json',
    cache: false,
    success: function(result){      

      $("#contTable tbody>tr").remove();
      for(var i = 0; i < result.length; i ++){
        var newRow = $("<tr>");
        var cols = "";

        cols += "<td>" + result[i].nome + "</td>";
        cols += "<td>" + result[i].email + "</td>";
        cols += "<td>" + result[i].motivo + "</td>";
        cols += "<td>" + result[i].mensagem + "</td>";

        newRow.append(cols);
        $("#contTable").append(newRow);
      }

      if(result.length == 0){
        $("#noCont").fadeIn(2000);
      }
      $("#buscandoC").delay(2000).hide();

    },

    error: function(xhr, status, error){
      alert(status + error + xhr.responseText);
      return false;
    }
  });
}

function buscaAgend(){
  $("#noAgend").hide();
  $("#buscandoA").fadeIn();

  $.ajax({
    url: 'assets/php/buscaAgend.php',
    type: 'POST',
    async: true,
    dataType: 'json',
    cache: false,
    success: function(result){      

      $("#agendTable tbody>tr").remove();
      for(var i = 0; i < result.length; i ++){
        var newRow = $("<tr>");
        var cols = "";

        cols += "<td>" + result[i].nomeM + "</td>";
        cols += "<td>" + result[i].espec + "</td>";
        cols += "<td>" + result[i].date + "</td>";
        cols += "<td>" + result[i].nomeP + "</td>";
        cols += "<td>" + result[i].telefone + "</td>";

        newRow.append(cols);
        $("#agendTable").append(newRow);
      }

      if(result.length == 0){
        $("#noAgend").fadeIn(2000);
      }
      $("#buscandoA").delay(2000).hide();

    },

    error: function(xhr, status, error){
      alert(status + error + xhr.responseText);
      return false;
    }
  });
}
