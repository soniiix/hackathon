import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HackathonsPage } from './hackathons.page';

const routes: Routes = [
  {
    path: '',
    component: HackathonsPage,
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class HackathonsPageRoutingModule {}
