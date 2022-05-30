import { Injectable } from '@angular/core';
import {
  HttpRequest,
  HttpHandler,
  HttpEvent,
  HttpInterceptor
} from '@angular/common/http';
import { Observable } from 'rxjs';
import { SignInService } from '../services/sign-in.service';

@Injectable()
export class IntertceptorInterceptor implements HttpInterceptor {

  constructor(private signInService : SignInService) {}

  intercept(request: HttpRequest<unknown>, next: HttpHandler): Observable<HttpEvent<unknown>> {
    const authToken = this.signInService.getToken();
      if(authToken){
        request = request.clone({
          setHeaders: {
              Authorization: "Bearer " + authToken
          }
      });
      }
    return next.handle(request);
  }
}
