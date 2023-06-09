import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';

import { LoginComponent } from './login/login.component';
import { StudentComponent } from './student/student.component';

import { CourseComponent } from './student/course/course.component';
import { DashboardComponent } from './student/dashboard/dashboard.component';
import { InternshipComponent } from './student/internship/internship.component';
import { CsecyComponent } from './student/course/csecy/csecy.component';
import { EceComponent } from './student/course/ece/ece.component';
import { RouterModule, Routes } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { HttpClientModule} from '@angular/common/http'
import { Router } from '@angular/router';
import { RegisterComponent } from './register/register.component';
import { ItComponent } from './student/course/it/it.component';

const routes:Routes = [

 
]


@NgModule({
  declarations: [
    AppComponent,
    
    LoginComponent,
    StudentComponent,
  
    CourseComponent,
       DashboardComponent,
       InternshipComponent,
       CsecyComponent,
       EceComponent,
       RegisterComponent,
       ItComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    BrowserModule,
    RouterModule.forRoot(routes),
    FormsModule,
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
