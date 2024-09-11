import { Component } from '@angular/core';
import { RouterOutlet,RouterLink ,RouterLinkActive} from '@angular/router';
import { HttpClientModule ,HttpClient, provideHttpClient, withFetch } from '@angular/common/http';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-home-page',
  standalone: true,
  imports: [RouterOutlet  ,CommonModule , RouterLink, RouterLinkActive ,HttpClientModule],
  templateUrl: './home-page.component.html',
  styleUrl: './home-page.component.css'
})
export class HomePageComponent {

}
