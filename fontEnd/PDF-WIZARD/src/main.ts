 import { bootstrapApplication } from '@angular/platform-browser';
import { appConfig } from './app/app.config';
import { AppComponent } from './app/app.component';
import { provideRouter ,Route} from '@angular/router';
import { HttpClientModule } from '@angular/common/http';
import { routes } from './app/app.routes';

bootstrapApplication(AppComponent, 
  {
    providers:[
    provideRouter(routes),
    HttpClientModule
  ]
})
  .catch((err) => console.error(err));
