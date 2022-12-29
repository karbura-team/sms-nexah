# Simple PHP class to send SMS via the Nexah API

## About
A [PHP](https://php.net) class, which implements the [Nexah](https://sms.nexah.net) API to send SMS.

It focuses on sending messages via [Nexah](https://sms.nexah.net) API, and returns a boolean according to the success or the failure of the send method inside the class.

To get a Nexah account and start using their API, visit [nexah/contac-us](https://nexah.net/contact-us). Once there, fulfill the contact form and submit. Once done, you will get an email and an amployee of Nexah will give you a call for your account configuration.

## Requirements
- You need to have an account as describe above [nexah/contac-us](https://nexah.net/contact-us).
- Your username and password
- [PHP 7.4 or higher](http://www.php.net/downloads.php)

## Installation

Installation is recommended to be done via [composer][] by running:

	composer require karbura/nexah-sms

Alternatively you can add the following to the `require` section in your `composer.json` manually:

```json
"karbura/nexah-sms"
```

Run `composer update` afterwards.

## Usage

```php
// Instantiate the Nexahsms class into the file where you want to send and SMS
$sms = new NexahSMS();

//  In the NexahSMS class, there is a method send_sms()
//  this method takes as parameters:
//  $user = your login received by Nexah team
//  $password = your login password received by Nexah team
//  $senderid = your name
//  $sms = the message to be sent
//  $mobiles = a number in string format or a coma seperated string of numbers to receive the message
$sms->send_sms($user, $password, $senderid, $sms, $modiles);

//  An example of this is the following
$sms->send_sms("myloginemail@email.com", "myloginpassword", "My Name", "My message here", "xxxxxxxxx, xxxxxxxxx, xxxxxxxxx");
```

Thank you for using this extension and if there is any problem, feel free to report it.