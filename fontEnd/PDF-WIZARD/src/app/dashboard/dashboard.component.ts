import { Component } from '@angular/core';
import { RouterOutlet,RouterLink ,RouterLinkActive} from '@angular/router';
import { HttpClientModule ,HttpClient, provideHttpClient, withFetch } from '@angular/common/http';
import { CommonModule } from '@angular/common';
import { HomePageComponent } from '../home-page/home-page.component';
//import {AppComponent} from './app.component';

@Component({
  selector: 'app-dashboard',
  standalone: true,
  imports: [RouterOutlet  ,CommonModule , RouterLink, RouterLinkActive ,HttpClientModule ,HomePageComponent],
  templateUrl: './dashboard.component.html',
  styleUrl: './dashboard.component.css'
})
export class DashboardComponent {

}
