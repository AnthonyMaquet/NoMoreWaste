;(function ($) {
  //Trouve tous les éléments ou il y addPanier
  $('.addPanier').click(function (event) {
    //annule le lien
    event.preventDefault()
    //lancement de la requete
    $.get(
      $(this).attr('href'),
      {},
      function (data) {
        if (data.error) {
          alert(data.message)
        } else {
          if (confirm(data.message + '. Voulez-vous consulter votre commande ?')) {
            //si on accepte on va au panier
            location.href = 'panier.php'
          } else {
            //sinon on ne fait rien
          }
        }
      },
      'json',
    )
    return false
  })
})(jQuery)
