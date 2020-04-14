let Random = Mock.Random;
let data = Mock.mock('http://www.lh.com/blogs', {
    "result|20": [{
        "id|+1": 1,
        "title": '@csentence',
        "body": "@cparagraph",
        "name": "@name",
        "city": "@city",
        "ctime": '@datetime("2020-MM-dd HH:mm:ss")',
        "url": Random.image('200x200', '#50B347', '#FFF', 'l')
    }]
})

function getUrlName() {
    // ⽤来存放健值对的空对像
    var args = {};
    // 去除我们的?号
    var url = location.search.length > 0 ? location.search.substring(1) : '';
    // 按&字符串去拆分数组
    var items = url.split('&');
    var item = null;
    for (var i = 0; i < items.length; i++) {
        item = items[i].split('=');
        args[item[0]] = item[1]
    }
    return args
}
