(function(_w, _d) {
    function It() {
        this.variId = "ppbVerify";
        this.types = { 'business': 'hy', 'realname': 'sm', 'official': 'gw', 'official-st': 'gw', 'enterprise': 'qy', 'common': 'aqkx', '315red': '315r', '315yellow': '315y' };
        this.init()
    };
    It.prototype.$id = function(id) { return document.getElementById(id) };
    It.prototype.getRandId = function(pre, len) { var id = pre || 'aqLogo'; var len = len || 5; for (var i = len; i > 0; i--) { id += (String.fromCharCode(65 + Math.ceil(Math.random() * 25))) } return id };
    It.prototype.getSizeInfo = function($it) {
        var info = {};
        var sizeInfo = $it.getAttribute('logo_size');
        switch (sizeInfo) {
            case '124x47':
                info.w = 124;
                info.h = 47;
                info.sizeInfo = '124x47';
                break;
            case '83x30':
                info.w = 83;
                info.h = 30;
                info.sizeInfo = '83x30';
                break;
            case '70x70':
                info.w = 70;
                info.h = 70;
                info.sizeInfo = '70x70';
                break
        };
        return info;
    };
    It.prototype.getUrlByInfo = function(typeName) { var host = _d.location.host; var url; if (typeName === 'common') { url = 'http://www.cn-ecusc.org.cn/cert/aqkx/site/?site=' + host } else { url = 'https://v.pinpaibao.com.cn/authenticate/cert/?site=' + host + '&at=' + typeName } return url };
    It.prototype.getTypeInfo = function($it) {
        var _it = this;
        var typeInfo = [];
        var getType = $it.getAttribute('logo_type');
        if (!(getType && getType !== "")) { return false }
        getType = getType.split(',');
        for (var i = 0, len = getType.length; i < len; i++) { var it = getType[i]; var type = _it.types[it]; if (type) { typeInfo.push({ typeName: it, type: type }) } };
        return typeInfo
    };
    It.prototype.getImgByInfo = function(sizeInfo, type) {
        var today = new Date();
        var date = (today.getMonth() + 1).toString() + today.getDate().toString();
        var $img = document.createElement("img");
        $img.setAttribute("src", '//static.anquan.org/static/outer/image/' + type + '_' + sizeInfo.sizeInfo + '.png' + '?id=' + _d.location.hostname + '?t=' + Math.floor(date / _d.location.hostname.length));
        $img.setAttribute("alt", '??????????????????');
        $img.setAttribute("width", sizeInfo.w);
        $img.setAttribute("height", sizeInfo.h);
        $img.setAttribute("style", "border: none;");
        return $img
    };
    It.prototype.getLinkByInfo = function(sizeInfo, typeInfo, $a) {
        var _it = this;
        var $a = $a || document.createElement("a");
        var url = _it.getUrlByInfo(typeInfo.typeName);
        var $img = _it.getImgByInfo(sizeInfo, typeInfo.type);
        $a.setAttribute("href", url);
        $a.setAttribute("target", '_blank');
        $a.appendChild($img);
        return $a
    };
    It.prototype.getInfo = function($it) { var _it = this; if (!$it) { return false } var typeInfo = _it.getTypeInfo($it); if (!(typeInfo.length > 0)) { return false } return { sizeInfo: _it.getSizeInfo($it), typeInfo: typeInfo } };
    It.prototype.getA = function() {
        var _it = this;
        var id = _it.getRandId();
        _d.write('<b id="' + id + '" style="display: none;"></b>');
        var $a = _it.$id(id).parentNode;
        if ($a.tagName.toLocaleUpperCase() !== 'A') { return false }
        return $a
    };
    It.prototype.init = function() {
        var _it = this;
        var $veriBox = _it.$id(_it.variId);
        var $a = $veriBox ? false : _it.getA();
        var info = _it.getInfo($a || $veriBox);
        if (!info) { return false }
        var sizeInfo = info.sizeInfo;
        var typeInfo = info.typeInfo;
        var typeLen = typeInfo.length;
        if ($veriBox) {
            for (var i = 0; i < typeLen; i++) {
                var $aAppend = _it.getLinkByInfo(sizeInfo, typeInfo[i]);
                $veriBox.appendChild($aAppend)
            }
        } else { _it.getLinkByInfo(sizeInfo, typeInfo[0], $a) }
    };
    new It()
})(window, document);