package com.example.PDF_Wizard;

import Entity.Book;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

import java.util.List;
import java.util.stream.Collectors;
import java.util.stream.Stream;

@RestController
public class Welcome {
    @GetMapping("/add")
    public  String add(){
        return "heloo";
    }

    @CrossOrigin("http://localhost:4200/book")
    @GetMapping("/findAllBooks")
    public List<Book> getBooks(){
      return Stream.of(new Book(101,"java",999),
              new Book(102,"Spring",1199),new Book(103,"Hibernate",445),
              new Book(104,"Angular",888)).collect(Collectors.toList());
    }
}
