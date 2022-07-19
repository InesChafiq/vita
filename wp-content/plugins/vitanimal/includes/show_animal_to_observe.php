<?php

include_once "log.php";
include_once "request.php";

function show_animals_to_observe() {
	$user = wp_get_current_user();
	$retour = '';
	$id_eval = $_GET['id_eval'];



	if($user->ID != 0){
		$css_p = 'style="font-size: 10px; "';
		$count = count_all_animal_group_to_observe($user->ID);
		$date = date('j N n Y');
		$retour .= '<div style="text-align: center "><h4>' . date_english_to_french($date) . '</h4>';
		//print_r($user);
		$retour .= '<h6>Bienvenue '. $user->user_login.'!</h6>';
		if($count[0]->nb_group > 0){
			$group = get_all_animal_group_to_observe($user->ID);
			$retour .= '<p>Il y a '. $count[0]->nb_group.' animaux/groupe à observer </p></div>
						<ul style = "list-style: none; text-align: center;">';
			foreach ( $group as $nb_group ) {
				$retour .= '<li ><a href="http://vita.fr/?page_id=104&id_eval=' . $nb_group->eval  . '&id_group='. $nb_group->id.'
				             " class="button" style="padding-left:20%;padding-right:20%; width:90%">'
				           . $nb_group->name . '<p ' . $css_p . '> Espèce: ' . $nb_group->species . ' >>Secteur: ' . $nb_group->area . '>> Enclos: ' . $nb_group->enclos . '</p>
				             <p ' . $css_p . '> Du ' . crop_datetime_to_date($nb_group->eval_begin).' au '. crop_datetime_to_date($nb_group->eval_end).'</p></a></li>';
			}
			$retour .= '</ul>';
		}else{
			$retour .= '<p>Pas d\'animal à observer!</p>';
		}
	}else{
		$retour .= '<p>Vous devez être connecté pour accéder à cette page</p>';
	}

	return $retour;
}

add_shortcode( 'show_animal_observation', 'show_animals_to_observe' );