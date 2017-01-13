[![Build Status](https://travis-ci.com/Kaeltis/sse.svg?token=7yrSFvKqhWLXN9sFnDmv&branch=master)](https://travis-ci.com/Kaeltis/sse)

## PHPGrade
PHP Applikation zur Notenverwaltung von Studenten auf Basis von Laravel.

## Achtung
Achtung, diese Applikation wurde für ein [CTF](https://de.wikipedia.org/wiki/Capture_the_Flag#Computersicherheit) entwickelt, es existieren absichtlich Sicherheitslücken!

## Flags
- [x] 1 - Link zu MySQL Admin Webinterface in robots.txt
- [ ] 2 - MySQL Interface mit sehr einfachem Passwort (root:toor) gesichert
- [ ] 3 - XSS in Profilfeldern
- [ ] 4 - SQL Injection über Notensharing Funktion
- [x] 5a - Controller zum Update der User nicht geschützt, User können beliebig durch POST/PUT geändert werden (inkl. Gruppe)
- [x] 5b - Tatsächliche Veränderung der Gruppe durch nicht-privilegierten User