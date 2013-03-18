var page = require('webpage').create(),
    system = require('system');

var url = system.args[1],
    savaPath = system.args[2];

page.open(url, function () {
    page.render(savaPath);//生成图片
    phantom.exit();
});