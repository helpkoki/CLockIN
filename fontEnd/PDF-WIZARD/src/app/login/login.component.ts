import { Component } from '@angular/core';
import {CommonModule} from '@angular/common';
import { NgModule } from '@angular/core';
@Component({
  selector: 'app-login',
  standalone: true,
  imports: [CommonModule ],
  templateUrl: './login.component.html',
  styleUrl: './login.component.css'
})
export class LoginComponent {
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
