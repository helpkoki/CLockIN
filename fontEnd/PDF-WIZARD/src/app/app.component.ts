import { Component, OnInit } from '@angular/core';
import { RouterOutlet } from '@angular/router';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [RouterOutlet],
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']  // Corrected here
})
export class AppComponent implements OnInit {
  title = 'PDF-WIZARD';

  constructor() {
    console.log('constructor called');
  }

  ngOnInit(): void {
    console.log('App initialized ngOnInit()');
    console.log('App initialized ngOnInit()');
    console.log('App initialized ngOnInit()');
  }
}
