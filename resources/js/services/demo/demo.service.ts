import { AxiosObservable } from 'axios-observable';
import { AxiosResponse } from 'axios';
import { HTTPBaseService } from '../common/http-base.service';
import { HTTP_CONSTANTS } from '../../constants/http-constants';

export class DemoService extends HTTPBaseService {

  constructor() {
    super();
  }

  getAxieData(): AxiosObservable<AxiosResponse> {
    const url = 'demo';
    return this.apiCustom<AxiosResponse>(url, HTTP_CONSTANTS.GET);
  }
}
