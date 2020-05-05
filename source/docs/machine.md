---
title: Machine
description: Introduction to Machine
extends: _layouts.documentation
section: content
---
# Machine {#machine}

After creating the various states and linking them, we are set to launch our ussd application. State classes are now an interconnected web of nodes but does not have any idea on how to run.

What do i do next?

Meet Machine, the robust application runner.

## How does it work?

Machine takes arguments which are crusial to run the application when created. It does all the magic for you while you sit back and relax.

Machine will take the users request and interpret it and call the necessary state class to hand over the request and terminate it afterwards. Machine is responsible for navigating the states with the user.

## Seem complex?

Don't worry, it is easier than it sound. Let's create a machine to prove it.