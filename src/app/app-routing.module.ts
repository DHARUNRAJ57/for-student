import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LoginComponent } from './login/login.component';
import { CourseComponent } from './student/course/course.component';
import { DashboardComponent } from './student/dashboard/dashboard.component';
import { InternshipComponent } from './student/internship/internship.component';
import { StudentComponent } from './student/student.component';
import { CsecyComponent } from './student/course/csecy/csecy.component';
import { RegisterComponent } from './register/register.component';


const routes: Routes = [
  {path:'', component: LoginComponent},
  {path:"login", component: LoginComponent},
  {path:"register",component:RegisterComponent},
  {path:"student", component: StudentComponent,
        children: [
          { path: 'dashboard', component: DashboardComponent},
          { path: 'course', component: CourseComponent},
          {path: 'coursecsecy', component:CsecyComponent},
          {path:'internship',component:InternshipComponent},
          {path:"login", component: LoginComponent},
         
          ],},
    
   
  ];




@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
