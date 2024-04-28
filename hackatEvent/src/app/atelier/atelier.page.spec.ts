import { ComponentFixture, TestBed } from '@angular/core/testing';
import { AtelierPage } from './atelier.page';

describe('AtelierPage', () => {
  let component: AtelierPage;
  let fixture: ComponentFixture<AtelierPage>;

  beforeEach(async(() => {
    fixture = TestBed.createComponent(AtelierPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
