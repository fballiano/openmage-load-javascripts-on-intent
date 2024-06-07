OpenMage Load Javascripts On Intent
=================================

**THIS MODULE IS IN ALPHA STAGE AND IT'S NOT WORKING YET**

What to obtain 100% PageSpeed score? Install this module then ;-)

What does it do? it proceses the HTML of every page, converting all javascript to `text/plain`,
actually avoiding them from being loaded by the browsers on page load. Then injects a small
javascript that will load all the other scripts only when the user starts interacting with
the page (with a mouse movement, a click, a scroll or a few other events).

<table><tr><td align=center>
<strong>If you find my work valuable, please consider sponsoring</strong><br />
<a href="https://github.com/sponsors/fballiano" target=_blank title="Sponsor me on GitHub"><img src="https://img.shields.io/badge/sponsor-30363D?style=for-the-badge&logo=GitHub-Sponsors&logoColor=#white" alt="Sponsor me on GitHub" /></a>
<a href="https://www.buymeacoffee.com/fballiano" target=_blank title="Buy me a coffee"><img src="https://img.shields.io/badge/Buy_Me_A_Coffee-FFDD00?style=for-the-badge&logo=buy-me-a-coffee&logoColor=black" alt="Buy me a coffee" /></a>
<a href="https://www.paypal.com/paypalme/fabrizioballiano" target=_blank title="Donate via PayPal"><img src="https://img.shields.io/badge/PayPal-00457C?style=for-the-badge&logo=paypal&logoColor=white" alt="Donate via PayPal" /></a>
</td></tr></table>

Notes
---------

This module should work with cookie management solutions (eg: CookieBot) that modify the `script` tags
setting them as `text/plain` and adding a `data-cookiesomething` attribute. In fact all `script` tags
with `text/plain` type and any `data-` will not be processed by the module, they will be skipped entirely.

This module also works with inline scripts.

Backup!!!
---------
Backup everything while using this module!!!
This module is provided "as is" and I'll not be responsible for any data damage.

Installation
------------

With composer:
```shell
composer require fballiano/openmage-load-javascripts-on-intent
```

With modman:
```shell
modman clone https://github.com/fballiano/openmage-load-javascripts-on-intent
```

Compatibility
-------------
OpenMage v19, OpenMage v20, Magento 1.9+

Support
-------
If you have any issues with this extension, open an issue on GitHub.

Contribution
------------
Any contributions are highly appreciated. The best way to contribute code is to open a
[pull request on GitHub](https://help.github.com/articles/using-pull-requests).

Developer
---------
Fabrizio Balliano  
[http://fabrizioballiano.com](http://fabrizioballiano.com)  
[@fballiano](https://twitter.com/fballiano)

Licence
-------
[OSL - Open Software Licence 3.0](http://opensource.org/licenses/osl-3.0.php)

Copyright
---------
(c) Fabrizio Balliano
