import { IonicModule } from '@ionic/angular';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { HackathonsPage } from './hackathons.page';
import { ExploreContainerComponentModule } from '../explore-container/explore-container.module';

import { HackathonsPageRoutingModule } from './hackathon-routing.module';

@NgModule({
  imports: [
    IonicModule,
    CommonModule,
    FormsModule,
    ExploreContainerComponentModule,
    HackathonsPageRoutingModule
  ],
  declarations: [HackathonsPage]
})
export class HackathonsPageModule {}
