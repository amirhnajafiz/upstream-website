# Up-stream project is a php-mysql website that uses MVC architecture to create 
# a basic website for uploading files. Like a video stream. 
# Users can create accounts and login to the website to view, download and upload videos.
# Sit has admins to check the website users and files and modify them.

# By running this file you will update the php compsoer files for generating vendor dir and 
# php autoload.
# After that you will create a server at localhost with port 3030. 

# Author: Amirhossein Najafizadeh
# Email: najafizadeh21@gmail.com 
# Presented by: Bootcamp M-54 Maktab Sharif, Tehran, Iran 
# Year: 2021

#                    GNU GENERAL PUBLIC LICENSE
#                       Version 3, 29 June 2007
#
# Copyright (C) 2007 Free Software Foundation, Inc. <https://fsf.org/>
# Everyone is permitted to copy and distribute verbatim copies
# of this license document, but changing it is not allowed.
#
#                          Preamble

echo "Program server running OK";

composer update;

php -S 127.0.0.1:3030 -t src;