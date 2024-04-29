import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class StorageServiceService {

  constructor() { }

  //Fonction pour ajouter un atelier dans le tableau d'ateliers favoris
  addToFavorites(unAtelier: any) {
    //Récupération des favoris actuels
    let lesFavoris = this.getFavorites();

    //On vérifie si l'atelier est déjà en favori
    const existeDeja = lesFavoris.some(a => a.id === unAtelier.id);

    //Si l'atelier n'existe pas déjà dans la liste des favoris, on l'ajoute
    if (!existeDeja) {
      lesFavoris.push(unAtelier);
      localStorage.setItem('ateliersFavoris', JSON.stringify(lesFavoris));
    } else {
      console.log("Cet atelier est déjà ajouté aux favoris !");
    }
  }

  //Fonction pour supprimer un atelier des favoris
  removeFromFavorites(idAtelier: number) {
    let lesFavoris = this.getFavorites();
    lesFavoris = lesFavoris.filter(atelier => atelier.id !== idAtelier);
    localStorage.setItem('ateliersFavoris', JSON.stringify(lesFavoris));
  }

  //Fonction pour récupérer le tableau d'ateliers favoris
  getFavorites(): any[] {
    const lesFavoris = localStorage.getItem('ateliersFavoris');
    return lesFavoris ? JSON.parse(lesFavoris) : [];
  }

  //Fonction pour vérifier si un atelier est en favori
  isFavorite(unAtelier: any): boolean {
    let lesFavoris = this.getFavorites();
    return lesFavoris.some(a => a.id === unAtelier.id);
  }


}
