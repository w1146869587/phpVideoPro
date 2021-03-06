<? /* list of actors, directors, composers */ ?>
<? /* $Id$ */ ?>

[title]
*intro#

[text]
Hier können Einstellungen für die PS Label Packs und Templates vorgenommen
werden. Dabei werden nicht die Templates selbst bearbeitet, sondern nur die
technischen Werte, die zu ihrer Verarbeitung benötigt werden. Im Einzelnen sind
dies:
<UL>
 <LI>welche Templates verfügbar sind</LI>
 <LI>welchem Typ (z.B. Seiten- oder Top-Labels für VHS Kassetten) sie zugeordnet sind</LI>
 <LI>welche Bilddatei für den Hintergrund verwendet werden soll</LI>
 <LI>die Größe des Etikettes</LI>
 <LI>welche Kontroll-Datei (d.h. Template-Datei) die weiteren Einzelheiten für das Etikett beschreibt</LI>
</UL>

[title|1|packlist]
PSLabel Packs

[text]
Die PSLabels sind in "Label Packs" organisiert. Dies ermöglicht es dem Anwender,
nur die benötigten und gewünschten Templates zu installieren: Wer z.B. keine
VHS Videokassetten benutzt, kann sich auch die Installation der entsprechenden
Templates bzw. des entsprechenden Label Packs ersparen.

[text]
Dieses Modul ermöglicht es, Label Packs zu (de-)installieren sowie einzelne
Labels zu bearbeiten. Die einleitende erste Seite führt alle installierten
(und nach einem Klick auf den "*check_update#" Link auch alle zusätzlich
verfügbaren) PSLabel Packs auf. Durch einen Klick auf die zugehörigen Ikons
lässt sich nähere Information zum Label Pack anzeigen, die Liste der
zugehörigen Templates aufrufen (siehe <A HREF="#templates">unten</A>), sowie
das Aktionsfenster zum Download bzw. der (De-)Installation des Packs (siehe
<A HREF="{PHP_SELF}?topic=admin_psinstall">hier</A>) öffnen.

[title|1|templates]
Die Template-Liste

[text]
Die Verwaltung dieser Daten ist in zwei Teile untergliedert. Zunächst wird eine
Liste bereits verfügbarer Etiketten (mit den bei phpVideoPro in Listen üblichen
Navigations-Elementen) angezeigt. Diese ist alphabetisch nach dem Namen der
Templates sortiert. Von hier aus können Einträge gelöscht werden, oder aber man
gelangt zum nächsten Bildschirm, um ein neues Etikett hinzuzufügen bzw. ein
bereits existierendes zu bearbeiten. Für alle diese drei Aufgaben stehen
entsprechende Links bereit: zum Bearbeiten/Löschen unmittelbar neben dem
betroffenen Eintrag, zum Hinzufügen eines neuen Eintrags direkt im Tabellenkopf.
Zu bedenken ist hier, dass alle Änderungen mit dem Entfernen des Packs natürlich
verloren gehen. Für permanente Änderungen sollte sich mit dem Ersteller des
jeweiligen PSLabel Packs in Verbindung gesetzt werden.

[title]
Der Editor

[text]
Hier wird der ausgewählte Eintrag bearbeitet (oder ein neuer hinzugefügt). Die
einzelnen Felder sollten "selbstredend" bezeichnet sein:

[text]
<table align="center" style="border:1px solid #000000;" width="95%">
 <tr><td><b>*pstpl_name#:</b></td>
     <td>der Name hat keinerlei technische Relevanz: die Templates können also
         frei nach Gusto benannt werden.</td></tr>
 <tr><td><b>*pstpl_type#:</b></td>
     <td>legt fest, auf welche "Label-Sheets" (Druckvorlagen) ein hiermit
         erstelltes Etikett passt, und in welcher Liste es somit angezeigt wird</td></tr>
 <tr><td><b>*graphic_file#:</b></td>
     <td>das zu verwendende Hintergrundbild (EPS-Format!)</td></tr>
 <tr><td><b>*template_file#:</b></td>
     <td>welche PS Template Datei die Struktur des Templates beschreibt (und
         z.B. auch, welche Daten wo auf selbigem erscheinen)</td></tr>
 <tr><td><b>*lower_left_corner#:</b></td>
     <td>die Koordinaten der unteren linken Ecke dieses Templates (normalerweise
         x=0 und y=0, also ganz unten links)</td></tr>
 <tr><td><b>*upper_right_corner#:</b></td>
     <td>Koordinaten der oberen rechten Ecke, d.h. der Abstand selbiger von der
         unteren linken Ecke in Punkten.</td></tr>
</table>

[text]
Wer sich jetzt über diese Maßangaben wundert: PostScript rechnet in Bildpunkten,
und beginnt eine Seite immer von unten links nach oben rechts aufzubauen. Und
wir haben hier schließlich <b><i>PS</i></b>Labels :-)

[text]
Sind alle Angaben gemacht, können diese mittels des Buttons "*update#" am Ende
des Formulars gespeichert werden. Geht alles gut, so wird das Formular neu
geladen, und mit einer entsprechenden Erfolgsmeldung versehen - wie es bereits
von der Bearbeitung der Film-Einträge her bekannt sein sollte.

[eof]
