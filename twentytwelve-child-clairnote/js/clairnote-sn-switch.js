// Modifies the url and text of the menu item for switching between
// Clairnote and Clairnote SN versions of pages.
(function() {
    function newMenuItemData(pathname) {
        var path = pathname.split('/').filter(function(x) { return x !== ""; }),
            isSN = path[0] === 'sn',
            newPath = isSN ? path.slice(1) : Array.concat(['sn'], path);
        return {
            url: 'http://clairnote.org/' + newPath.join('/'),
            text: 'Clairnote' + (isSN ? '' : ' SN') + ' — Current Page',
            isSN: isSN
        };
    }
    var item = newMenuItemData(window.location.pathname),
        outer_ul_id = item.isSN ? 'menu-clairnote-sn' : 'menu-main-menu',
        outer_ul = document.getElementById(outer_ul_id),
        outer_ul_li = outer_ul.firstElementChild,
        ul = outer_ul_li.querySelector('.sub-menu'),
        ul_li = ul.querySelectorAll('li')[1],
        ul_li_a = ul_li.firstElementChild;

    ul_li_a.href = item.url;
    ul_li_a.textContent = item.text;
})();
