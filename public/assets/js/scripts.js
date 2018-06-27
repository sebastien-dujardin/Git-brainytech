//SERT A AFFICHER OU NON LE 2EME FORMULAIRE pour ENTREPRISE
 $(function(){
    $('#diventreprise').hide();
    $("#marteau").on('click',function(){
   $("#diventreprise").toggle(); 
  });
});

 jQuery(function($){
	$.datepicker.regional['fr'] = {
		closeText: 'Fermer',
		prevText: '&#x3c;Préc',
		nextText: 'Suiv&#x3e;',
		currentText: 'Aujourd\'hui',
		monthNames: ['Janvier','Fevrier','Mars','Avril','Mai','Juin',
		 'Juillet','Aout','Septembre','Octobre','Novembre','Decembre'],
		monthNamesShort: ['Jan','Fev','Mar','Avr','Mai','Jun',
		 'Jul','Aou','Sep','Oct','Nov','Dec'],
		dayNames: ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'],
		dayNamesShort: ['Dim','Lun','Mar','Mer','Jeu','Ven','Sam'],
		dayNamesMin: ['Di','Lu','Ma','Me','Je','Ve','Sa'],
		dateFormat: 'dd-mm-yy',
		firstDay: 1,
		minDate: 0,
		maxDate: '+3M +0D',
		numberOfMonths: 1,
		showButtonPanel: true,
		autoSize: true,
		contrainInput: true
		};
	$.datepicker.setDefaults($.datepicker.regional['fr']);
});





