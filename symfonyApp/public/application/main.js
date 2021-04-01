console.log('hello');


$.get(
  'https://jsonplaceholder.typicode.com/posts', // Le fichier cible côté serveur.
  'false', // Nous utilisons false, pour dire que nous n'envoyons pas de données.
  nom_fonction_retour, // Nous renseignons uniquement le nom de la fonction de retour.
  'json' // Format des données reçues.
)

 
function nom_fonction_retour(ret){ 
  console.log('nom function')
  $list = $("#Offre");
	var $i = 0;
	ret.forEach(element =>{
    $list.append('<div class="col-md-4"><div id="carte" class="card" style="width: 18rem;"><img src="img/logo.png" class="card-img-top" alt="..."><div class="card-body"><h5 class="card-title">'+ret[$i].userId+'</h5><p class="card-text">'+ret[$i].id+'</p></div><ul class="list-group list-group-flush"><li class="list-group-item">'+ret[$i].title+'</li></ul></div>');
	$i++;
	});
    console.log(ret);
};