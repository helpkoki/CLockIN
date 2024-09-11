import { Component } from '@angular/core';
import {CommonModule} from '@angular/common';
//import { NgModule } from '@angular/core';
import { Router } from '@angular/router';
import {FormsModule}  from '@angular/forms';

@Component({
  selector: 'app-login',
  standalone: true,
  imports: [CommonModule , FormsModule],
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

    public  login(){
      if(this.loginObj.password==="12" && this.loginObj.userName==="km"){
        this.router.navigate(["dashboard"]);
      }
         //
    }
}
