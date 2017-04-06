<?php

//convertir une date aaaa-mm-jj en jj/mm/aaaa
			function dateFr($date)
			{
				//on transforme la chaine en tableau
				$tabDate = explode('-', $date);
				//return $tabDate[2].'/'.$tabDate[1].'/'.$tabDate[0];
				return implode('/', array_reverse($tabDate));
			}