import { Component, OnInit } from '@angular/core';
import { SignInService } from 'src/app/services/sign-in.service';

@Component({
  selector: 'app-graph',
  templateUrl: './graph.component.html',
  styleUrls: ['./graph.component.css']
})
export class GraphComponent implements OnInit {

  constructor(private signInservice : SignInService) { }

  ngOnInit(): void {
  }

  logOut() :void {
    this.signInservice.doLogout();
  }
}
