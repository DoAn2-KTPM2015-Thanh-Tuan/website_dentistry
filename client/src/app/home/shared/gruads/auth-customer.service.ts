import { Injectable } from '@angular/core';
import { AuthInfo } from './auth-info';
import {Http, Response, Headers, RequestOptions} from '@angular/http';
import { AppSettings } from '../AppSettings';
import {Observable, Subject, BehaviorSubject} from "rxjs/Rx";
import 'rxjs/add/operator/toPromise';

@Injectable()
export class AuthCustomerService {

  static UNKNOWN_USER = new AuthInfo(null, null, null, null);

  authInfo$: BehaviorSubject<AuthInfo> = new BehaviorSubject<AuthInfo>(AuthCustomerService.UNKNOWN_USER);

  constructor(private http: Http) { }

  login(account: String, passwd: String){
    let headers = new Headers({'Content-Type':'application/x-www-form-urlencoded'});
    let options = new RequestOptions({ headers: headers, method: "post"});
    
    const subject = new Subject<any>();
    return this.http.post(AppSettings.API_ENDPOINT + '/home/login/login.php', {'account': account, 'passwd': passwd}, options)
    .toPromise()
    .then(res => res.json())
    .then( resJson => {
      const authInfo = new AuthInfo(resJson.id_account, resJson.name_user, resJson.image_user, resJson.type_account);
      this.authInfo$.next(authInfo);
      
      return resJson;
    })
    
  }

}
