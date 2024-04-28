import { ComponentFixture, TestBed } from '@angular/core/testing';
import { CommentairePage } from './commentaire.page';

describe('CommentairePage', () => {
  let component: CommentairePage;
  let fixture: ComponentFixture<CommentairePage>;

  beforeEach(async(() => {
    fixture = TestBed.createComponent(CommentairePage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
