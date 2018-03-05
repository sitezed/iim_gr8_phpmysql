<?php
// balise d'ouverture PHP
// commentaire sur une ligne
/*
commentaire 
sur plusieurs lignes
*/
// fermeture de balise PHP
?>
<!-- Je peux ecrire du HTML dans un fichier PHP, 
en dehors des balises PHP -->
<h1>Mon titre HTML</h1>
<?php
// mais, je ne peux pas ecrire du PHP dans un fichier HTML
echo '<h1>Autre titre</h1>'; // echo sert a faire un affichage
?>
<h2>Les variables en PHP</h2>
<?php
/*une variable est une sorte de boite virtuelle qui contient des données*/
$maBoite = 'Valeur dans ma boite';
echo '<p>';
echo $maBoite; 
echo '</p>';
echo "<p>$maBoite</p>"; // affiche aussi <p>Valeur dans ma boite</p>
$autreBoite = $maBoite;
echo "<p>$autreBoite</p>"; // affiche aussi <p>Valeur dans ma boite</p>

// différence entre les ' ' et les " "
echo "<p>$maBoite</p>"; // affiche <p>Valeur dans ma boite</p>
echo '<p>$maBoite</p>'; // affiche <p>$maBoite</p>
/* la diference se trouve dans l'interpretation : les " " vont donner la
valeur de la variable tandis que les ' ' vont donner le nom de la variable */

// la concatenation
/* concatener signifie, metre des morceaux de texte les uns à côté des autres */
$morceauA = 'Je navigue vers';
$morceauB = 'l\'Ocean'; // le \ permet d'echapper la quote
echo '<p>' . $morceauA . ' ' . $morceauB . '</p>';
// meme resultat avec " "
echo "<p>$morceauA $morceauB</p>";

// Les constantes
?>
<h2>Les constantes</h2>
<?php
/*les constantes sont des boites virtuelles que l'on ne peut pas modifier*/
const MA_CONSTANTE = 'valeur dans ma constante'; // definition affectation
echo '<p>' . MA_CONSTANTE . '</p>'; // affichage

$maBoite = 'Nouvelle valeur'; // OK
const MA_CONSTANTE = 'autre valeur'; // impossible erreur
?>
<h2>les super variables Array</h2>
<?php
/* Les arrays sont des sortes de super variables, ils permettent de stocker plusieurs valeurs rangées sous forme de clé -> valeur */
$pays = ['France','Espagne','Maroc'];
echo '<p>'.$pays.'</p>'; // ERREUR je ne peux pas afficher un Array en passant par echo.
echo '<p>'.$pays[0].'</p>'; // France
echo '<p>'.$pays[1].'</p>'; // Espagne
echo '<p>'.$pays[2].'</p>'; // Maroc
// affichage en mode console de debuguage
echo '<pre>';
var_dump($pays);
print_r($pays);
echo '</pre>';

?>
<h2>Les conditions</h2>
<?php
/* condition IF ELSE */
$chiffreA = 10;
$chiffreB = 20;
if($chiffreA > $chiffreB){
	echo '<p>La condition est BIEN remplie</p>';
} else {
	echo '<p>La condition n\'est PAS remplie</p>';
}
/* condition IF ELSEIF ELSE */
$info = 'alerte';
if($chiffreA > $chiffreB){
	echo '<p>La condition est BIEN remplie</p>';
} elseif($info == 'alerte') {
	echo '<p>La 1ere condition n\'est PAS remplie MAIS la seconde est BIEN remplie</p>';
} else {
	echo '<p>Aucune condition n\'est remplie</p>';
}
/*
== 		test si la valeur correspond bien
===		test si la valeur ET le type correspondent bien (voir exemple ci-dessous)
!=		test si les valeurs sont differentes
!==		test si les valeurs OU les types sont différents
A > B 	test si A est supérieur à B		
A >= B  test si A est supérieur ou égal à B
A < B   test si A est inferieur à B
A <= B  test si A est inferieur ou égal à B
!		test l'inverse de ce qui est recherché initialement (voir exemple ci-dessous)
*/
// exemple de difference de types et valeur

$chiffreA = 10; // ce chiffre vaut 10 et est de type INTEGER
$chiffreB = '10'; // ce chiffre vaut 10 et est de type STRING
// les types sont donc différents
if($chiffreA == $chiffreB) {
	echo '<p>Les valeurs sont ÉGALES</p>';
}

if($chiffreA === $chiffreB) {
	echo '<p>Les valeurs ET le types sont ÉGAAUX</p>';
} else {
	echo '<p>Les valeurs OU les types ne sont PAS ÉGAAUX</p>';
}

$chiffreA = 10;
$chiffreB = 100;
if( ! ($chiffreA > $chiffreB) ){
	echo '<p>Je rentre BIEN dans ma condition car je recherche l\'inverse de ce que je demande</p>';
}

?>
<h2>Les boucles PHP</h2>
<?php
// La boucle for
for($i=0;$i<5;$i++){
	echo "<p>Ce code se repetera 5 fois : $i eme fois</p>";
}

// declaration/affectation;condition;incrémentation 
for($i=1;$i<5;$i++){
	echo "<img src=\"image$i.jpeg\">";
}

// la boucle while
/*la boucle while, à la différence de la boucle for n'impose pas d'incrementation mais possède la mëme utilité dans la majorité des cas*/
$i=1;// declaration/affectation
while($i<5){ // condition
	echo "<img src=\"image$i.jpeg\">";
	$i++; // incrémentation
}

// la boucle foreach pour lire les arrays
$liste = ['lait', 'eau', 'tomates', 'pain', 'coca'];
echo '<pre>';
print_r($liste);
echo '</pre>';
?>
<ul>
	<?php
	foreach($liste as $key => $value) {
		echo '<li>' . $key . ' : ' . $value . '</li>';
	}
	?>
</ul>
<?php
// les fonctions
?>
<h2>Les fonctions</h2>
<?php
// declaration de fonction = creation de fonction
function p($argument) {
	echo '<p>' . $argument . '</p>';
}

// execution de ma fonction = utilisation de la fonction
p('mon texte'); // affiche <p>mon texte</p>

// fonction avec 2 arguments
function meteo($saison, $temperature) {
	$s = '';
	if($temperature > 1 || $temperature < -1){
		$s = 's';
	}
	echo 'Nous sommes en ' . $saison . ' et il fait ' . $temperature . ' degré' . $s;
}

meteo('hiver', -12);
// une fonction qui me donne le prix TTC lorsque je rentre un prix hors taxe
function calculTtc($prix){
	$prixTtc = $prix * 1.2;
	p('Le prix total est de ' . $prixTtc . ' € TTC');
}
calculTtc(10); // doit afficher 12€ TTC

// fonction sans argument
function tirerTrait() {
	echo '<hr><hr>';
}
tirerTrait();
tirerTrait();
























?>
<div style="height:1000px"></div>






















