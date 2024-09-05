import { NgModule } from '@angular/core';
import { Routes,RouterModule } from '@angular/router';
import {DashboardComponent} from './dashboard/dashboard.component';
import {LoginComponent} from './login/login.component';
import { BookComponent } from './book/book.component';

export const routes: Routes = [
    { path: 'login', component: LoginComponent},
    {path:"dashboard", component: DashboardComponent},
    {path:"book", component: BookComponent}
];
@NgModule({
    imports: [RouterModule.forRoot(routes)],
    exports: [RouterModule]
  })
  export class AppRoutingModule { }