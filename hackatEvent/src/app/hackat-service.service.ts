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
      var url = "http://192.168.51.98:3000/hackathons";
      this.http.get(url).subscribe((data) => {
        resolve(data);
      });
    }) 
  }

  getAteliersByIdHackathon(idHackathon:any){
    return new Promise((resolve) => {
      var url = "http://192.168.51.98:3000/ateliers/"+ idHackathon;
      this.http.get(url).subscribe((data) => {
        resolve(data);
      });
    }) 
  }

  postInscriptionAtelier(nom:string, prenom:string, email:string, idAtelier:number){
    return new Promise((resolve) => {
      var url = "http://192.168.51.98:3000/inscription-atelier";
      const body = { nom, prenom, email, idAtelier };
      this.http.post(url, body).subscribe((data) => {
        resolve(data);
      });
    })
  }

  getCommentairesByIdAtelier(idAtelier:any){
    return new Promise((resolve) => {
      var url = "http://192.168.51.98:3000/commentaires/atelier/"+ idAtelier;
      this.http.get(url).subscribe((data) => {
        resolve(data);
      });
    })
  }

  postCommentaire(libelle:string, email:string, nom:string, idAtelier:number){
    return new Promise((resolve) => {
      var url = "http://192.168.51.98:3000/commentaire/post";
      const body = { libelle, email, nom, idAtelier };
      this.http.post(url, body).subscribe((data) => {
        resolve(data);
      });
    })
  }

}