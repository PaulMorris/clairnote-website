// Implements the clairnote version switcher dropdown menu.
(function() {
    var path = window.location.pathname
        .split('/')
        .filter(function(x) { return x !== ""; });

    // Just for good measure. This JS should not even be loaded on blog pages.
    if (path[0] === 'blog') { return; }

    var isSN = path[0] === 'sn';
    var toPath = isSN ? path.slice(1) : Array.concat(['sn'], path);

    var a = document.createElement('a');
    a.href = "http://clairnote.org/" + toPath.join('/');

    a.appendChild(document.createTextNode(
        'Switch to Clairnote ' + (isSN ? '' : 'SN ') + 'site'
    ));

    var ul = document.getElementById(
        isSN ? 'menu-clairnote-sn' : 'menu-main-menu'
    );

    var ul_li = ul.lastElementChild;
    ul_li.classList.add(
        'menu-item-type-custom',
        'menu-item-object-custom',
        'menu-item-has-children'
    );

    var ul_li_ul = ul_li.querySelector('.sub-menu');
    var ul_li_ul_li = document.createElement('li');

    ul_li_ul_li.classList.add(
        'menu-item',
        'menu-item-type-custom',
        'menu-item-object-custom'
    );

    ul_li_ul_li.appendChild(a);
    ul_li_ul.appendChild(ul_li_ul_li);
    ul_li.appendChild(ul_li_ul);
})();
