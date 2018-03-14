import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { NewsCategorysService } from '../../../../service/news-categorys.service';
import { EscapeHtmlPipe } from '../../../../pipes/keep-html.pipe';

@Component({
  selector: 'app-news',
  templateUrl: './news.component.html',
  styleUrls: ['./news.component.css']
})
export class NewsComponent implements OnInit {
  id: Number;
  news;
  title: String;
  constructor(private route: ActivatedRoute, private newsCategoryService: NewsCategorysService) { 
    // lấy tham số id
    route.params.subscribe( params => {
      this.id = params.id;
      console.log(params.id)
    });
    // Lấy danh sách tin tức
    newsCategoryService.getNews(this.id)
    .then(news => {
      this.news = news;
      console.log(news);
    })
  }

  ngOnInit() {
  }

}