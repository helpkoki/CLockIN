import { Component } from '@angular/core';

@Component({
  selector: 'app-login',
  standalone: true,
  imports: [],
  templateUrl: './login.component.html',
  styleUrl: './login.component.css'
})
export class LoginComponent {
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
