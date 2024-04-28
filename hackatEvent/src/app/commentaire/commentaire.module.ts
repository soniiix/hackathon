import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { CommentairePageRoutingModule } from './commentaire-routing.module';

import { CommentairePage } from './commentaire.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    CommentairePageRoutingModule
  ],
  declarations: [CommentairePage]
})
export class CommentairePageModule {}
