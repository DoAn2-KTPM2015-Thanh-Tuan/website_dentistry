import { Component, OnInit } from '@angular/core';
import { AuthCustomerService } from '../../../shared/gruads/auth-customer.service';
import { Router } from '@angular/router';
import 'rxjs/add/operator/toPromise';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  list;
  isSuccess: boolean;
  constructor(
    private auth: AuthCustomerService,
    private router: Router
  ) { }
  ngOnInit() {
    
  }
  onSubmit(formLogin){
    let account = formLogin.value.account;
    let password = formLogin.value.password;
    this.auth.login(account, password)
    .then(res => {
      if(res == false) {
        console.log('thất bại');
        this.isSuccess = true;
      } else {
        if(this.auth.authInfo$.getValue().$type_account == 4){
          this.router.navigate(['/profile-customer']);
        } 
      }
    })
  }


}
