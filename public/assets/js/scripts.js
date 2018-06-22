// une varaible qui recupere la valeur et tu fais .html(valeur)   

var check;
var coordonnee;

$(function()
{
  $("#myForm").on('click', accepter);
  $("area").click(remplace);
  $("#confirm").click(valid);
});
  //boutton valider
  function accepter(event)
  {
    event.preventDefault(); 
    $("#myForm").hide();
    $("#feedback").html("Validation réussie.");
  } 
//remplace a la validation par une icone check
function remplace() 
{
   check = $(this).data('zone');
   coordonnee = $(this).attr('coords');
   console.log(check);
   console.log(coordonnee);
}
//validation
 function valid() 
 {
  if(contenu !=null)
  {
     document.getElementsByTagName("BODY")[0].style.backgroundColor = "grey "; 
 $(check).toggleClass("<li class='fa fa-check-square-o'></li>'");  
    console.log();
  }
  else
  {
    $(check).html('erreur')
  }
 
}   
  