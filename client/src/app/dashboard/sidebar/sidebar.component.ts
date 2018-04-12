import { Component, OnInit } from '@angular/core';
import { AuthCustomerService } from '../../home/shared/gruads/auth-customer.service';
@Component({
  selector: 'app-sidebar',
  templateUrl: './sidebar.component.html',
  styleUrls: ['./sidebar.component.css']
})
export class SidebarComponent implements OnInit {
  info_account: any;


  constructor(private auth: AuthCustomerService) { }

  ngOnInit() {
    this.info_account = this.auth.authInfo$.getValue();
  }

}
