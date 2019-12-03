<?php 
/**
 * Class CifraCesar
 * Usa Cifra de César para encriptar textos
 * @author luisfeliperm <luisfelipepoint@gmail.com>
 * @copyright  Copyright (c) 2019, luisfeliperm - Criptografia
 * 
 */

/**
 * - - - a b c d e f
 * a b c d e f
 */


class CifraCesar
{
	/** @var int chave de deslocamento **/
	private $key; // Numero de casas deslocadas

	/** @var array alfabeto base [a b c...y z a b c ...] **/
	private $alpha_base;

	function __construct($key)
	{
		// Permite chaves negativas
		if($key < 0)
			$key = 26 - ( ($key * -1) );

		if($key>26)
			$key = $key % 26;

		$this->key = $key;
		$a = range("a", "z"); // 0:a 1:b 2:c 

		// Adiciona letras necessarias após o Z
		$this->alpha_base = array_merge($a, range("a", $a[$this->key -1] ));
	}

	/* 	Function algoritimo 
	*	Realiza a operação com os alfabetos de acordo com o $addKey
	* 	@return string
	*/ 
	function algoritimo(string $str, int $addKey) : string{
		$str = strtolower($str);

		$x = str_split($str);
		$return = null;
		foreach ($x as $value) {
			if (preg_match('/[^a-z]/', $value)) {
				$return .= $value;
				continue;
			}

			// Pega posição do alfabeto e acrescenta o deslocamento
			$index =  array_search($value, $this->alpha_base) + $addKey;

			// Correção do bug do indice negativo devido a letras repetidas
			if($index < 0){
				$index = $index+26;
			}

			$return .=  $this->alpha_base[$index];
		}
		return $return;
	}

	function decifra(string $str) : string{
		return $this->algoritimo($str, (0 - $this->key) );
	}

	public function encripta(string $str) : string{
		return $this->algoritimo($str, $this->key);
	}

}


