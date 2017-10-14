/* (c) 2013 Paul Morris */
/* This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this file,
 * You can obtain one at http://mozilla.org/MPL/2.0/. */

//javascript document

//bot-proof email generator

var recip1 = "web" + "master",
	recip2 = "cla" + "irn" + "ote",
	dom = "cla" + "irno" + "te.org",
	holdHTML = "<A HREF=\"mailto";
function print_mail_to_link1() {
	holdHTML = holdHTML + ":" + recip2 + "@"
	holdHTML = holdHTML + dom + "\">" + recip2 + "@" + dom + "<\/a>"
	document.getElementById('email1').innerHTML=holdHTML;
}
