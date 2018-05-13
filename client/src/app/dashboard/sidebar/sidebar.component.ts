import { Component, OnInit } from '@angular/core';
import { AuthCustomerService } from '../../home/shared/gruads/auth-customer.service';
@Component({
  selector: 'app-sidebar',
  templateUrl: './sidebar.component.html',
  styleUrls: ['./sidebar.component.css']
})
export class SidebarComponent implements OnInit {

  // thông tin account người dùng đăng nhập
  id_account: any;
  name_user: any;
  image_user: any;
  type_user: any;


  constructor(private authService: AuthCustomerService) { }

  ngOnInit() {
    this.id_account = this.authService.authInfo$.getValue().$uid;
    this.name_user = this.authService.authInfo$.getValue().$name_user;
    this.image_user = this.authService.authInfo$.getValue().$image_user;
    this.type_user = this.authService.authInfo$.getValue().$type_account;
    
  }

}
