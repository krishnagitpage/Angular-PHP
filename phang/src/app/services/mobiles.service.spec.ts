import { TestBed, inject } from '@angular/core/testing';

import { MobilesService } from './mobiles.service';

describe('MobilesService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [MobilesService]
    });
  });

  it('should be created', inject([MobilesService], (service: MobilesService) => {
    expect(service).toBeTruthy();
  }));
});
