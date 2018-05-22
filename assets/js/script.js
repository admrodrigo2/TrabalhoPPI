$(function () {
  $("#home").fadeIn(1000);
  $("#divMissao").fadeIn(1000);
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

function openPage(idPagina, link)
{
  $(".tab").hide();      
  $("ul.navbar-nav, li").removeClass("active");          

  $("#" + idPagina).fadeIn(500);
  if (link != null)
    link.parentNode.className += " active";
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

function mainText(t){
  $(".divMain").hide();
  $("#div" + t).fadeIn(300).fadeOut(300).fadeIn(500);
}

$(function(){

  // especialidade
  function especialidade(){
    $.ajax({
      type: 'GET',
      url: 'consultaAgenda.php',
      data: { acao: 'especialidade'},
      dataType: 'json',
      success: function(data){
        console.log(data);
      }
    });
  }
  especialidade();
});
