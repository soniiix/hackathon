import { Component } from '@angular/core';
import { Router, NavigationExtras, ActivatedRoute } from '@angular/router';
import { HttpClient } from '@angular/common/http';
import { HackatServiceService } from '../hackat-service.service';

@Component({
  selector: 'app-commentaire',
  templateUrl: './commentaire.page.html',
  styleUrls: ['./commentaire.page.scss'],
})
export class CommentairePage {

  leAtelier:any;
  nom:any;
  email:any;
  libelle:any;
  alertButtons = ['OK'];
  

  constructor(private router: Router, public hackatService : HackatServiceService, private activeRoute: ActivatedRoute) {
    //récupération de l'atelier correspondant à la page précédente
    this.activeRoute.queryParams.subscribe(param=>{
      let navigation:any = this.router.getCurrentNavigation()?.extras.state;
      this.leAtelier = navigation.item;
    })
  }

  //fonction qui soumet le formulaire et donc le commentaire
  postCommentaire(){
    const nom = this.nom;
    const email = this.email;
    const libelle = this.libelle;
    const idAtelier = this.leAtelier.id;

    //enregistrement des données
    this.hackatService.postCommentaire(libelle, email, nom, idAtelier);
  }


}
