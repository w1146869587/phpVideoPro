<? /* list of actors, directors, composers */
 ?>
<? /* $Id$ */ ?>

[title]
*intro#

[text]
Als Alternative zum PHP basierten Label-Generator, welcher einfach nur "plain
Text" auf PNG Bilder setzt, hat Michael Hasselberg den PS Label Generator
erstellt (und wartet auch den Code hierf�r). Aufbauend auf PostScript-Templates
ergeben sich hier wesentlich bessere und umfangreichere M�glichkeiten des
Designs - von der zus�tzlichen Flexibilit�t einmal ganz zu schweigen.

[text]
Als Voraussetzung f�r die Benutzung dieses Label-Generators muss auf dem
(Client-) System ein PostScript Prozessor (und Betrachter) installiert sein.
F�r Linux (und andere *nix) basierte Systeme bedarf dies keiner besonderen
Erw�hnung: mir ist keine Distribution bekannt, die nicht bereits mit
GhostScript einher kommt. F�r Windows (und andere Betriebssysteme) kann es
jedoch notwendig sein, einen solchen separat zu installieren - was jedoch in
den seltensten F�llen ein Problem darstellen sollte. Wer das PostScript Label
System benutzen m�chte, sollte halt lediglich sicher stellen, das ein solcher
Prozessor/Viewer installiert ist.

[title]
*labeltype#

[text]
Wird "PS Label" �ber das Men� aufgerufen, muss zun�chst ein Label Typ festgelegt
werden. Die Engine ist so konzipiert, dass der Druck auf fertigen Label-Sheets
(mit selbstklebenden Labels) erfolgen kann - aber nat�rlich nicht muss: er kann
durchaus auf einfachem Papier erfolgen, und die erzeugten Etiketten k�nnen dann
von Hand ausgeschnitten und mit Pritt-Stift o.a. auf die Tapes geklebt werden.

[text]
Die Auswahl-Box auf dieser Seite gibt den Label-Typ an (unter diesem Namen
k�nnen die Label-Sheets im einschl�gigen Fachhandel bezogen werden) und zeigt
zus�tzlich auf, wohin die erzeugten Etiketten anschlie�end geklebt werden
sollen: z.B. auf die Seite oder das Top einer VHS Kassette. Nach getroffener
Auswahl f�hrt, wer h�tte das gedacht, der "*layout_label#" Button zum zweiten
Schritt:

[title]
*print_label#

[text]
Hier sind die Nummern der Medien einzugeben, f�r die ein Etikett generiert
werden soll. W�hrend wir im vorigen Punkt die <b><i>Ma�e</i></b> des Etiketts
festgelegt haben, geht es hier um das Design: welche Farben und Grafiken sollen
benutzt werden. Auch wenn die Namen der Designs zumeist an Kategorien erinnern
(auf diesen basieren die von mir erzeugten Vorlagen auch), werden sie aus zwei
Gr�nden <b><i>nicht</i></b> automatisch ausgew�hlt: erstens k�nnen auf dem
jeweiligen Medium durchaus mehrere Filme verschiedener Kategorien sein, und
zweitens wei� phpVideoPro beim Aufruf dieser Seite ja noch gar nicht, f�r
welche Medien Etiketten erzeugt werden sollen. Sicher lie�e sich f�r den
zweiten Punkt irgend was mit JavaScript machen - aber JavaScript vermeide ich
f�r phpVideoPro lieber, soweit dies m�glich ist ;)

[text]
Sind alle n�tigen Angaben gemacht, werden die gew�nschten Etiketten nach
Bet�tigen des *create# Buttons erzeugt. Keine Sorge bez�glich nicht ausgef�llter
Felder: ist f�r ein Feld keine Nummer eingetragen, wird hier auch kein Etikett
generiert. Und dies gilt nicht nur f�r die Anzahl, sondern auch die Position:
dadurch ist es m�glich, einen nicht vollst�ndig aufgebrauchten Bogen auch
vollst�ndig aufzubrauchen.

[eof]
