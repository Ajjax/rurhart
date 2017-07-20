jQuery(document).ready(function(){
  jQuery('.click_artiste').click(function(){
    jQuery.ajax({
			url: ajaxurl, // à adapter selon la ressource
			method : 'POST', // GET par défaut
      data: {
      action: "ajax_prog",
      param :  jQuery(this).attr('value')
  },
			success : function( data ) { // en cas de requête réussie
				// Je procède à l'insertion
			     jQuery('.ajax_artiste').html(data);
			},
			error : function( data ) { // en cas d'échec
				// Sinon je traite l'erreur
				console.log( 'Erreur…' );
			}


		});
  })
})
