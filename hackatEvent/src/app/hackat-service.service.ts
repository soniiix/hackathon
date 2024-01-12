import { Injectable } from '@angular/core';
import { HttpClient } from "@angular/common/http";

@Injectable({
  providedIn: 'root'
})
export class HackatServiceService {


  private hackathons:any;
  private ateliers:any;
  private inscriptionAtelier:any;

  constructor(private http : HttpClient) {
  }

  getHackathons(){
    return new Promise((resolve) => {
      var url = "http://192.168.51.98:3003/hackathons";
      this.http.get(url).subscribe((data) => {
        resolve(data);
      });
    }) 
  }

  getAteliersByIdHackathon(idHackathon:any){
    return new Promise((resolve) => {
      var url = "http://192.168.51.98:3003/ateliers/"+ idHackathon;
      this.http.get(url).subscribe((data) => {
        resolve(data);
      });
    }) 
  }

  getInscriptionAtelier(){
    return new Promise((resolve) => {
      var url = "http://192.168.51.98:3003/inscription-atelier";
      this.http.get(url).subscribe((data) => {
        resolve(data);
      });
    }) 
  }
}
