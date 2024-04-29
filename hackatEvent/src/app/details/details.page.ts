import { Component } from '@angular/core';
import { Router, NavigationExtras, ActivatedRoute } from '@angular/router';
import { HttpClient } from '@angular/common/http';
import { HackatServiceService } from '../hackat-service.service';

@Component({
  selector: 'app-details',
  templateUrl: 'details.page.html',
  styleUrls: ['details.page.scss']
})
export class DetailsPage {
  leHackathon:any;
  ateliers:any;
  unAtelier:any
  
  constructor(private router: Router, public hackatService : HackatServiceService, private activeRoute: ActivatedRoute) {
    //récupération du hackathon sur lequel on a cliqué sur la page précédente
    this.activeRoute.queryParams.subscribe(param=>{
      let navigation:any = this.router.getCurrentNavigation()?.extras.state;
      this.leHackathon = navigation.item;
      
      //récupération en BDD des ateliers correspondants
      this.hackatService.getAteliersByIdHackathon(this.leHackathon.id).then(results => { 
        this.ateliers=results;
      });
    })
  }

  //fonction qui redirige vers les détails d'un atelier sur lequel on a cliqué
  detailAtelier(unAtelier:any){
    let navigationExtras: NavigationExtras = {
      state : {
        item: unAtelier
      }
      };
    this.router.navigate(['/tabs/atelier'], navigationExtras)
  }

}
