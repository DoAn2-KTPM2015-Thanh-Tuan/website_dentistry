import { Component, OnInit } from '@angular/core';
import { WorkingCalendarService } from '../../shared/services/working-calendar.service';

@Component({
  selector: 'app-update-working-calendar',
  templateUrl: './update-working-calendar.component.html',
  styleUrls: ['./update-working-calendar.component.css']
})
export class UpdateWorkingCalendarComponent implements OnInit {

  constructor(private workingCalendarService: WorkingCalendarService) { }

  ngOnInit() {
  }

  submit(form) {
    console.log(form.value);
    this.workingCalendarService.updateWorkingCalendarDoctor(form.value)
    .then( res => console.log(res) );
  }

}
