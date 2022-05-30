import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Router } from '@angular/router';
import { ToastrService } from 'ngx-toastr';
import { environment } from 'src/environments/environment';
import { SignIn } from '../models/sign-in';

@Injectable({
  providedIn: 'root'
})
export class SignInService {

  apiUrl = environment.apiUrl
  
  constructor( private router : Router, private toastr: ToastrService, private http : HttpClient) { }

  signIn(mail : SignIn){
    this.http.post<any>(this.apiUrl + 'authentication_token', mail).subscribe((res: any) => {
      localStorage.setItem('access_token', res.token);
      this.toastr.success('Redirection en cours', 'Connexion réussi');
      this.router.navigate(['/graphique'])
    })
  }

  getToken() {
    return localStorage.getItem('access_token');
  }

  doLogout() {
    let removeToken = localStorage.removeItem('access_token');
    if (removeToken == null) {
      this.router.navigate(['/']);
    }
  }

  get isLoggedIn() : boolean {
    let authToken = localStorage.getItem('access_token');
    return authToken !== null ? true : false;
  }
}
