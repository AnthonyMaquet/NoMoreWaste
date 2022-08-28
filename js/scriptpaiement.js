window.onload = () => {
  //Variables
  let stripe = Stripe(
    'pk_test_51KwQN9LFbORONtLj2F4XuheO0coztX3MCd8eb7JjAibE4ciN2iARkmPiZIl2YY3PoNIzh7wxEAaKpA6p8DtzmKG600RHGI083q',
  ) //Fct Stripe qui vient du fichier stripe
  let elements = stripe.elements() //date d'expiration, code cvc, code postale de la personne
  let redirect = '/Rattrapage/paiementaccepte.php' //redirection une fois le paiement finis

  //chargement des objets de la page
  let cardHolderName = document.getElementById('cardholder-name') //nom de la personne
  let cardButton = document.getElementById('card-button')
  let clientSecret = cardButton.dataset.secret //code du data-secret (id commande + clé secrète)

  //crée les éléments du formulaire de la CB
  let card = elements.create('card')
  card.mount('#card-elements')

  // gérer la saisie (vérifie l'authenticité des valeurs ajoutées)
  card.addEventListener('change', (event) => {
    let displayError = document.getElementById('card-errors')
    if (event.error) {
      displayError.textContent = event.error.message
    } else {
      displayError.textContent = ''
    }
  })

  //gérer le paiement
  cardButton.addEventListener('click', () => {
    //faire une promesse (élément qui attend une réponse)
    stripe
      .handleCardPayment(clientSecret, card, {
        payment_method_data: {
          billing_details: { name: cardHolderName.value },
        },
      })
      .then((result) => {
        if (result.error) {
          document.getElementById('errors').innerText = result.error.message
        } else {
          document.location.href = redirect
        }
      })
  })
}
