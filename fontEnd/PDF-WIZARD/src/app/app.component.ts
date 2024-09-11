import { Component, OnInit } from '@angular/core';
import { RouterOutlet,RouterLink ,RouterLinkActive} from '@angular/router';
import { HttpClientModule ,HttpClient, provideHttpClient, withFetch } from '@angular/common/http';
import { CommonModule } from '@angular/common'


@Component({
  selector: 'app-root',
  standalone: true,
  imports: [RouterOutlet  ,CommonModule , RouterLink, RouterLinkActive ,HttpClientModule],
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
  

  }
  
}
