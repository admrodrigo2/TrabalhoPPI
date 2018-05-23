$(function () {
  $("#home").fadeIn(1000);
  $("#divMissao").fadeIn(1000);
    
  $('select[name=especialidade]').change(function(){
    var id = $(this).val();
    medico(id);
  })
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
        //$('select[name=especialidade]').append('<option value=>'+data[i]['especialidade']+'</option>');
        $('select[name=especialidade]').append('<option value='+data[i]['id_funcionario']+'">'+data[i]['especialidade']+'</option>');
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
      $('select[name=medico]').append('<option>Selecione o medico</option>');
      for(var i = 0; i < i<data.length; i++){
        $('select[name=medico]').append('<option value='+data[i]['id_funcionario']+'">'+data[i]['nome']+'</option>');
      }
    }
  });
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
  if(idPagina == "agendamento")
    especialidade();
  if(idPagina == "home")
    $("#divMissao").fadeIn(1000);

  alterNav();
  $(".navbar-toggler").addClass("collapsed");
  $(".navbar-toggler").attr('aria-expanded', false)
  $(".navbar-collapse").removeClass("show");
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