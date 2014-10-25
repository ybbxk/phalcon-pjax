Phalcon PJAX
============

A demo project to test out the idea of using Phalcon with jQuery PJAX.

More Info
=========

This experiment is simply testing out how I would structure an app using Phalcon 
and PJAX. I quite like the simple functionality of PJAX and this demo shows how it works.

There are 3 pages - Index, Page2, and Page 3 - accessible from the side bar navigation. A timer in 
the footer shows how long it's been since the last page refresh in seconds. You will notice when you 
click on a link, the page switches, and the web address changes - the back button even works - 
but the timer is not reset, as the page is not reloaded. Manually reloading the page will 
reset the timer. There is also a message showing if the page content was generated by an actual 
page request, or a PJAX-based request.

Anyhow - This project will be improved upon as I try to work out the best architecture for pain-free 
apps using Phalcon and PJAX.