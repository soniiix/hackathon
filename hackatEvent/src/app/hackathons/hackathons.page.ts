import { Component } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { HackatServiceService } from '../hackat-service.service';
import { Router, NavigationExtras } from '@angular/router';

@Component({
  selector: 'app-hackathons',
  templateUrl: 'hackathons.page.html',
  styleUrls: ['hackathons.page.scss']
})
export class HackathonsPage {
  
  hackathons:any;
  unHackathon:any;

  constructor(public http : HttpClient, public hackatService : HackatServiceService, private router:Router)
  {
    //récupération des hackathons de la BDD
    this.hackatService.getHackathons().then(results => { 
      this.hackathons = results;
    });
  }

  //fonction qui redirige vers les détails d'un hackathon après avoir cliqué dessus
  detailHackathonClick(unHackathon:any){
    let navigationExtras: NavigationExtras = {
      state : {
        item: unHackathon
      }
      };
    this.router.navigate(['/tabs/details'], navigationExtras)
  }

}
