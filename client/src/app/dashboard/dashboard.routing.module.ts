import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { DashboardComponent } from './dashboard.component';
import { AuthCustomerGuard } from '../home/shared/gruads/auth-customer.guard';
import { AddNewComponent } from './components-news/add-new/add-new.component';
import { ShowAllComponent } from './components-news/show-all/show-all.component';
import { AddCategoryComponent } from './components-news/add-category/add-category.component';
import { AddNewServiceComponent } from './components-services/add-new-service/add-new-service.component';
import { ShowAllServiceComponent } from './components-services/show-all-service/show-all-service.component';
const routes: Routes = [
    {
        path: 'dashboard',
        component: DashboardComponent,
        // canActivate: [AuthCustomerGuard],
        children: [
            // news
            {
                path:'add-news',
                component: AddNewComponent
            },
            {
                path:'show-all-news',
                component: ShowAllComponent
            },
            {
                path: 'add-category-news',
                component: AddCategoryComponent
            },
            // services
            {
                path:'add-new-service',
                component: AddNewComponent
            },
            {
                path:'show-all-service',
                component: ShowAllServiceComponent
            },
            {
                path: 'add-category-service',
                component: AddNewServiceComponent
            }
        ]
    },
    
]

@NgModule({
    imports: [
      RouterModule.forChild(routes)
    ],
    exports: [ RouterModule ]
  })

export class DashboardRoutingModule{}