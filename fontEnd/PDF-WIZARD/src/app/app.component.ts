import { Component, OnInit } from '@angular/core';
import { RouterOutlet,RouterLink ,RouterLinkActive} from '@angular/router';

import { CommonModule } from '@angular/common'
//import {RouterLink} from '@angular/router'

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [RouterOutlet  ,CommonModule , RouterLink, RouterLinkActive],
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']  // Corrected here
})
export class AppComponent implements OnInit {
  title = 'PDF-WIZARD';
     testboolean:boolean = true;
  constructor() {
    console.log('constructor called');
  }

  ngOnInit(): void {
    console.log('App initialized ngOnInit(1)');

  }
  onLogin(){
    console.log('Login button clicked');
  }
}
