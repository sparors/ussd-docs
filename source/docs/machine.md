---
title: Machine
description: Introduction to Machine
extends: _layouts.documentation
section: content
---
# Machine {#machine}

After creating the various states and linking them, we know we are done. Now the state class become an interconnected web of nodes. It does not have any idea on it own how to run.

Does it mean we connected them for nothing? Do we need another package? Are we to manually work it how?

The answer is no. Meet Machine, the runner or our application.

## How does it work ?

When a Ussd Machine is created, it takes some argument which are crusial to run the application. It then does the magic for you while you sit back and relax.

Machine will take the users request and interpret it. It will then call the necessary state class to hand the request and terminate it afterwards. It responsible for navigating the states with the user.

## Seem complex ?

Don't worry, it easier than it sound. Let create a machine to prove it.