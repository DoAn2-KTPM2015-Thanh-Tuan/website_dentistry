import { Component, OnInit } from '@angular/core';
import { AuthCustomerService } from '../shared/gruads/auth-customer.service';
import { InfoWebsiteService } from '../shared/services/info-website.service';
import { AccountService } from '../../dashboard/shared/services/account.service';
@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {
  // hiện thị option
  isShow: boolean = false;

  Info: any;
  isLogin: boolean;

  info_website: any;

  // data server
  name_website: String;
  link_facebook: String;
  link_youtube: String;
  email: String;
  address: String;
  phone_number: String;
  logo: String;

  // id tài khoản
  id_account: any;
  info_account: any;
  constructor(private auth: AuthCustomerService,
  private infoWebsiteService: InfoWebsiteService,
  private account: AccountService) { }

  ngOnInit() {

    //
      this.auth.authInfo$.subscribe(authInfo => {
        this.Info = authInfo;
        this.isLogin =  this.auth.authInfo$.getValue().IsLogin();
        
        
        // lấy thông tin khách hàng đăng nhập
        this.id_account = this.auth.authInfo$.getValue().$uid;
        this.account.getAccount(this.id_account)
        .then( res => { this.info_account = res[0]; } )
      });
      
      // lấy thông tin website

      this.infoWebsiteService.getInfoWebsite()
      .then( res => { res.forEach(element => {
        let name: any = element.name;

        switch(name){
          case 'name_website': 
            this.name_website = element.value;
            break;

          case 'link_facebook': 
            this.link_facebook = element.value;
            break;

          case 'link_youtube': 
            this.link_youtube = element.value;
            break;

          case 'email': 
            this.email = element.value;
            break;

          case 'address': 
            this.address = element.value;
            break;

          case 'phone_number': 
            this.phone_number = element.value;
            break;
          
          case 'link_img': 
            this.logo = element.value;
            break;
        }
         
      });
     })


      

    
  }

  // đăng xuất
  logOut() {
    this.auth.logout();
  }

}
