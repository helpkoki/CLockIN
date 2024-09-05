import { HttpClientModule ,HttpClient } from '@angular/common/http';
import { Component ,OnInit} from '@angular/core';
import {CommonModule} from '@angular/common'
import { RouterOutlet,RouterLink ,RouterLinkActive} from '@angular/router';

@Component({
  selector: 'app-book',
  standalone: true,
  imports: [HttpClientModule,CommonModule ,RouterOutlet ,RouterLink ,RouterLinkActive],
  templateUrl: './book.component.html',
  styleUrl: './book.component.css'
})
export class BookComponent implements OnInit{
  books: any = []; 
   constructor(private http:HttpClient){}
  ngOnInit(){
    let response=this.http.get("http://localhost:8081/findAllBooks");
    //response.subscribe((data)=>console.log(data))
    response.subscribe((data)=>this.books=data)
  }
}
