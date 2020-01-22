# php-maven
Minimal implementation of a PHP based Maven repository

This project has been made to demonstrate how easy it is to create an extremely lightweight public Maven repository that can be hosted on any PHP based hosting service, which is nowadays quite common. It has the basic functionality needed, such as fetching and deploying Maven artifacts.

# How it works

The idea behind this project lies on the simple HTTP-based communication of Maven. A Maven client sends GET requests to fetch artifacts and these are already implemented on a typical Web server. For deployment, PUT requests are used. The Maven client tries to deploy without authorization, then with one if the former fails.

# Usage

Simply copy the files into the desired directory of your web server, then create a new directory named "repo" if it doesn't exist. At last, define the user/password combinations in the $users array.