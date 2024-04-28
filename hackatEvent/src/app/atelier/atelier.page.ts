import { Component } from '@angular/core';
import { Router, NavigationExtras, ActivatedRoute } from '@angular/router';
import { HttpClient } from '@angular/common/http';
import { HackatServiceService } from '../hackat-service.service';

@Component({
  selector: 'app-atelier',
  templateUrl: './atelier.page.html',
  styleUrls: ['./atelier.page.scss'],
})
export class AtelierPage {

  leAtelier:any;
  lesCommentaires:any;

  constructor(private router: Router, public hackatService : HackatServiceService, private activeRoute: ActivatedRoute) {
    this.activeRoute.queryParams.subscribe(param=>{
      let navigation:any = this.router.getCurrentNavigation()?.extras.state;
      this.leAtelier = navigation.item;

      this.hackatService.getCommentairesByIdAtelier(this.leAtelier.id).then(results => { 
        this.lesCommentaires=results;
      });
    })
  }


  inscriptionClick(leAtelier:any){
    let navigationExtras: NavigationExtras = {
      state : {
        item: leAtelier
      }
      };
    this.router.navigate(['/tabs/inscription'], navigationExtras)
  }

  addToFavorites(leAtelier:any){
    //...
  }

  commenter(leAtelier:any){
    let navigationExtras: NavigationExtras = {
      state : {
        item: leAtelier
      }
      };
    this.router.navigate(['/tabs/commentaire'], navigationExtras)
  }


}
