import Glide from '@glidejs/glide';
import $ from 'jquery';

$(document).ready(() => {
    if($('.glide').length > 0) {
        new Glide('.glide', {
            type: 'carousel',
            startAt: 0,
            focusAt: 'center',
        }).mount();
    }
});