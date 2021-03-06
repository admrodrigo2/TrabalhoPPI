$(function () {
  $("#home").fadeIn(1000);
  $("#divMissao").fadeIn(1000);
  especialidade();
  $('select[name=especialidade]').change(function(){
    var id = $(this).val();
    medico(id);
  });
  $('#telefone').mask('(99) 99999-9999', {reverse: true});
});

$(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
        //Mudar pra light
        $("nav.navbar").removeClass("navbar-dark");
        $("nav.navbar").addClass(" navbar-light bg-light");
    } else {
        //voltar para transparente
        $("nav.navbar").removeClass("navbar-light bg-light");
        $("nav.navbar").addClass("navbar-dark");
    }
});

function mainText(t){
  $(".divMain").hide();
  $("#div" + t).fadeIn(300).fadeOut(300).fadeIn(500);
}
// Especialidade
function especialidade(){
  $.ajax({
    type: 'GET',
    url: 'assets/php/consultaAgenda.php?variavel=',
    data: {
      acao: 'especialidade'
    },
    dataType: 'json',
    success: function(data){
      console.log(data);
      
      for(var i = 0; i<data.length; i++){
        //Utilizar JS/DOM
        $('select[name=especialidade]').append('<option value="'+data[i]['id_funcionario']+'">'+data[i]['especialidade']+'</option>');
      }
    }
  });
}

// Medico
function medico(especialidade){
  $.ajax({
    type: 'GET',
    url: 'assets/php/consultaAgenda.php?variavel=',
    data: {
      acao: 'medico',
      id: especialidade
    },
    dataType: 'json',
    beforeSend: function(){
      $('select[name=medico]').html('<option>Carregando...</option>');
    },
    success: function(data){
      console.log(data);
      $('select[name=medico]').html('');
      $('select[name=medico]').append('<option value="">Selecione o medico</option>');
      for(var i = 0; i<data.length; i++){
        $('select[name=medico]').append('<option value="'+data[i]['id_funcionario']+'">'+data[i]['nome']+'</option>');
      }
    }
  });
}

//Busca hora disponível
function hora(){
    
    var id_funcionario = document.getElementById('medico').value;
    var data = document.getElementById('consulta').value;

    if(!validaData()){
      alert("O agendamento não pode ser em data posterior.");
    }
    else{

      $.ajax({
        type: 'GET',
        url: 'assets/php/consultaAgenda.php?variavel=',
        data: {
        acao: 'hora',
        id: id_funcionario,
        data: data
      },

      dataType: 'json',
      beforeSend: function(){
        $('select[name=disponivel]').html('<option>Carregando...</option>');
      },
      success: function(data){
        console.log(data[1]);
        $('select[name=disponivel]').html('');
        $('select[name=disponivel]').append('<option value="">Selecione um horario</option>');
        var x = document.getElementById("disponivel");
        
        /*for(var i = 0; i<data.length; i++){
          for(var j = 8; j <= 18; j++){
            myDate = new Date();  
            myDate.setHours(j, 0, 0, 0);
            comP = new Date();
            comP.setHours(data[i]['hora'], 0, 0, 0);
            if(myDate.getHours() != comP.getHours()) {
              var option = document.createElement("option");

              option.text = (myDate.getHours() + ":" + myDate.getMinutes() +"0");
              option.value = j; 
              x.add(option); 
            }  
          }
        }*/
      },
      error: function(xhr, status, error) {
        console.log(status + error + xhr.responseText);
      }
    });
  }
}

function validaData(){
  var data = document.getElementById('consulta').value;

  var now = new Date();

  if(data.substring(0,4) < now.getFullYear())
    return false;

  if(data.substring(0,4) == now.getFullYear() && (data.substring(5,7) - 1 ) < now.getMonth())
    return false;

  if(data.substring(0,4) == now.getFullYear() && (data.substring(5,7) - 1 )== now.getMonth() &&
    data.substring(8, 10) < now.getDate())
    return false;

  return true;
}


function alterNav(){
  if($("nav.navbar").hasClass('navbar-dark')){
        $("nav.navbar").removeClass("navbar-dark");
        $("nav.navbar").addClass(" navbar-light bg-light");
  }else if($(window).scrollTop() < 100){
        $("nav.navbar").removeClass("navbar-light bg-light");
        $("nav.navbar").addClass("navbar-dark");
      }

}

function openPage(idPagina, link)
{
  $(".tab").hide();
  $(".img").hide();
  $("ul.navbar-nav, li").removeClass("active");

  $("#" + idPagina).fadeIn(500);
  if (link != null)
    link.parentNode.className += " active";

  if(idPagina == "galeria")
    initGaleria();

  if($(".navbar-toggler").attr('aria-expanded') == "true"){
    alterNav();
    $(".navbar-toggler").addClass("collapsed");
    $(".navbar-toggler").attr('aria-expanded', false);
    $(".navbar-collapse").removeClass("show");
  }
}

function initGaleria(){
  $(".img").each(function(i) {
    $(this).delay(300*i).fadeIn();
  });
}

function imgMouseEnter(img){
  img.style.border = "5px solid red";
}

function imgMouseLeave(img){
  img.style.border = "";
}

function login(btn){
  btn.disabled = true;
  var formData = new FormData($('#form-login')[0]);

  $.ajax({
    url: 'assets/php/login.php',
    type: 'POST',
    async: true,
    dataType: 'html',
    data: formData,
    processData: false,
    contentType: false,

    success: function(result){
      btn.disabled = false;
      if(result == "logged"){
        document.getElementById("divSuccessMsg").innerHTML = result;
        $("#divSuccessMsg").fadeIn(200).delay(500).fadeOut(200);
        $("#form-login").submit();
      }
      else{
        $('#form-login')[0].reset();
        document.getElementById("errorMsg").innerHTML = result;
        $("#divErrorMsg").fadeIn(200).delay(1000).fadeOut(200);
      }
    },

    error: function(xhr, status, error) {
      $('#form-login')[0].reset();
      document.getElementById("errorMsg").innerHTML = status + error + xhr.responseText;
      $("#divErrorMsg").fadeIn(200).delay(1000).fadeOut(200);
      btn.disabled = false;
    }
  });
}