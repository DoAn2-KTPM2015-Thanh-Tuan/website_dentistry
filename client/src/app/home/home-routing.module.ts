import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { HomeComponent } from './home.component';
import { HeaderComponent } from './header/header.component';
import { ContentComponent } from './content/content.component';
import { MainComponent } from './content/main/main.component';
import { SliderComponent } from './content/main/slider/slider.component';
import { NewsCategorysComponent } from './content/main/news-categorys/news-categorys.component';
import { ListDoctorsComponent } from './content/main/list-doctors/list-doctors.component';
import { ListServicesComponent } from './content/main/list-services/list-services.component';
import { NewsComponent } from './content/main/news-categorys/news/news.component';
import { NewsCategoryComponent } from './content/main/news-categorys/news-category/news-category.component';
import { RegisteredComponent } from './content/main/contact/registered/registered.component';
import { ContactComponent } from './content/main/contact/contact.component';
import { LoginComponent } from './content/main/login/login.component';
import { RegisterUserComponent } from './content/main/register-user/register-user.component';
import { ProfileCustomerComponent } from './content/profile-customer/profile-customer.component';
import { InfoAccountComponent } from './content/components-profile-customer/info-account/info-account.component';
import { HistoryComponent } from './content/components-profile-customer/history/history.component';
import { ProfileDoctorComponent } from './profile-doctor/profile-doctor.component';
import { InfoAccountDoctorComponent } from './components-profile-doctor/info-account-doctor/info-account-doctor.component';
import { AuthCustomerGuard } from '../home/shared/gruads/auth-customer.guard';

const routes: Routes = [
  {
    path: '',
    component: HomeComponent,
    children: [
      {
        path: '',
        component: ContentComponent,
        children: [
          {
            path: '',
            component: MainComponent,    
          },
          {
            path: '',
            component: SliderComponent,
            outlet: 'slider'  
          },
          {
            path: 'news-categorys',
            component: NewsCategorysComponent,
          },
          {
            path: 'news-categorys/:id',
            component: NewsCategoryComponent,
          },
          {
            path: 'news-categorys/:id-category/:id',
            component: NewsComponent,
          },
          {
            path: 'contact',
            children: [
              {
                path: '',
                component:  ContactComponent,
              },
              {
                path: 'registered',
                component:  RegisteredComponent,
              }
            ]
          },
          // Đăng nhập
          {
            path: 'login',
            component:  LoginComponent
          },
          // Đăng kí User
          {
            path: 'register',
            component:  RegisterUserComponent
          },
          // Profile Customer
          {
            path: 'profile-customer',
            component: ProfileCustomerComponent,
            canActivate: [AuthCustomerGuard],
            children: [
              {
                path: '',
                redirectTo: 'history',
                pathMatch: 'full'
              },
              {
                path: 'info-account',
                component: InfoAccountComponent
              },
              {
                path: 'history',
                component: HistoryComponent
              },
              {
                path: 'registered',
                component: RegisteredComponent
              },
            ]
          }
        ]
      },
      // profile doctor
      {
        path: 'profile-doctor',
        component: ProfileDoctorComponent,
        children: [
          {
            path: '',
            redirectTo: 'info-account',
            pathMatch: 'full'
          },
          {
            path: 'info-account',
            component: InfoAccountDoctorComponent
          }
        ]
      }
    ]
  }
];

@NgModule({
  imports: [
    RouterModule.forChild(routes)
  ],
  exports: [ RouterModule ]
})
export class HomeRoutingModule { }
