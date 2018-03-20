import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { DashboardComponent } from './dashboard.component';
import { AuthCustomerGuard } from '../home/shared/gruads/auth-customer.guard';
const routes: Routes = [
    {
        path: 'dashboard',
        component: DashboardComponent,
        // canActivate: [AuthCustomerGuard]
    },
    
]

@NgModule({
    imports: [
      RouterModule.forChild(routes)
    ],
    exports: [ RouterModule ]
  })

export class DashboardRoutingModule{}