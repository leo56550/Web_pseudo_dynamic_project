// includes

#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <time.h>

#include "config.h"
#include "parsing.h"




// fonction principale
int main(void){

	
	struct s_parametres* param; // structure contenant les parametres parses envoyes par le formulaires HTML

	// creation d'une structure vide pour contenir les parametres
	param = malloc(sizeof(struct s_parametres));
	
	printf("Content-Type: text/plain \n\n");
	printf("CGI C Capteur Configuration \n\n");

	// lecture des donnees du formulaire
	parse_formulaire(param);

	// affichage des donnees du formulaire
	afficher_parametres(param);

	// traitement des donnees du formulaire
	traiter_parametres(param);

	free(param);

	return EXIT_SUCCESS;
}

void afficher_parametres(struct s_parametres* param){
	double val_aleatoire;
	val_aleatoire = generer_valeur_aleatoire(param->val_min,param->val_max);

	
	
	if (param->frm_type == FRM_GET){
		printf("Identifiant du capteur : %s\n", param->choix_capteur);
		printf("Valeur minimale possible : %f\n", param->val_min);
		printf("Valeur maximale possible : %f\n", param->val_max);
		printf("Valeure aléatoire entre val_min et val_max : %lf\n", val_aleatoire);
		printf("L'unité est le  %s\n", param->unite);
		printf("Activation : %d\n", param->on_off);
		printf("Valeur numérique du mot de passe sur 4 digits %d\n", param->password);

	}

	else if (param->frm_type == FRM_POST){
		printf("Identifiant du capteur : %s\n", param->choix_capteur);
		printf("valeur du slider de lumiere : %d\n", param->range_lum);
		printf("Code maison :  %c\n", param->code_maison);
		printf("Activation : %d\n", param->on_off);
		printf("Valeur numérique du mot de passe sur 4 digits %d\n", param->password);
	}

	else  {
		printf("Le type de formulaire n'est pas bon\n");
	}

			
}

float generer_valeur_aleatoire(float v_min, float v_max){
	srand(time(NULL));
	float scale = rand() / (float) RAND_MAX; 
    return v_min + scale * ( v_max - v_min );     
}

void traiter_parametres(struct s_parametres* param){

	if (param->password == 1234)
	{
		
		FILE* fp ;
		/*génération d'une valeur aléatoire*/
		double random_val = generer_valeur_aleatoire(param->val_min,param->val_max);
		char chemin_complet[100]; 
		const char *inactif = "INACTIF" ; 
		int taux_lum = param->range_lum;

		/*traitement pour le formulaire GET*/
		if (param->frm_type == FRM_GET)
		{	
			/*dernier élémént de la chaine choix capteur*/
			int sensor = (int)param->choix_capteur[4]-48;
			
			if (param->on_off == 1)
			{
				char chemin[] = "../temp%01d.txt";
				sprintf(chemin_complet, chemin, sensor );
				fp = fopen(chemin_complet,"w");
				if(fp ==NULL)
				{
					printf("Fichier erroné\n");
					exit(1);
				}

				fprintf(fp,"%.2f",random_val);
				fclose(fp);
			}
			else{
				char chemin[] = "../temp%01d.txt";
				sprintf(chemin_complet, chemin, sensor );
				fp = fopen(chemin_complet,"w");
				fprintf(fp,"%s",inactif);
				fclose(fp);
			}
		}
		/*traitement pour le formulaire POST*/
		else if (param->frm_type == FRM_POST)
		{
			int sensor = (int)param->choix_capteur[3]-48;
			if (param->on_off == 1)
			{
				char chemin[] = "../lum%01d.txt";
				sprintf(chemin_complet, chemin, sensor );
				fp = fopen(chemin_complet,"w");
				fprintf(fp,"%d",taux_lum);
				fclose(fp);
				
				
			}
			else{
				char chemin[] = "../lum%01d.txt";
				sprintf(chemin_complet,chemin,sensor);
				fp = fopen(chemin_complet,"w");
				fprintf(fp,"%s",inactif);
				fclose(fp);
			}	
		}
	}

	else{

		printf("Erreur de mot de passe\n");
	}
	
}
