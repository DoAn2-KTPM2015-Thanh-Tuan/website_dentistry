import { Component, OnInit } from '@angular/core';
import { ServiceService } from '../../shared/services/service.service';

@Component({
  selector: 'app-show-all-service',
  templateUrl: './show-all-service.component.html',
  styleUrls: ['./show-all-service.component.css']
})
export class ShowAllServiceComponent implements OnInit {
  // trang hiện tại
  p: number = 1;

  list_service: Array<Object>;
  stt:Number = 0;
  constructor(private serviceService: ServiceService) { }

  delete(id: Number){
    // Thông báo xóa
    if(confirm("Bạn thực sự muốn xóa !!")) {
      this.serviceService.delete(id)
      .then( () => { 
        this.serviceService.get_list_serviceAll()
      .then( res => this.list_service = res)
      });
    }
  }  

  ngOnInit() {
    
    this.serviceService.get_list_serviceAll()
    .then( res => this.list_service = res)

  }

}
