import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { GraphComponent } from './components/graph/graph.component';
import { SignInComponent } from './components/sign-in/sign-in.component';
import { AuthGuard } from "./shared/auth.guard";

const routes: Routes = [
  {path: '', component: SignInComponent},
  {path: 'graphique', component: GraphComponent, canActivate: [AuthGuard]},
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
