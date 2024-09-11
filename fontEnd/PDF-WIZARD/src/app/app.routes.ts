import { NgModule } from '@angular/core';
import { Routes,RouterModule } from '@angular/router';
import {DashboardComponent} from './dashboard/dashboard.component';
import {LoginComponent} from './login/login.component';
import { BookComponent } from './book/book.component';
import { UserComponent } from './user/user.component';
//import { HomePageComponent } from './home-page/home-page.component';

export const routes: Routes = [
    { path: 'login', component: LoginComponent},
    {path:"dashboard", component: DashboardComponent},
    {path:"book", component: BookComponent},
    { path: '', redirectTo: '/login', pathMatch: 'full' },
    { path:"user", component: UserComponent},
  //  {path:"home", component: HomePageComponent}
];
