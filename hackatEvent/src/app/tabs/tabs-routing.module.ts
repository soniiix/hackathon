import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { TabsPage } from './tabs.page';

const routes: Routes = [
  {
    path: 'tabs',
    component: TabsPage,
    children: [
      {
        path: 'hackathons',
        loadChildren: () => import('../hackatons/hackathons.module').then(m => m.HackathonsPageModule)
      },
      {
        path: 'details',
        loadChildren: () => import('../details/details.module').then(m => m.DetailsPageModule)
      },
      {
        path: 'inscription',
        loadChildren: () => import('../inscription/inscription.module').then(m => m.InscriptionPageModule)
      },
      {
        path: '',
        redirectTo: '/tabs/hackathons',
        pathMatch: 'full'
      }
    ]
  },
  {
    path: '',
    redirectTo: '/tabs/hackathons',
    pathMatch: 'full'
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
})
export class TabsPageRoutingModule {}
