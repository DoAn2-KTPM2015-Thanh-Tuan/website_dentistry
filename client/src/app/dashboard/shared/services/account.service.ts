import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import { AppSettings } from '../../../home/shared/AppSettings';
@Injectable()
export class AccountService {

  constructor(private http: Http) { }
  getAllUser(){
    return this.http.get(AppSettings.API_ENDPOINT + '/dashboard/account/get-list-account.php')
    .toPromise()
    .then(res => res.json())
  }
}
