<?php

echo "Hola  \n";
echo "Vamos a juagar una partida a las 7 y 1/2  \n\n";

// variable que determmina si queremos jugar o on 

$jugar ="s";

while ($jugar =="s"){

// declaramos los contadores de los jugadores

$humano=0;
$maquina=0;
$quieresCarta = "s";
// creamos la baraja de cartas yamando a la funcion declarada mas abajo
$baraja = creaCartas();

	echo "Jugador: \n\n";

	$humano += pideCarta($baraja);
	

	do {

		echo "Quieres otrs carta (s/n) \n";
		$quieresCarta  = trim(fgets(STDIN));

		if ( $humano < 7.5){
		$humano += pideCarta($baraja);
		echo "Llevas " . $humano."\n\n";

		};

		 if ($humano > 7.5){
		
			echo "Perdiste has superado 7,5 \n\n";

			$quieresCarta = "n";

		}

		if ( $humano == 7.5){

			$quieresCarta = "n";
		}

		
	}while ($quieresCarta ==="s");

	

	if ($humano<=7.5){

		echo "Maquina \n\n";

	while(($maquina<$humano)&&($maquina != 7.5)){

		$maquina += pideCarta($baraja);
		echo "Llevas " . $maquina."\n\n";

	}
}

if ($maquina == $humano){

	echo "Empate!!! \n \n";

}else if (($maquina>$humano)&& ($maquina<=7.5)){


	echo "Gana La Maquina \n \n";

} else if (($humano < 7.5) && ($humano > $maquina)){


	echo "Tu ganas,  Felicidades \n \n";
} else if ($maquina >7.5){

	echo "La maquina supera los 7,5 ganaste :) Felicidades \n \n";
}


	echo "Quieres Jugar otra partida s/n \n";
	$jugar = trim(fgets(STDIN));	
}

//Funcion que nos crea la baraja de Cartas 

function creaCartas(){
$palos = array (
    "Oros", "Copas", "Espadas", "Bastos"
);

$numeros = array (
    "2", "3", "4", "5","6", "7", "8",
    "9", "10", "1",
);


$cartas = array();

foreach ($palos as $palo) {
    foreach ($numeros as $numero) {
        $cartas[] = array ("palo"=>$palo, "numero"=>$numero);
    }
}

return $cartas;
}

function pideCarta(&$baraja){

shuffle($baraja);


$carta = array_shift($baraja);

echo "Tu carta es " . $carta['numero'] . " de " .$carta['palo']."\n";


if ($carta['numero'] <= 7){

return $carta['numero'];

} else{



	return 0.5;
}

}

?>