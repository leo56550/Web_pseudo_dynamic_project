<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Tableau de bord</title>
		<link rel="stylesheet" href ="tableau_de_bord.css">
		
	</head> 
	
	<body>
		<div class="header">
			<h1> Menu principal </h1>
			<button onclick="window.location.href = 'temperature.html';" type = "button" class = "bouttons_pages_temp">Température</button>
			
			<button onclick="window.location.href = 'lumiere.html';" type = "button" class = "bouttons_pages_lum">Lumière</button>

			<button onclick="window.location.href = 'tableau_de_bord.php';" type = "button" class = "bouttons_pages_tab">Tableau de bord</button>
		</div>

		<fieldset>
				<legend class = legend>Tableau de bord</legend>
			<div class="global">
				<div class ="table1" >
					<div class = "tx_temp"> Température  </div>

						<table class = "tableau">
							<tr>
								<td class =  "td_middle_green">Capteur1 (temp1):</td>
								<td class =  "td_middle_green"><?php echo file_get_contents('/var/www/etu316/temp1.txt'); ?></td>
								<td class =  "td_middle_green_left_special" rowspan ="3">
									<img class = "image_thermo" src="images/temp_gif.gif" alt="iamge_thermomètre">
								</td>
							</tr>
							<tr>
								<td class =  "td_middle_green">Capteur2 (temp2):</td>
								<td class =  "td_middle_green"><?php echo file_get_contents('/var/www/etu316/temp2.txt'); ?></td>
								
							</tr>
							<tr>
								<td class =  "td_middle_green">Capteur3 (temp3):</td>
								<td class =  "td_middle_green"><?php echo file_get_contents('/var/www/etu316/temp3.txt'); ?></td>
								
							</tr>	
							
						</table>
						<div class = "td_temp" >
							<img class = "image_bottom_thermo" src="images/capteur_temp.png" alt="image_capteur">
						</div>
				
							
						
				</div>
				
					<div class="table2">
						<div class = "tx_lum">Lumière</div>
								
						<table class = "tableau" >
								<tr>
									<td class =  "td_middle_red_left"><p class = "texte_capteur">Capteur1 (lum1):</p></td>
									<td class =  "td_middle_red_barre"><div class="progressbar">
										<div class = "pop_nb" style="width:<?php echo file_get_contents('/var/www/etu316/lum1.txt'); ?>%"><?php echo file_get_contents('/var/www/etu316/lum1.txt'); ?>%</div>
									</div>
									</td>
									<td class =  "td_middle_red_left_special"rowspan ="3">
										<img class = "image_lum" src="images/lum_gif.gif" alt="image_lumiere">
									</td>
								</tr>
								<tr>
									<td class =  "td_middle_red_left"><p class = "texte_capteur"><p>Capteur2 (lum2):</p></td>
									<td class =  "td_middle_red_barre"><div class="progressbar">
										<div class = "pop_nb" style="width:<?php echo file_get_contents('/var/www/etu316/lum2.txt'); ?>%" ><?php echo file_get_contents('/var/www/etu316/lum2.txt'); ?>%</div>
									</div>
									</td>
									
								</tr>
								<tr>
									<td class =  "td_middle_red_left"><p class = "texte_capteur">Capteur3 (lum3):</p></td>
									<td class =  "td_middle_red_barre"><div class="progressbar">
										<div class = "pop_nb" style="width:<?php echo file_get_contents('/var/www/etu316/lum3.txt'); ?>%"><?php echo file_get_contents('/var/www/etu316/lum3.txt'); ?>%</div>
									</div>
									</td>
									
								</tr>
						</table>
								
						<div class = "td_lum">
								<img class = "image_bottom_capteur" src="images/capteur_lum.png" alt="image_capteur">
						</div>
						

					</div>

				

					
						
							
			</div>

			<div class = "Yncrea"><a  href="https://yncrea.fr/">@ Yncréa Ouest (29200)</a></div>


		</fieldset>
		
			<a href="https://www.isen.fr/"><img  class= "logo_isen"  src="images/logo_isen.jpg"  alt="Logo_ISEN"> </a>
		
		

		</body>
</html>

	
	