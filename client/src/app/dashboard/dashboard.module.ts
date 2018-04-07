import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes } from '@angular/router';
import { FroalaEditorModule, FroalaViewModule } from 'angular-froala-wysiwyg';
import { FormsModule } from '@angular/forms';

import { AuthCustomerGuard } from '../home/shared/gruads/auth-customer.guard';

import { ArraySortPipe } from './shared/pipes/sort.pipe';
import { SearchCategoryNewsPipe } from './shared/pipes/searchCategoryNews.pipe';

import { DashboardComponent } from './dashboard.component';
import { DashboardRoutingModule } from './dashboard.routing.module';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

import { HeaderComponent } from './header/header.component';
import { SidebarComponent } from './sidebar/sidebar.component';
import { AddNewComponent } from './components-news/add-new/add-new.component';
import { ShowAllComponent } from './components-news/show-all/show-all.component';
import { AddCategoryComponent } from './components-news/add-category/add-category.component';
import { NewsService } from './shared/services/news.service';
import { CategoryNewsService } from './shared/services/category-news.service';
import { ShowAllServiceComponent } from './components-services/show-all-service/show-all-service.component';
import { AddNewServiceComponent } from './components-services/add-new-service/add-new-service.component';
import { ServiceService } from './shared/services/service.service';
import { SearchNewsPipe } from './shared/pipes/search-news.pipe';
import { EditNewsComponent } from './components-news/edit-news/edit-news.component';
import { EditServiceComponent } from './components-services/edit-service/edit-service.component';
import { SearchServicePipe } from './shared/pipes/search-service.pipe';
import { ShowAllUserComponent } from './components-account/show-all-user/show-all-user.component';
import { AccountService } from './shared/services/account.service';
import { RegisterUserComponent } from './components-account/register-user/register-user.component';
import { AllInfoWebsiteComponent } from './components-info-website/all-info-website/all-info-website.component';
import { IntroduceWebsiteComponent } from './components-info-website/introduce-website/introduce-website.component';
import { InfoWebsiteService } from './shared/services/info-website.service';
import { SliderComponent } from './components-image/slider/slider.component';
import { AdvertisementComponent } from './components-image/advertisement/advertisement.component';
import { ImageAdvertisementService } from './shared/services/image-advertisement.service';


@NgModule({
  imports: [
    CommonModule,
    DashboardRoutingModule,
    FroalaEditorModule.forRoot(), 
    FroalaViewModule.forRoot(),
    BrowserAnimationsModule,
    FormsModule
  ],
  declarations: [
    SearchCategoryNewsPipe, 
    ArraySortPipe,
    DashboardComponent, 
    HeaderComponent, 
    SidebarComponent, 
    AddNewComponent, 
    ShowAllComponent, 
    AddCategoryComponent, 
    ShowAllServiceComponent, 
    AddNewServiceComponent,
    SearchNewsPipe,
    EditNewsComponent,
    EditServiceComponent,
    SearchServicePipe,
    ShowAllUserComponent,
    RegisterUserComponent,
    AllInfoWebsiteComponent,
    IntroduceWebsiteComponent,
    SliderComponent,
    AdvertisementComponent
  ],
  providers: [AuthCustomerGuard, NewsService, CategoryNewsService, ServiceService, AccountService, InfoWebsiteService, ImageAdvertisementService]
})
export class DashboardModule { }
