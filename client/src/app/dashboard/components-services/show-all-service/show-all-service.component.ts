import { Component, OnInit } from '@angular/core';
import { NewsService } from '../../shared/services/news.service';

@Component({
  selector: 'app-show-all-service',
  templateUrl: './show-all-service.component.html',
  styleUrls: ['./show-all-service.component.css']
})
export class ShowAllServiceComponent implements OnInit {
  
  list_news;
  stt:Number = 0;
  constructor(private newsService: NewsService) { }
  
  ngOnInit() {
    
    this.newsService.get_list_newsAll()
    .then( res => this.list_news = res)

  }

}
