<h1 align="center">The forgotten District</h1>

This site was created by, and is maintained by Aureus Lunae. It was specially made for the Forgotten District, and the logo falls under their copyright.

## About

The forgotten district is a minecraft server consisting varieties of game modes, along with fun activities, events, competitions and most importantly, a friendly community! At least that is what they advertise. Their old site had much required need of improvement, and it needed a complete redesign. So the choice was made to make a completely new site in Laravel. And now this is the functional site.

## Features

The Auth system has gotten several new things added. One thing is the user's rank. We had a need to protect several areas of the site to a certain rank. So we added this system. Also we needed to know what each rank was, and who the staff is.

Also we do want our users to have their own custom avatar. So they can upload them, and we resize and crop them so they fit the screen. All avatars will be given a custom name, and uploading a new one deletes the old one from the server. It will never delete the default avatar.

Besides the Auth system, the admins+ can post News related to the server. They can add new news through the profile, and users can read them on the homepage. Admins can also edit them by clicking edit on the homepage.

The event system was based on the news system, except that it had it own page. In addition to the news system, the event system has 4 extra data that is not seen in the news system. When the event is hold, the time, the end date and the end time. All this is in UTC. The end date and time is only shown if the end date is a different date than the starting date. They also don't have to fill in the end date, if they don't, it becomes automatically the same date as the starting date.

We also allow people to search for users. This is to make the PM system a little easier. The private messages are added so people can contact the staff easier, if they don't want to register on the discord. We do not allow them to send emails to other people, only through this site itself. Users also can't edit their pm once sent. This is so that the content can't be edited once we added some flag pm support to it. Also, the PM is removed from the database when both the sender and receiver delete the pm.

Notifications right now only works for PM's. We might extend the notification system later, but for now it is PM's only. But since this notification is added to all pages, we had to make a view composer for this feature. And we do not want to use phone and windows notifications for this, only a notification on the site itself. We do not want to spam users with it.

All textareas people can fill in support markdown. This is done by [Graham Campbell's laravel-markdown package](https://github.com/GrahamCampbell/Laravel-Markdown).

## Planned Features

* Forms customly made
* Flag posts and pm's
* Bug Report System (Low priority).
