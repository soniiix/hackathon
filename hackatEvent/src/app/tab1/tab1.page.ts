import { Component } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { HackatServiceService } from '../hackat-service.service';
import { Router, NavigationExtras } from '@angular/router';

@Component({
  selector: 'app-tab1',
  templateUrl: 'tab1.page.html',
  styleUrls: ['tab1.page.scss']
})
export class Tab1Page {
  
  hackathons:any;
  unHackathon:any;

  constructor(
    public http : HttpClient,
    public hackatService : HackatServiceService,
    private router:Router) {
      this.hackatService.getHackathons().then(results => { 
        this.hackathons = results;
        console.log(this.hackathons)
      });
    }


  detailHackathonClick(unHackathon:any){
    let navigationExtras: NavigationExtras = {
      state : {
        item: unHackathon
      }
      };
    this.router.navigate(['/tabs/tab2'], navigationExtras)
  }

}
