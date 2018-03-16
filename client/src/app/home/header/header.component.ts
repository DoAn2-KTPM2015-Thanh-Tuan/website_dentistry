import { Component, OnInit } from '@angular/core';
import { AuthCustomerService } from '../shared/gruads/auth-customer.service';
@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {
  Info: any;
  isLogin: boolean;
  constructor(private auth: AuthCustomerService) { }

  ngOnInit() {
      this.auth.authInfo$.subscribe(authInfo => {
        this.Info = authInfo;
        this.isLogin =  this.auth.authInfo$.getValue().IsLogin();
        console.log(this.isLogin);
      });
      
    // this.Info = authInfo
    
  }

}
