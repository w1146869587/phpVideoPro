<? /* list of actors, directors, composers */
 ?>
<? /* $Id$ */ ?>

[title]
*intro#

[text]
Hier k�nnen Einstellungen f�r die PS Label Templates vorgenommen werden. Dabei
werden nicht die Templates selbst bearbeitet, sondern nur die technischen
Werte, die zu ihrer Verarbeitung ben�tigt werden. Im Einzelnen sind dies:
<UL>
 <LI>welche Templates verf�gbar sind</LI>
 <LI>welchem Typ (z.B. Seiten- oder Top-Labels f�r VHS Kassetten) sie zugeordnet sind</LI>
 <LI>welche Bilddatei f�r den Hintergrund verwendet werden soll</LI>
 <LI>die Gr��e des Etikettes</LI>
 <LI>welche Kontroll-Datei (d.h. Template-Datei) die weiteren Einzelheiten f�r das Etikett beschreibt</LI>
</UL>

[title]
Die Liste

[text]
Die Verwaltung dieser Daten ist in zwei Teile untergliedert. Zun�chst wird eine
Liste bereits verf�gbarer Etiketten (mit den bei phpVideoPro in Listen �blichen
Navigations-Elementen) angezeigt. Diese ist alphabetisch nach dem Namen der
Templates sortiert. Von hier aus k�nnen Eintr�ge gel�scht werden, oder aber man
gelangt zum n�chsten Bildschirm, um ein neues Etikett hinzuzuf�gen bzw. ein
bereits existierendes zu bearbeiten. F�r alle diese drei Aufgaben stehen
entsprechende Links bereit: zum Bearbeiten/L�schen unmittelbar neben dem
betroffenen Eintrag, zum Hinzuf�gen eines neuen Eintrags direkt im Tabellenkopf.

[title]
Der Editor

[text]
Hier wird der ausgew�hlte Eintrag bearbeitet (oder ein neuer hinzugef�gt). Die
einzelnen Felder sollten "selbstredend" bezeichnet sein:

[text]
<b>*pstpl_name#:</b>" der Name hat keinerlei technische Relevanz: die Templates
k�nnen also frei nach Gusto benannt werden.<BR>
<b>*pstpl_type#:</b> legt fest, auf welche "Label-Sheets" (Druckvorlagen) ein
hiermit erstelltes Etikett passt, und in welcher Liste es somit angezeigt wird<BR>
<b>*graphic_file#:</b> das zu verwendende Hintergrundbild (EPS-Format!)<BR>
<b>*template_file#:</b> welche PS Template Datei die Struktur des Templates
beschreibt (und z.B. auch, welche Daten wo auf selbigem erscheinen)<BR>
<b>*lower_left_corner#:</b> die Koordinaten der unteren linken Ecke dieses
Templates (normalerweise x=0 und y=0, also ganz unten links)<BR>
<b>*upper_right_corner#:</b> Koordinaten der oberen rechten Ecke, d.h. der
Abstand selbiger von der unteren linken Ecke in Punkten.

[text]
Wer sich jetzt �ber diese Ma�angaben wundert: PostScript rechnet in Bildpunkten,
und beginnt eine Seite immer von unten links nach oben rechts aufzubauen. Und
wir haben hier schlie�lich <b><i>PS</i></b>Labels :-)

[text]
Sind alle Angaben gemacht, k�nnen diese mittels des Buttons "*update#" am Ende
des Formulars gespeichert werden. Geht alles gut, so wird das Formular neu
geladen, und mit einer entsprechenden Erfolgsmeldung versehen - wie es bereits
von der Bearbeitung der Film-Eintr�ge her bekannt sein sollte.

[eof]
