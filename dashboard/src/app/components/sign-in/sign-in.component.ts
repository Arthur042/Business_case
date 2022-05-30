import {Component} from '@angular/core';
import {FormControl, Validators} from '@angular/forms';
import { SignIn } from 'src/app/models/sign-in';
import { SignInService } from 'src/app/services/sign-in.service';

/** @title Form field with error messages */
@Component({
  selector: 'app-sign-in',
  templateUrl: './sign-in.component.html',
  styleUrls: ['./sign-in.component.css']
})
export class SignInComponent {

  isVerification = false;
  mailVerification = new SignIn();
  hide = true;

  constructor( private SignInService : SignInService) { }



  signIn() : void {
    this.isVerification = true;
    this.SignInService.signIn(this.mailVerification);
  }
}