import { TestBed } from '@angular/core/testing';

import { HackatServiceService } from './hackat-service.service';

describe('HackatServiceService', () => {
  let service: HackatServiceService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(HackatServiceService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
