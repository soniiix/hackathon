import { Component } from '@angular/core';
import { Router, NavigationExtras, ActivatedRoute } from '@angular/router';
import { HttpClient } from '@angular/common/http';
import { HackatServiceService } from '../hackat-service.service';

@Component({
  selector: 'app-tab2',
  templateUrl: 'tab2.page.html',
  styleUrls: ['tab2.page.scss']
})
export class Tab2Page {
  leHackathon:any;
  ateliers:any;
  unAtelier:any
  
  constructor(private router: Router, public hackatService : HackatServiceService, private activeRoute: ActivatedRoute) {
    this.activeRoute.queryParams.subscribe(param=>{
      let navigation:any = this.router.getCurrentNavigation()?.extras.state;
      this.leHackathon = navigation.item;
      
      this.hackatService.getAteliersByIdHackathon(this.leHackathon.id).then(results => { 
        this.ateliers=results;
      });
    })
  }

  inscriptionClick(unAtelier:any){
    let navigationExtras: NavigationExtras = {
      state : {
        item: unAtelier
      }
      };
    this.router.navigate(['/tabs/inscription'], navigationExtras)
  }

}
