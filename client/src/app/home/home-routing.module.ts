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
import { RegisterFormComponent } from './content/main/login/register-form/register-form.component';

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
          {
            path: 'login',
            children: [
              {
                path: '',
                component:  LoginComponent,
              },
              {
                path: 'register',
                component:  RegisterFormComponent,
              }
            ]
          },
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
