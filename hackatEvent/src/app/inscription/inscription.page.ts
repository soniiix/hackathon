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
    this.activeRoute.queryParams.subscribe(param=>{
      let navigation:any = this.router.getCurrentNavigation()?.extras.state;
      this.leAtelier = navigation.item;
    })
  }

  inscriptionSubmit(){
    const nom = this.nom;
    const prenom = this.prenom;
    const email = this.email;
    const idAtelier = this.leAtelier.id;

    //retourne bien les valeurs du formulaire
    /*
    console.log(nom);
    console.log(prenom);
    console.log(email);
    console.log(idAtelier);
    */

    //enregistrement des données
    this.hackatService.postInscriptionAtelier(nom, prenom, email, idAtelier);
  }

}
