import { Component, OnInit } from '@angular/core';


@Component({
  selector: 'app-register-user',
  templateUrl: './register-user.component.html',
  styleUrls: ['./register-user.component.css']
})
export class RegisterUserComponent implements OnInit {
  existedAccount: boolean = false;
  alertSuccess: boolean = false;
  constructor() { }

  ngOnInit() {
  }
  onSubmit(formRegister){
    // if(formRegister.valid){
    //   this.registerUserService.sendFormRegister(formRegister.value)
    //   .then(
    //     resText => {
    //       if(resText == 'existed account') {
    //         this.existedAccount = true;
    //       } else {
    //         this.alertSuccess = true;
    //         formRegister.resetForm();
    //       }
    //     }
    //   )
    //   // end then
    // }
  }

}
