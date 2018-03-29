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
    ShowAllServiceComponent, AddNewServiceComponent
  ],
  providers: [AuthCustomerGuard, NewsService, CategoryNewsService]
})
export class DashboardModule { }
