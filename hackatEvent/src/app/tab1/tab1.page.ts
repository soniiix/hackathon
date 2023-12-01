import { Component } from '@angular/core';
import { Router, NavigationExtras } from '@angular/router';

@Component({
  selector: 'app-tab1',
  templateUrl: 'tab1.page.html',
  styleUrls: ['tab1.page.scss']
})
export class Tab1Page {
  hackathons = 
  [
    {"id":"1","nbPlacesMax":"50","dateLimiteInscription":"2023-11-30 00:00:00","titre":"ByteBurst Challenge: Explosez les octets, créez le futur","ville":"Marseille","codePostal":"13000","rue":"3 Impasse Fedeli","dateDebut":"2023-12-01","dateFin":"2023-12-03","heureDebut":"09:00:00","heureFin":"17:00:00"},
    {"id":"2","nbPlacesMax":"30","dateLimiteInscription":"2023-11-25 00:00:00","titre":"InnoHacks: Révolutionnez l'innovation","ville":"Paris","codePostal":"75002","rue":"18 Passage du Grand-Cerf","dateDebut":"2023-12-05","dateFin":"2023-12-07","heureDebut":"10:00:00","heureFin":"18:00:00"},
    {"id":"3","nbPlacesMax":"40","dateLimiteInscription":"2023-12-10 00:00:00","titre":"FutureFusion: Fusionnez les idées, forgez le futur du tech","ville":"Reims","codePostal":"51454","rue":"4 Rue Aimee Wilbert","dateDebut":"2023-12-15","dateFin":"2023-12-17","heureDebut":"11:00:00","heureFin":"19:00:00"},
    {"id":"4","nbPlacesMax":"20","dateLimiteInscription":"2023-12-05 00:00:00","titre":"CodeXplosion: Développez l'avenir du code","ville":"Le Mans","codePostal":"72000","rue":"42 Rue du 11 Novembre","dateDebut":"2023-12-08","dateFin":"2023-12-10","heureDebut":"13:00:00","heureFin":"21:00:00"},
    {"id":"5","nbPlacesMax":"60","dateLimiteInscription":"2023-12-20 00:00:00","titre":"QuantumQuest: Explorez les frontières de la programmation quantique","ville":"Lyon","codePostal":"69000","rue":"75 Rue Louis Dansard","dateDebut":"2023-12-25","dateFin":"2023-12-27","heureDebut":"14:00:00","heureFin":"22:00:00"},
    {"id":"6","nbPlacesMax":"25","dateLimiteInscription":"2023-12-15 00:00:00","titre":"CyberForge: Forgez la sécurité numérique de demain","ville":"Les Sables d'Olonne","codePostal":"85100","rue":"69 Rue de l'Enfer","dateDebut":"2023-12-18","dateFin":"2023-12-20","heureDebut":"15:00:00","heureFin":"23:00:00"},
    {"id":"7","nbPlacesMax":"35","dateLimiteInscription":"2023-12-01 00:00:00","titre":"DataDive: Plongez dans le monde des données","ville":"La Roche surYon","codePostal":"85000","rue":"19 Boulevard Branly","dateDebut":"2023-12-05","dateFin":"2023-12-07","heureDebut":"16:00:00","heureFin":"00:00:00"},
    {"id":"8","nbPlacesMax":"45","dateLimiteInscription":"2023-12-08 00:00:00","titre":"CodeCrafters Challenge: Sculptez votre code, modelez l'avenir","ville":"Angers","codePostal":"49000","rue":"23 Rue Robert Bryan","dateDebut":"2023-12-10","dateFin":"2023-12-12","heureDebut":"17:00:00","heureFin":"01:00:00"},
    {"id":"9","nbPlacesMax":"55","dateLimiteInscription":"2023-12-18 00:00:00","titre":"TechTitans Hack: Affrontez les titans de la technologie","ville":"Nantes","codePostal":"44000","rue":"10 Allée Gutenberg","dateDebut":"2023-12-22","dateFin":"2023-12-24","heureDebut":"18:00:00","heureFin":"02:00:00"},
    {"id":"10","nbPlacesMax":"15","dateLimiteInscription":"2023-12-12 00:00:00","titre":"RoboRush: Construisez des bots, dominez l'arène","ville":"Bordeaux","codePostal":"42086","rue":"86 Passage Patrick Henriette","dateDebut":"2023-12-15","dateFin":"2023-12-17","heureDebut":"19:00:00","heureFin":"03:00:00"}
  ];

  constructor(private router:Router) {}


  detailHackathonClick(){
    console.log("ici");
    this.router.navigate(['/tabs/tab2'])
  }

}
