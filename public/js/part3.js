var secondes = 30;
var prix = 0;
var paris = null;
var prixMax = 100;
var isPlay = true;

$('document').ready(function() {

	$('.prixMax').html(prixMax);

	$('#commencer').click(function() {
 
		$('#nombre').val('');
		secondes = 30;
		$('.chrono').html(secondes);
		prix = Math.floor(Math.random() * prixMax);
		isPlay = true;
		$('.reponse').html('Trouvez le Juste Prix !')
		$('#paris').css({'visibility' : 'visible', 'opacity' : '1'});

		var chrono = setInterval(function(){
			if (secondes == 0) {
				clearInterval(chrono);
				$('.reponse').html('Perdu !')
				$('#paris').css({'visibility' : 'hidden', 'opacity' : '0'});
				isPlay = false;
			}
			else if (isPlay) {
				secondes--;
				$('.chrono').html(secondes);
			}
			else {
				clearInterval(chrono);
				$('#paris').css({'visibility' : 'hidden', 'opacity' : '0'});
			}
		}, 1000);
	});

	$('#paris').submit(function(event) {
		if (isPlay) {
			paris = $('#nombre').val();

			if (paris == prix) {
				$('.reponse').html('Gagné !')
				isPlay = false;
			}
			else if (paris < prix) {
				$('.reponse').html('Plus Grand !')
			}
			else {
				$('.reponse').html('Plus Petit !')
			}

			$('#nombre').val('');
		}	
		event.preventDefault();
	});

});