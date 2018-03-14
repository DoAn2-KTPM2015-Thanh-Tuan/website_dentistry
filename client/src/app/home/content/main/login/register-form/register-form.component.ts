import { Component, OnInit } from '@angular/core';
import { LoginService } from '../../../../service/login.service';

@Component({
  selector: 'app-register-form',
  templateUrl: './register-form.component.html',
  styleUrls: ['./register-form.component.css']
})
export class RegisterFormComponent implements OnInit {
  existedAccount: boolean = false;
  alertSuccess: boolean = false;
  constructor(private loginService: LoginService) { }

  ngOnInit() {
  }
  onSubmit(formRegister){
    if(formRegister.valid){
      this.loginService.sendFormRegister(formRegister.value)
      .then(
        resText => {
          if(resText == 'existed account') {
            this.existedAccount = true;
          } else {
            this.alertSuccess = true;
            formRegister.resetForm();
          }
        }
      )
      // end then
    }
  }

}
