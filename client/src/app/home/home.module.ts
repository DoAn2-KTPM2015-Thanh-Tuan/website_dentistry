import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes } from '@angular/router';
import { HomeRoutingModule } from './home-routing.module';
import { SlickModule } from 'ngx-slick';
import { HttpModule } from '@angular/http';
import { FormsModule }   from '@angular/forms';

// Components
import { HomeComponent } from './home.component';
import { HeaderComponent } from './header/header.component';
import { ContentComponent } from './content/content.component';
import { FooterComponent } from './footer/footer.component';
import { SliderComponent } from './content/main/slider/slider.component';
import { NewsCategorysComponent } from './content/main/news-categorys/news-categorys.component';
import { ListDoctorsComponent } from './content/main/list-doctors/list-doctors.component';
import { ListServicesComponent } from './content/main/list-services/list-services.component';
import { SidebarComponent } from './content/sidebar/sidebar.component';
import { MainComponent } from './content/main/main.component';
import { NewsComponent } from './content/main/news-categorys/news/news.component';
import { NewsCategoryComponent } from './content/main/news-categorys/news-category/news-category.component';
import { RegisteredComponent } from './content/main/contact/registered/registered.component';
import { ContactComponent } from './content/main/contact/contact.component';
import { LoginComponent } from './content/main/login/login.component';
import { RegisterFormComponent } from './content/main/login/register-form/register-form.component';

import { SliderService } from './service/slider.service';
import { NewsCategorysService } from './service/news-categorys.service';
import { ServiceService } from './service/service.service';
import { LoginService } from './service/login.service';

import { EscapeHtmlPipe } from './pipes/keep-html.pipe';

@NgModule({
  imports: [
    CommonModule,
    HomeRoutingModule,
    SlickModule.forRoot(),
    HttpModule,
    FormsModule
  ],
  declarations: [
    HomeComponent, 
    HeaderComponent, 
    FooterComponent,
    ContentComponent,
    SliderComponent, 
    NewsCategorysComponent, 
    ListDoctorsComponent, 
    ListServicesComponent,
    SidebarComponent,
    MainComponent,
    NewsComponent,
    NewsCategoryComponent,
    RegisteredComponent,
    ContactComponent,
    LoginComponent,
    RegisterFormComponent,
    EscapeHtmlPipe
  ],
  providers: [
    SliderService,
    NewsCategorysService,
    ServiceService,
    LoginService
  ]
})
export class HomeModule { }
