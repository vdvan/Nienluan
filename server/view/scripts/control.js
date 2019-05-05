(function() {
    'use strict';

    /* DEFINE =================== */
    var SWITCH_ON_URL = SITE_PATH ? SITE_PATH + '/view/vendor/img/switch-on.png' : '';
    var SWITCH_OFF_URL = SITE_PATH ? SITE_PATH + '/view/vendor/img/switch-off.png': '';

    /* FUNCTION ================= */
    function update(id) {
        var imgElem = document.getElementById(id);
        id = id.replace('img-d-', '');
        var status = imgElem.getAttribute('src') == SITE_PATH + '/view/vendor/img/switch-on.png' ? 0 : 1;

        requestApi.send('GET', '', '?mod=api&act=update&id=' + id + '&status=' + (status ? '1' : '0')).then(function(resp) {
            console.log('--------------------------');
            console.log('TRANG THAI UPDATE: ' + resp);
            console.log('--------------------------');
            if (resp == 1) {
                imgElem.setAttribute('src', status ? SWITCH_ON_URL : SWITCH_OFF_URL);
            }
        });
    }

    

    /* DOM LOADED =============== */
    document.addEventListener('DOMContentLoaded', function(e) {
        var relayElemList = document.getElementsByClassName('relays');
        
        for (var i = relayElemList.length - 1; i >= 0; i--) {
            var id = relayElemList[i].getAttribute('id');
            var toggleElem = $('#' + id);

            toggleElem.click(update.bind(toggleElem, id));
        }
    });

})();