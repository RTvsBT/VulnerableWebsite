# Vulnerable website

This github repository contains the vulnerable application used in the RTvsBT event.

There are two major flaws in this website:
1. It uses PHP.
2. There is an SQL injection possible.

The website demonstrates a normal website for the "Army" containing user information. It is the responsibility from the redteam to keep this server safe.

# Features
The website has the following features:
- Password bruteforce logging.
- SQL Injection logging.
- Display the "holy grail"(A table with army PII).
- Fake a DDOS attack.

# Requirements
This website requires an MySQL server to be available with the following credentials:
- DB: Cyber
- Username: student
- Password: student

# Issues
The DDOS page is based on firefox and is known to not format properly on Chrome.

