import { Component } from '@angular/core';
import {CommonModule} from '@angular/common';
//import { NgModule } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  standalone: true,
  imports: [CommonModule ],
  templateUrl: './login.component.html',
  styleUrl: './login.component.css'
})
export class LoginComponent {
  constructor(private router: Router) {}

  goToOtherPage() {
    this.router.navigate(['/other']); // Navigate to the other page
  }
  testboolean:Boolean =false;
    userSignup:any [] =[];
    signupObj:any ={
       userName:'',
       email:'',
       password:''
    };
    loginObj:any ={
      userName:'',
      password:''
    }; 
}
