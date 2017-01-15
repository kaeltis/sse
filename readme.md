[![Build Status](https://travis-ci.com/Kaeltis/sse.svg?token=7yrSFvKqhWLXN9sFnDmv&branch=master)](https://travis-ci.com/Kaeltis/sse)

## PHPGrade
PHP Applikation zur Notenverwaltung von Studenten auf Basis von Laravel.

## Achtung
Achtung, diese Applikation wurde für ein [CTF](https://de.wikipedia.org/wiki/Capture_the_Flag#Computersicherheit) entwickelt, es existieren absichtlich Sicherheitslücken!

## Flags
- [x] 1 - Link zu MySQL Admin Webinterface in robots.txt
- [x] 2 - MySQL Interface mit sehr einfachem Passwort (root:toor) gesichert
- [x] 3 - XSS in Profilfeldern
- [x] 4 - SQL Injection über Notensharing Funktion
- [x] 5a - Controller zum Update der User nicht geschützt, User können beliebig durch POST/PUT geändert werden (inkl. Gruppe)
- [x] 5b - Tatsächliche Veränderung der Gruppe durch nicht-privilegierten User

## Behebung der Flags
1. Keine sensiblen URLs über robots.txt preisgeben. Noch besser: robots.txt gar nicht benutzen und Crawler mit dem Webserver über die User-Agenten blocken.
2. Wenn SQL-Webinterface verwendet wird, dieses mit einem sicheren Passwort, Captcha und Rate-limiting absichern. Optimal: Tunnel vom Entwickler direkt zum MySQL Server über SSH mit publickey aufbauen.
3. Eingaben der Nutzer nur nach vorherigem Escape ausgeben. Mit Laravel im View: `{{ $wert }}`
4. Für SQL-Abfragen mit Inhalten von Anwendern Prepared Statements verwenden. Mit Laravel im Controller: `DB::table('tabelle')->where('zeile', '=', $wert)->get();`
5. Rollen- bzw. Rechteüberprüfung nicht nur in Views, sondern auch im Controller. Mit Laravel über Middleware im Controller.