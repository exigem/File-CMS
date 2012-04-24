# File-CMS #

A raw content management system based on simple Files. No use of Database, so it will be usable for small websites that doesn't has a lot of Content. Latest `master` running at [www.exigem.com/fcms](http://www-exigem.com/fcms/)


## Dependencies ##

*  [PHP][]4 better [PHP][]5
*  PHP XML-[PHP Dom][]


## Installation ##

Get last version from github.com by following command:

    git clone git://github.com/vaddi/File-CMS.git

Edit verify.php to change username and password, otherwise we will use username *admin* and password *nimda*. 


## Usage ##

Just copy or create Pages in Language subfolders (at the time german, "de" and english, "en"). The Menu will generatet by the Date of edit or create (last edited will raise on the left side of the menu).
There is a Subolder for the Newspage, witch contain a language named Folder for the News. Each xml File Contain a single Newspost. All URLs (http://domain.tld/) in the "description" Tag will automacily formated to clickable href links in the view on the Newspage. 


## Idea ##

Based on a small Website for a Friend we buld up the Base in a few Days. Later we decide to use the System oftener and bring it up to others becaus, its just simple. Beside the maincoding the Idea grown up by more and more Features:

*  All News content will read from xml Files
*  Have to be very userfriendly by simple Structure and Usage
*  Generates automaticly RSS1, RSS2 or Atom feeds from your Newscontent


## On Going ##

Would be nice to have:

*  Backend for secondary Content management.
*  handheld CSS File


## Issuses ##

Sublanguaged Pages will be search by his name, if there is no similiar named File in the other Language Folders, the Languageflag will not show. If the Files has different names but same Content you can edit the footer.php File to let the system know the differences (Simply rules to replace). 

## Credits ##

1.  [PHP-Libary][] writen by Alexandre Alapetite

[PHP-Libary]: http://alexandre.alapetite.fr/doc-alex/domxml-php4-php5/
[PHP Dom]: http://de.php.net/manual/en/book.dom.php
[PHP]: http://php.net/

