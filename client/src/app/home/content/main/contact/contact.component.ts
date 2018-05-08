import { Component, OnInit } from '@angular/core';
import { ViewChild } from '@angular/core';
import { } from '@types/googlemaps';
import { ContactService } from '../../../shared/services/contact.service';
@Component({
  selector: 'app-contact',
  templateUrl: './contact.component.html',
  styleUrls: ['./contact.component.css']
})
export class ContactComponent implements OnInit {
  
  // thông báo khi gửi thành công
  alertSuccess: boolean = false;

  constructor(private contactService: ContactService) {}
  @ViewChild('gmap') gmapElement: any;
  map: google.maps.Map;

  latitude:number;
  longitude:number;

  ngOnInit() {
    const myLatlng = new google.maps.LatLng(10.0465737,105.7679048);
    var mapProp = {
      center: myLatlng,
      zoom: 16,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
    };
    this.map = new google.maps.Map(this.gmapElement.nativeElement, mapProp);

    const Marker = new google.maps.Marker({
      position: myLatlng,
      title: '3T Shop'
    });
    Marker.setMap(this.map);

  }

  setMapType(mapTypeId: string) {
    this.map.setMapTypeId(mapTypeId)    
  }

  setCenter(e:any){
    e.preventDefault();
    this.map.setCenter(new google.maps.LatLng(this.latitude, this.longitude));
  }



  // Gửi liên hệ
  onSubmit(formData) {
    
    if(formData.valid){

      this.contactService.sendFormContact(formData.value)
      .then( (res) => {
        this.alertSuccess = true;
        formData.resetForm();
      })
    }
  }

}

