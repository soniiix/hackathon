import { Component } from '@angular/core';
import { Router, NavigationExtras, ActivatedRoute } from '@angular/router';
import { HttpClient } from '@angular/common/http';
import { HackatServiceService } from '../hackat-service.service';
import { StorageServiceService } from '../storage-service.service';

@Component({
  selector: 'app-atelier',
  templateUrl: './atelier.page.html',
  styleUrls: ['./atelier.page.scss'],
})
export class AtelierPage {

  leAtelier:any;
  lesCommentaires:any;

  constructor(
    private router: Router,
    public hackatService : HackatServiceService,
    public storageService: StorageServiceService,
    private activeRoute: ActivatedRoute)
    {
    //récupération de l'atelier sur lequel on a cliqué sur la page précédente
    this.activeRoute.queryParams.subscribe(param=>{
      let navigation:any = this.router.getCurrentNavigation()?.extras.state;
      this.leAtelier = navigation.item;

      //récupération en BDD des commentaires correspondant à cet atelier
      this.hackatService.getCommentairesByIdAtelier(this.leAtelier.id).then(results => { 
        this.lesCommentaires=results;
        console.log(this.lesCommentaires)
      });
    })
  }

  //fonction qui redirige sur la page d'inscription à l'atelier
  inscriptionClick(leAtelier:any){
    let navigationExtras: NavigationExtras = {
      state : {
        item: leAtelier
      }
      };
    this.router.navigate(['/tabs/inscription'], navigationExtras)
  }

  isFavorite(leAtelier: any): boolean {
    return this.storageService.isFavorite(leAtelier);
  }

  //fonction qui ajoute l'atelier en favoris et qui redirige vers la page qui les liste
  addToFavorites(leAtelier:any){
    this.storageService.addToFavorites(leAtelier);
  }

  //fonction qui supprime l'atelier des favoris
  removeFromFavorites(idAtelier: number){
    this.storageService.removeFromFavorites(idAtelier);
  }

  //fonction qui redirige vers le formulaire pour commenter l'atelier
  commenter(leAtelier:any){
    let navigationExtras: NavigationExtras = {
      state : {
        item: leAtelier
      }
      };
    this.router.navigate(['/tabs/commentaire'], navigationExtras)
  }


}
