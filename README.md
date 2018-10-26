![Package Logo](https://raw.githubusercontent.com/VitexSoftware/FlexiBee-Digest/master/package-logo.png "Project Logo")

FlexiBee Digest mail generator
==============================

There are four scripts:

[flexibee-daydigest.php](src/flexibee-daydigest.php)     - Generate FlexiBee digest for one day
[flexibee-weekdigest.php](src/flexibee-weekdigest.php)   - Generate FlexiBee digest for one week
[flexibee-monthdigest.php](src/flexibee-monthdigest.php) - Generate FlexiBee digest for one month
[flexibee-yeardigest.php](src/flexibee-yeardigest.php)   - Generate FlexiBee digest for one year
[flexibee-alltimedigest.php](src/flexibee-yeardigest.php)- Generate FlexiBee digest for all time

Debian/Ubuntu
-------------

Packages are availble. Please use repo :

```        
    wget -O - http://v.s.cz/info@vitexsoftware.cz.gpg.key|sudo apt-key add -
    echo deb http://v.s.cz/ stable main > /etc/apt/sources.list.d/ease.list
    apt update
    apt install php-flexibee-digest
```

Po instalaci balíku jsou v systému k dispozici dva nové příkazy:

  * **flexibee-daydigest**      - Generate FlexiBee digest for one day
  * **flexibee-monthdigest**    - Generate FlexiBee digest for one week
  * **flexibee-weekdigest**     - Generate FlexiBee digest for one month
  * **flexibee-yeardigest**     - Generate FlexiBee digest for one year
  * **flexibee-alltimedigest**  - Generate FlexiBee digest for all time


Závislosti
----------

Tento nástroj ke svojí funkci využívá následující knihovny:

 * [**EasePHP Framework**](https://github.com/VitexSoftware/EaseFramework) - pomocné funkce např. logování
 * [**FlexiPeeHP**](https://github.com/Spoje-NET/FlexiPeeHP)        - komunikace s [FlexiBee](https://flexibee.eu/)
 * [**FlexiPeeHP Bricks**](https://github.com/VitexSoftware/FlexiPeeHP-Bricks) - používají se třídy Zákazníka, Upomínky a Upomínače

Konfigurace
-----------

 * [/etc/flexibee/client.json](client.json)   - společná konfigurace připojení k FlexiBee serveru
 * [/etc/flexibee/digest.json](digest.json) - nastavení párovače:

```
    "EASE_LOGGER": "syslog|mail|console",         - how to log progress and results
    "EASE_MAILTO": "info@yourdomain.net",         - send digest mail
    "DIGEST_FROM": "noreply@vitexsoftware.cz",    - digest mail sender address 
    "THEME":  "happy",                            - additional css
    "SAVETO": "/var/tmp/"                         - save html digest to 
```


See also
--------

  * https://github.com/VitexSoftware/php-flexibee-reminder
  * https://github.com/VitexSoftware/php-flexibee-matcher

Poděkování
----------

Tento software by nevznikl pez podpory:

[ ![Spoje.Net](https://raw.githubusercontent.com/VitexSoftware/php-flexibee-digest/master/doc/spojenet.gif "Spoje.Net s.r.o.") ](https://spoje.net/)

