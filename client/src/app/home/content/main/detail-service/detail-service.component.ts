import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router'; 
import { ServiceService } from '../../../shared/services/service.service';

@Component({
  selector: 'app-detail-service',
  templateUrl: './detail-service.component.html',
  styleUrls: ['./detail-service.component.css']
})
export class DetailServiceComponent implements OnInit {
  id: Number;
  service: any;
  constructor(
    private route: ActivatedRoute,
    private serviceService:ServiceService) { }

  ngOnInit() {
    // lấy id trên url
    this.route.params.subscribe( (params) => {
      this.id = params.id;
    })

    // cập nhật lượt xem thêm 1
    this.serviceService.updateView(this.id)
    .then( () => {
       // lấy thông tin service
      this.serviceService.getService(this.id)
      .then( res => {this.service = res})
    })

    

    
  }

  



}
