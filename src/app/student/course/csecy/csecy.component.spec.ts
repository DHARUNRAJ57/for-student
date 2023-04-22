import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CsecyComponent } from './csecy.component';

describe('CsecyComponent', () => {
  let component: CsecyComponent;
  let fixture: ComponentFixture<CsecyComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ CsecyComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(CsecyComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
