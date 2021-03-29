console.log('hello');
const divOffre = document.querySelector('#Offre');

$.get(
  'http://localhost:8000/apip/offres', // Le fichier cible côté serveur.
  'false', // Nous utilisons false, pour dire que nous n'envoyons pas de données.
  nom_fonction_retour, // Nous renseignons uniquement le nom de la fonction de retour.
  'json' // Format des données reçues.
);
 
function nom_fonction_retour(ret){
    console.log(ret);
    $list = $("#Offre");
    $list.append('<tr><th scope="row">'+ret.idOffre+'</th><td>'+ret.createat+'</td><td>'+ret.titre+'</td></tr>');
  };