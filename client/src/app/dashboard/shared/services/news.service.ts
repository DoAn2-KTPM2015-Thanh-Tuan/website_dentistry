import { Injectable } from '@angular/core';
import {Http, Response, Headers, RequestOptions} from '@angular/http';
import { AppSettings } from '../../../home/shared/AppSettings';
import 'rxjs/add/operator/toPromise';
@Injectable()
export class NewsService {

  constructor(private http: Http) { }
  get_list_newsAll(){
    return this.http.get(AppSettings.API_ENDPOINT + '/dashboard/news/get-list-news.php')
    .toPromise()
      .then( res => res.json() )
      .catch(err => err)
  }

  insert_news(formData){
    return this.http.post(AppSettings.API_ENDPOINT + '/dashboard/news/insert-news.php', formData)
    .toPromise()
      .then( res => res.json() )
      .catch(err => err)
  }

}
