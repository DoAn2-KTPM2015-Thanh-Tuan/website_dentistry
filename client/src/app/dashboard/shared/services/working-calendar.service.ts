import { Injectable } from '@angular/core';
import { AppSettings } from '../../../home/shared/AppSettings';
import {Http, Response, Headers, RequestOptions} from '@angular/http';
import { stringify } from 'querystring';

@Injectable()
export class WorkingCalendarService {

  constructor(private http: Http) { }

  updateWorkingCalendarDoctor(formData) {

    let headers = new Headers({'Content-Type':'application/x-www-form-urlencoded'});
    let options = new RequestOptions({ headers: headers, method: "post"});

    return this.http.post(AppSettings.API_ENDPOINT + '/dashboard/working-calendar/update-working-calendar-doctor.php', formData, options)
    .toPromise()
    .then(res => res.text())
  }

}
