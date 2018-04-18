import { Component, OnInit } from '@angular/core';
import { ServiceService } from '../../../shared/services/service.service';

@Component({
  selector: 'app-list-services-page',
  templateUrl: './list-services-page.component.html',
  styleUrls: ['./list-services-page.component.css']
})
export class ListServicesPageComponent implements OnInit {


  listsServices;
  constructor(private serviceService: ServiceService) { 
    
    // Lấy danh sách tin tức
    serviceService.getListService()
    .then(listsServices => {
      this.listsServices = listsServices;
      console.log(listsServices);
    })
  }

  ngOnInit() {
    
  }

}
