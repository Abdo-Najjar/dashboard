
import getLodash from "lodash/get";
import eachRightLodash from "lodash/eachRight";
import replaceLodash from "lodash/replace";


window.translate = function (string, args) {

    let value = getLodash(window.i18n, string);

    eachRightLodash(args, (paramVal, paramKey) => {

        value = replaceLodash(value, `:${paramKey}`, paramVal);

    });
    
    return value;
}


import axois from 'axios';

window.axois = axois;


import Swal from 'sweetalert2'

window.swal = Swal;

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
