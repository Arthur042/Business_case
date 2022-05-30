import { TestBed } from '@angular/core/testing';

import { IntertceptorInterceptor } from './intertceptor.interceptor';

describe('IntertceptorInterceptor', () => {
  beforeEach(() => TestBed.configureTestingModule({
    providers: [
      IntertceptorInterceptor
      ]
  }));

  it('should be created', () => {
    const interceptor: IntertceptorInterceptor = TestBed.inject(IntertceptorInterceptor);
    expect(interceptor).toBeTruthy();
  });
});
