import { Component } from '@angular/core';
import { Router, NavigationExtras, ActivatedRoute } from '@angular/router';
import { HttpClient } from '@angular/common/http';
import { HackatServiceService } from '../hackat-service.service';

@Component({
  selector: 'app-inscription',
  templateUrl: './inscription.page.html',
  styleUrls: ['./inscription.page.scss'],
})
export class InscriptionPage {

  leAtelier:any;
  nom:any = "";
  prenom:any = "";
  email:any = "";
  alertButtons = ['OK'];
  
  constructor(private router: Router, public hackatService : HackatServiceService, private activeRoute: ActivatedRoute) {
    //récupération de l'atelier sur lequel on a cliqué sur la page précédente
    this.activeRoute.queryParams.subscribe(param=>{
      let navigation:any = this.router.getCurrentNavigation()?.extras.state;
      this.leAtelier = navigation.item;
    })
  }

  //fonction qui soumet le formulaire d'inscription
  inscriptionSubmit(){
    const nom = this.nom;
    const prenom = this.prenom;
    const email = this.email;
    const idAtelier = this.leAtelier.id;

    //enregistrement des données
    this.hackatService.postInscriptionAtelier(nom, prenom, email, idAtelier);
  }

}
