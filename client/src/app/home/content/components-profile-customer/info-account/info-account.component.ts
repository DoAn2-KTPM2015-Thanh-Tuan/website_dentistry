import { Component, OnInit } from '@angular/core';
import { AuthCustomerService } from '../../../shared/gruads/auth-customer.service';

@Component({
  selector: 'app-info-account',
  templateUrl: './info-account.component.html',
  styleUrls: ['./info-account.component.css']
})
export class InfoAccountComponent implements OnInit {

  constructor(private auth: AuthCustomerService) { }

  ngOnInit() {
    let uid = this.auth.authInfo$.getValue().$uid;
    console.log(uid)
  }

}
