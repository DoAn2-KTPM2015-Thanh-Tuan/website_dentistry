import { Component, OnInit } from '@angular/core';
import { NewsService } from '../../shared/services/news.service';

@Component({
  selector: 'app-show-all',
  templateUrl: './show-all.component.html',
  styleUrls: ['./show-all.component.css']
})
export class ShowAllComponent implements OnInit {
  list_news;
  stt:Number = 0;
  constructor(private newsService: NewsService) { }
  
  ngOnInit() {
    
    this.newsService.get_list_newsAll()
    .then( res => this.list_news = res)

  }

}
