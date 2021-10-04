var get = function (url, callBack) {
    requestServer("get", url, callBack);
}

function getBytes(url, metodoCallBack) {
    requestServer("post", url, metodoCallBack, null, "arraybuffer");
}

var postText = function (url, callBack, texto) {
    requestServer("post", url, callBack, texto);
}

function requestServer(type, url, callBack, texto, tipoRpta) {
    var xhr = new XMLHttpRequest();
    var urlBase = sessionStorage.getItem("url");
    xhr.open(type, urlBase + url);
    if (tipoRpta != null) xhr.responseType = tipoRpta;
    //var divEspera = document.getElementById("divEspera");
    xhr.onloadstart = function () {
        //if (divEspera != null) divEspera.style.display = "inline";
    }
    xhr.onreadystatechange = function () {
        if (xhr.status == 200 && xhr.readyState == 4) {
            //if (divEspera != null) divEspera.style.display = "none";
            if (callBack != null) {
                if (tipoRpta != null) callBack(xhr.response);
                else callBack(xhr.responseText);
            }
        }
    }
    if (type == "get") xhr.send();
    else {
        if (texto != "") xhr.send(texto);
    }
}

function navegar(url) {
    var urlBase = window.sessionStorage.getItem("url");
    window.location.href = urlBase + url;
}
/**********************************************************
*********************** EFECTO ****************************
**********************************************************/
function EffectoBoton() {
    var buttons = document.querySelectorAll('.btn-eff-1, .btn-eff-2'),
        btn = 0, btnt = buttons.length;
    for (; btn < btnt; btn++) {
        var nbtn = buttons[btn];
        nbtn.addEventListener('click', createRipple);
    }
    function createRipple(e) {
        var circle = document.createElement('div');
        this.appendChild(circle);

        var d = Math.max(this.clientWidth, this.clientHeight);
        circle.style.width = circle.style.height = d + 'px';
        circle.style.left = '50%';
        circle.style.marginLeft = '-' + (d / 2) + 'px';
        circle.style.top = '50%';
        circle.style.marginTop = '-' + (d / 2) + 'px';
        circle.classList.add('ripple');
    }
};

/**********************************************************
*********************** MENSAJE ALERTA ********************
**********************************************************/
(function () {
    /***************************************
     ********* VARIABLES GLOBALES **********
     ***************************************/
    var nAlert = 1;
    var nConfirm = 1;
    /***************************************
     ************** ALERT *************
    ***************************************/
    var eAlert = (function () {
        function eAlert() {
            this._config = {
                theme: 1,
                type: 3,
                mainId: 'PrincipalAlertId' + nAlert,
                classIni: 'eDialog-v',
                message: '',
                title: '',
                buttons: [{ label: 'Aceptar', className: '' }]
            };
            ++nAlert;
        }
        eAlert.prototype.message = function (message) {
            return setMessage(message, this);
        };
        eAlert.prototype.title = function (title) {
            return setTitle(title, this);
        };
        eAlert.prototype.run = function (callback) {
            return setRun(this, callback);
        };
        eAlert.prototype.config = function (config) {
            return setConfig(config, this);
        };
        eAlert.prototype.type = function (type) {
            this._config.type = type;
            return this;
        };
        eAlert.prototype.create = function () {
            return createDialog(this._config);
        };
        eAlert.prototype.then = function (callback) {
            setThen(this, callback);
        };
        eAlert.prototype.close = function (config) {
            var body = document.getElementsByTagName("body")[0];
            body.removeChild(document.getElementById(config.mainId));
            body.removeChild(document.getElementById('bg-' + config.mainId));
            //Activamos el ScrollBar Document html
            document.body.style.overflow = 'visible';
        };
        return eAlert;
    }());
    /////
    var eConfirm = (function () {
        function eConfirm() {
            this._config = {
                theme: 1,
                type: 4,
                mainId: 'PrincipalConfirmId' + nConfirm,
                classIni: 'eDialog-v',
                message: '',
                title: '',
                buttons: [{ label: 'Aceptar', className: '' }, { label: 'Cancelar', className: '' }]
            };
            ++nConfirm;
        }
        eConfirm.prototype.message = function (message) {
            return setMessage(message, this);
        };
        eConfirm.prototype.title = function (title) {
            return setTitle(title, this);
        };
        eConfirm.prototype.run = function (callback) {
            return setRun(this, callback);
        };
        eConfirm.prototype.config = function (config) {
            return setConfig(config, this);
        };
        eConfirm.prototype.create = function () {
            return createDialog(this._config);
        };
        eConfirm.prototype.then = function (callback) {
            setThen(this, callback);
        };
        eConfirm.prototype.buttons = function () {
        };
        eConfirm.prototype.close = function (config) {
            var body = document.getElementsByTagName("body")[0];
            body.removeChild(document.getElementById(config.mainId));
            body.removeChild(document.getElementById('bg-' + config.mainId));
            //Activamos el ScrollBar Document html
            document.body.style.overflow = 'visible';
        };
        return eConfirm;
    }());
    /////
    /**************************************
     * ###### FUNCTIONES GLOBALES ####### *
     **************************************/
    function setThen(dialog, callback) {
        var config = dialog._config;
        var btns = dialog.objCreateDialog.buttons;
        var _loop_1 = function (b) {
            var btnGn = btns[b];
            if (btnGn.detachEvent) {
                btnGn.detachEvent('onclick', dialog.btnClickDefault);
                btnGn.attachEvent('onclick', function () {
                    callback((parseInt(b) + 1), btnGn);
                    dialog.close(config);
                });
            }
            else {
                btnGn.removeEventListener('click', dialog.btnClickDefault, false);
                btnGn.addEventListener('click', function () {
                    callback((parseInt(b) + 1), btnGn);
                    dialog.close(config);
                }, false);
            }
        };
        for (var b in btns) {
            _loop_1(b);
        }
    }
    function setRun(dialog, callback) {
        dialog.objCreateDialog = dialog.create();
        var config = dialog._config;
        dialog.btnClickDefault = function () {
            dialog.close(config);
        };
        for (var b in dialog.objCreateDialog.buttons) {
            if (dialog.objCreateDialog.buttons[b].attachEvent) {
                dialog.objCreateDialog.buttons[b].attachEvent('onclick', dialog.btnClickDefault);
            }
            else {
                dialog.objCreateDialog.buttons[b].addEventListener('click', dialog.btnClickDefault, false);
            }
        }
        ;
        if (callback) {
            callback();
        }
        //
        dialog.objCreateDialog.buttons[0].focus();
        return dialog;
    }
    function setMessage(message, dialog) {
        dialog._config.message = message;
        return dialog;
    }
    function setTitle(title, dialog) {
        dialog._config.title = title;
        return dialog;
    }
    function setConfig(config, dialog) {
        Loop1: for (var r in config) {
            if (dialog._config[r] === undefined) {
                continue Loop1;
            }
            //Botones
            if (r === 'buttons') {
                for (var v = 0; v < config.buttons.length; v++) {
                    var btn = config.buttons[v];
                    Loop3: for (var g in btn) {
                        if (dialog._config[r][v][g] === undefined) {
                            continue Loop3;
                        }
                        dialog._config[r][v][g] = btn[g];
                    }
                }
                continue;
            }
            //General
            dialog._config[r] = config[r];
        }
        return dialog;
    }

    function createDialog(config) {
        //Div background
        var bg = document.createElement('div');
        bg.className = config.classIni + config.theme + '-bg';
        bg.id = 'bg-' + config.mainId;
        //Div Contenedor Principal
        var bdg = document.createElement('div');
        bdg.className = config.classIni + config.theme + '-contg';
        bdg.id = config.mainId;
        //Div Body Principal
        var bdbd = document.createElement('div');
        bdbd.className = config.classIni + config.theme + '-cont';
        //Texto
        var bdbdt = document.createElement('div');
        bdbdt.className = config.classIni + config.theme + '-cont-text';
        var bhtml = '';
        if (config.title && config.title !== "") {
            bhtml = '<h2>' + config.title + '</h2>';
        }
        bhtml += '<p>' + config.message + '</p>';
        bdbdt.innerHTML = bhtml;
        //Icono
        var btns = [];
        var bdbdic = document.createElement('div');
        bdbdic.className = config.classIni + config.theme + '-icon';
        bdbdic.style.color = '#ff8a00';
        bdbdic.innerHTML = '<i class="fa fa-exclamation-circle fa-3x" aria-hidden="true"></i>';
        switch (config.type) {
            case 1:
                bdbdic.innerHTML = '<i class="fa fa-check-circle fa-3x" aria-hidden="true"></i>';
                bdbdic.style.color = '#3c764b';
                break;
            case 2:
                bdbdic.innerHTML = '<i class="fa fa-times-circle fa-3x" aria-hidden="true"></i>';
                bdbdic.style.color = '#f00400';
                break;
            case 4:
                bdbdic.innerHTML = '<i class="fa fa-question-circle fa-3x" aria-hidden="true"></i>';
                bdbdic.style.color = '#31709f';
                break;
        }
        //Buttons
        for (var btn in config.buttons) {
            var bdbbtns = document.createElement('button');
            bdbbtns.innerHTML = config.buttons[btn].label;
            bdbbtns.setAttribute('type', 'button');
            btns.push(bdbbtns);
            bdbdt.appendChild(bdbbtns);
        }
        bdbd.appendChild(bdbdt);
        bdbd.appendChild(bdbdic);
        bdg.appendChild(bdbd);
        var body = document.getElementsByTagName("body")[0];
        body.appendChild(bdg);
        body.appendChild(bg);
        //Desactivamos el ScrollBar Document html
        document.body.style.overflow = 'hidden';
        return {
            buttons: btns
        };
    }

    /***************/
    var Msg = (function () {
        function Msg() {
        }
        Msg.general = function (data, type) {
            var _alert = new eAlert();
            if (data) {
                _alert.type(type || 3);
                if (typeof data === 'string') {
                    _alert.message(data);
                }
                else if (typeof data === 'object') {
                    _alert.message(data.message);
                }
            }
            return _alert;
        };
        Msg.alert = function (data) {
            return Msg.general(data, 3)
        };
        Msg.error = function (data) {
            return Msg.general(data, 2);
        };
        Msg.success = function (data) {
            return Msg.general(data, 1);
        };
        Msg.confirm = function (data) {
            var _confirm = new eConfirm();
            if (data) {
                if (typeof data === 'string') {
                    _confirm.message(data);
                }
                else if (typeof data === 'object') {
                    _confirm.message(data.message);
                }
            }
            return _confirm;
        };
        return Msg;
    }());
    window.Msg = Msg;
})();

/**********************************************************
*********************** PRECARGA **************************
**********************************************************/
var Precarga = (function () {
    var pre, body;
    var Precarga = function () {
    };
    Precarga.init = function () {
        pre = document.createElement('div');
        body = document.getElementsByTagName('body')[0];
        pre.className = 'preload';
        body.appendChild(pre);
    }
    Precarga.open = function () {
        if (!pre) {
            Precarga.init();
        }
        pre.style.display = 'block';
    }
    Precarga.close = function () {
        pre.style.display = 'none';
    }
    return Precarga;
}());
window.Precarga = Precarga;
