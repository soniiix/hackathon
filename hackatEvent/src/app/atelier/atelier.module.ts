import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { AtelierPageRoutingModule } from './atelier-routing.module';

import { AtelierPage } from './atelier.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    AtelierPageRoutingModule
  ],
  declarations: [AtelierPage]
})
export class AtelierPageModule {}
