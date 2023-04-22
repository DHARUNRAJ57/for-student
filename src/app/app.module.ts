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

@NgModule({
  declarations: [
    AppComponent,
    
    LoginComponent,
    StudentComponent,
  
    CourseComponent,
       DashboardComponent,
       InternshipComponent,
       CsecyComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
