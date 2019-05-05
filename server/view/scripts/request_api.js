/************************************/
/*       MINI REQUEST API LIBS      */
/*                                  */
/*       cafe5hsang@gmail.com       */
/************************************/

var isEmpty = function(obj) {
    return Object.keys(obj).length === 0;
};

var requestApi = {};

requestApi.makeGetData = function(data) {
    var url = '?';
    var obj = Object.assign({}, data);

    if (!isEmpty(obj)) {
        for (var prop in obj) {
            if (obj.hasOwnProperty(prop)) {
                url += prop + '=' + obj[prop] + "&";
            }
        }
    }

    return url.replace(/.$/g,"");
};

requestApi.makePostData = function(data) {
    var formData = new FormData;
    var obj = Object.assign({}, data);

    if (!isEmpty(obj)) {
        for (var prop in obj) {
            if (obj.hasOwnProperty(prop)) {
                formData.append(prop, obj[prop]);
            }
        }
    }

    return formData;
};

requestApi.send = function(method, server, path, data) {
    if (method === 'GET') return this.get(server, path, data);
    else if (method === 'POST') return this.post(server, path, data);
};

requestApi.get = function(server, path, data) {
    var query = this.makeGetData(data);

    return new Promise(function(resolve, reject) {
        var req = new XMLHttpRequest();
        req.onreadystatechange = function() {
            if (req.readyState === 4) {
                if (req.status === 200) {
                    var data = JSON.parse(req.responseText);
                    resolve(data);
                } else reject(Error(req.statusText));
            }
        };

        req.onerror = function() {
            reject(Error("Error"));
        };

        req.open("GET", server + path + query, true);
        req.send();
    });
};

requestApi.post = function(server, path, data) {
    var formData = this.makePostData(data);

    return new Promise(function(resolve, reject) {
        var req = new XMLHttpRequest();

        req.onreadystatechange = function() {
            if (req.readyState === 4) {
                if (req.status === 200) {
                    var data = JSON.parse(req.responseText);
                    resolve(data);
                } else reject(Error(req.statusText));
            }
        };

        req.onerror = function() {
            reject(Error("Error"));
        };

        req.open("POST", server + path, true);
        req.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded' );
        req.send(formData);
    });
};