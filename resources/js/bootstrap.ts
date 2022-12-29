import 'bootstrap';
import { createPopper } from '@popperjs/core';
import { Axios } from 'axios-observable';
import _ from 'lodash';
import $ from 'jquery';

declare global {
  // Extending the DOM Window Interface
  interface Window {
    axios: any;
    _: any;
    $: any;
    Popper: any;
  }

  // Extending querySelector Element
  interface Element {
    content: string;
  }
}

declare var window: Window;
window._ = _;
window.$ = $;
window.Popper = createPopper;
window.axios = Axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token: HTMLMetaElement | null = document.head!.querySelector('meta[name="csrf-token"]');

if (token) {
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
  //console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
