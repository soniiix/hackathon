import { Component } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { HackatServiceService } from '../hackat-service.service';
import { StorageServiceService } from '../storage-service.service';
import { Router, NavigationExtras } from '@angular/router';

@Component({
  selector: 'app-favoris',
  templateUrl: './favoris.page.html',
  styleUrls: ['./favoris.page.scss'],
})
export class FavorisPage {

  lesFavoris: any[];
  
  constructor(
    public http : HttpClient,
    public hackatService : HackatServiceService,
    public storageService: StorageServiceService,
    private router:Router)
  {
    this.lesFavoris = this.storageService.getFavorites();
    console.log(this.lesFavoris);
  }
  
  ionViewWillEnter() {
    //actualisation de la liste quand on clique sur l'onglet favoris
    this.lesFavoris = this.storageService.getFavorites();
  }

  //fonction qui redirige vers les détails d'un atelier favori sur lequel on a cliqué
  detailAtelier(unAtelier:any){
    let navigationExtras: NavigationExtras = {
      state : {
        item: unAtelier
      }
      };
    this.router.navigate(['/tabs/atelier'], navigationExtras)
  }


}
