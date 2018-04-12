import { Component, OnInit } from '@angular/core';
import { NewsService } from '../../shared/services/news.service';
import { OrderPipe } from 'ngx-order-pipe';


@Component({
  selector: 'app-show-all',
  templateUrl: './show-all.component.html',
  styleUrls: ['./show-all.component.css']
})
export class ShowAllComponent implements OnInit {
  // trang hiện tại
  p: number = 1;


  list_news;
  stt:Number = 0;

  //sorting
  key: string = 'status'; //set default
  reverse: boolean = false;
  sort(key){
    this.key = key;
    this.reverse = !this.reverse;
  }

  constructor(private newsService: NewsService, private orderPipe: OrderPipe) { }
  
  ngOnInit() { 
    this.newsService.get_list_newsAll()
    .then( res => this.list_news = res)
  }
  delete(id: Number){
    // Thông báo xóa
    if(confirm("Bạn thực sự muốn xóa !!")) {
      this.newsService.delete(id)
      .then( () => { 
        this.newsService.get_list_newsAll()
      .then( res => this.list_news = res)
      });
    }
  }

}
