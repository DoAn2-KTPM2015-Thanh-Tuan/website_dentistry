import { Injectable } from '@angular/core';
import { AppSettings } from '../../../home/shared/AppSettings';
import {Http, Response, Headers, RequestOptions} from '@angular/http';
import { stringify } from 'querystring';

@Injectable()
export class RegistrationService {

  constructor(private http: Http) { }

  // lấy tất cả danh sách đăng kí khám
  getListRegisraion(){
    return this.http.get(AppSettings.API_ENDPOINT + '/dashboard/registration/get-list-registration.php')
    .toPromise()
    .then(res => res.json())
  }

  // xóa đăng kí khám theo id
  deleteRegistration(id: any){
    return this.http.get(AppSettings.API_ENDPOINT + '/dashboard/registration/detele-registration.php?id=' + id)
    .toPromise()
    .then(res => res.json())
  }

  // lấy đăng kí khám theo id
  getRegisraion(id: any){
    return this.http.get(AppSettings.API_ENDPOINT + '/dashboard/registration/get-registration.php?id=' + id)
    .toPromise()
    .then(res => res.json())
  }

  // lấy đăng kí khám theo id
  updateRegisraion( formData ) {
    return this.http.post(AppSettings.API_ENDPOINT + '/dashboard/registration/update-registration.php?', formData)
    .toPromise()
    .then(res => res.json())
  }


}
