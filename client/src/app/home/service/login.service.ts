import { Injectable } from '@angular/core';
// import { Http } from '@angular/http';
import { AppSettings } from './AppSettings';
import {Http, Response, Headers, RequestOptions} from '@angular/http';
import { stringify } from 'querystring';
@Injectable()
export class LoginService {

  constructor(private http: Http) { }

  sendFormRegister(formData) {
    let headers = new Headers({'Content-Type':'application/x-www-form-urlencoded'});
    let options = new RequestOptions({ headers: headers, method: "post"});

    return this.http.post(AppSettings.API_ENDPOINT + '/home/login/register.php', formData, options)
    .toPromise()
    .then(res => res.text())
  }
}
