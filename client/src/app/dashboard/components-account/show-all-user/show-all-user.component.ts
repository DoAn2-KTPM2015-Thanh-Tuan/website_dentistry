import { Component, OnInit } from '@angular/core';
import { AccountService } from '../../shared/services/account.service';


@Component({
  selector: 'app-show-all-user',
  templateUrl: './show-all-user.component.html',
  styleUrls: ['./show-all-user.component.css']
})
export class ShowAllUserComponent implements OnInit {

  list_user;
  stt:Number = 0;
  constructor(private accountService: AccountService) { }
  
  ngOnInit() { 
    this.accountService.getAllUser()
    .then( res => this.list_user = res)
  }
  // delete(id: Number){
  //   // Thông báo xóa
  //   if(confirm("Bạn thực sự muốn xóa !!")) {
  //     this.newsService.delete(id)
  //     .then( () => { 
  //       this.newsService.get_list_newsAll()
  //     .then( res => this.list_news = res)
  //     });
  //   }
  // }

}
