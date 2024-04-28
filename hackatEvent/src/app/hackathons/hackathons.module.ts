import { IonicModule } from '@ionic/angular';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { HackathonsPage } from './hackathons.page';

import { HackathonsPageRoutingModule } from './hackathon-routing.module';

@NgModule({
  imports: [
    IonicModule,
    CommonModule,
    FormsModule,
    HackathonsPageRoutingModule
  ],
  declarations: [HackathonsPage]
})
export class HackathonsPageModule {}
