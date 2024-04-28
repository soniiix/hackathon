import { ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { ExploreContainerComponentModule } from '../explore-container/explore-container.module';

import { HackathonsPage } from './hackathons.page';

describe('HackathonsPage', () => {
  let component: HackathonsPage;
  let fixture: ComponentFixture<HackathonsPage>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [HackathonsPage],
      imports: [IonicModule.forRoot(), ExploreContainerComponentModule]
    }).compileComponents();

    fixture = TestBed.createComponent(HackathonsPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
