// Implements the clairnote version switcher dropdown menu.
(function() {
    var path = window.location.pathname
        .split('/')
        .filter(function(x) { return x !== ""; });

    // Just for good measure. This JS should not even be loaded on blog pages.
    if (path[0] === 'blog') { return; }

    var isSN = path[0] === 'sn',
        toPath = isSN ? path.slice(1) : Array.concat(['sn'], path),

        outer_ul = document.getElementById(isSN ? 'menu-clairnote-sn' : 'menu-main-menu'),
        outer_ul_li = outer_ul.firstElementChild,

        ul = outer_ul_li.querySelector('.sub-menu'),
        ul_lis = document.querySelectorAll('li'),
        ul_li = ul_lis[2],
        ul_li_a = ul_li.firstElementChild;

    ul_li_a.href = 'http://clairnote.org/' + toPath.join('/');
    ul_li_a.textContent = 'Clairnote' + (isSN ? '' : ' SN') + ' — Current Page';
})();
