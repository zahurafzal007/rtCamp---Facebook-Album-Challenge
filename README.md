# RTCAMP-FACEBOOK ALBUM CHALLENGE

Application Demo Link - [https://fbrtcamp.herokuapp.com](https://fbrtcamp.herokuapp.com)

Platform - [PHP](http://php.net/manual/en/intro-whatis.php)

API Used - [Facebook Graph API SDK for PHP](https://developers.facebook.com/docs/reference/php/4.0.0) , [Google Drive REST API v2 for PHP](https://developers.google.com/drive/v2/web/quickstart/php)

Scripting Language : [jQuery AJAX](https://jquery.com/)

Styling - [Materialize CSS](http://materializecss.com/) , [Bootstrap CSS](http://getbootstrap.com/)

## Part - 1 :

First the user visit's the application and there he/she has to log in to their Facebook account using their Facebook account credentials.The application will ask the user to authorize the application while they log into the system, in order to give the application access to the user's e-mail and photos .Once logged in, the user will be redirected to the "userhome" page where he/she can see their albums listed along with their respective covers.

## Part - 2 :

Once on the userhome page, the user's greeted and the user can view his/her albums. The albums are displayed with a name alongside the photo count for that particular album. 

When you click on the album thumbnail , photos of that particular album will be displayed to the user in a full-screen caraousel in an effective photo-gallery format.

A "download file" icon is available for each album below the album name to download each album separately. When the user clicks on that button,an AJAX jQuery request is fired which will collect all the photos of that album, create a Zip file on server with all the photos and then the browser prompts the user with a download dialog asking the user as to where that file should be saved. 

A checkbox is displayed above each album name in case the user wants to download selected albums. A "Download" button is displayed on top of all the albums listed. When clicked , it will work in a similar way as above when the user downloads a single album. Here ,more than one album will be mounted in a single Zip file on the server.

A "Download All" button is displayed below all the listed albums. When clicked , an AJAX jQuery request is fired which will collect all the photos of all the albums. It will then create a Zip file with a folder for each album which will contain the photos of the respective album. The folder name will be the album name itself. Once the Zip file is generated, the browser will prompt the user with a download dialog asking the user as to where that file should be saved. The master Zip file will be of the format "Facebook_Username_Albums". 

During the time the Zip and download process is going on, the user will be shown a nice pre-loader while the user awaits the file.

## Part - 3 :

The user can also move his/her albums to their respective Google Drive as well.

<b>NOTE</b> : This feature requires the user to login with their Google Account Credentials.If the user is not logged in and tries to use this feature, a toast message will be shown to the user on the top-right corner of the screen, and the page will b smooth-scrolled to the top where this a "Login with Google" button which will attract the user's attention along with a toast message at the top-right corner of the screen notifying the user to login into their Google Account.

When the albums are uploaded to Google Drive it will be stored in a parent folder named as "Facebook_Username_Albums" and there will be child folders of the albums that are uploaded inside this parent folder.

There is a "Cloud Upload" icon besides the "download file" icon which will enable the user to upload a single album to their google drive under the parent folder mentioned above with a child folder of the album name itself. This is also done via an AJAX jQuery request.

There is a "Move to Drive" button displayed above the listed albums, which will upload the selected albums on to the Google Drive under the same parent folder mentioned above alongwith each child folder for the respective albums that were selected for upload.if the user tries to move albums without selecting any one of them, a toast message will be displayed to the user on the top-right corner of the screen to notify the user to select at-least one of the albums to continue.

There is a "Move all to Drive" button displayed below all the listed albums, which will upload all the albums under the same parent folder mentioned above alongwith each child folder for all the albums.

During the time that the albums are moved, the user will be shown a nice pre-loader while the user waits for the albums to be uploaded.

## How-To-Use : 

<b>Using the Facebook Graph API SDK for PHP : </b>

The Facebook SDK for PHP provides developers with a modern, native library for accessing the Graph API and taking advantage of Facebook Login. Usually this means you're developing with PHP for a Facebook Canvas app, building your own website, or adding server-side functionality to an app. 

More information and examples: https://developers.facebook.com/docs/reference/php/4.0.0

<b> Step - 1 : Logging into a Developer Account </b>

You need to login with your facebook account at https://developers.facebook.com/. Once done you can create a new app over there.Follow the steps and the app is created as per your need.

<b> Step - 2 : Configuring your App </b>

Once the app is created you will be provided with a appId and appSecret which are very important and you shouldn't disclose them to anybody but you or a trusted developer.Afterwards, you need to set the App Domain for your app, a Site URL and a valid  OAuth redirection url. They all must be the same and should be in the whitelisted URL list which are secure and allowed by Facebook.

This app-id and app-Secret are used to authenticate and authorize your app with facebook when a user tries to access and user your app's services.

<b> Step - 3 : Integrating and Working with your app </b>

Once you have downloaded the PHP SDK to your working project directory, you need to import the autoload.php file in you code.
Create an instance of the file, replace app-id and app-secret and provide the redirection URL and a callback page which will be used for redirection once the user logs in.

```php
require_once 'Facebook/autoload.php';
	
$fb = new Facebook\Facebook([
'app_id' => 'XXXXXXXXXXXXXX', // Replace {app-id} with your app id
'app_secret' => 'XXXXXXXXXXXXXX', //Replace {app-secret} with your app secret
'default_graph_version' => 'v2.2',
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email','user_photos']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://Your_Redirection_URL/Your_CallBack_Page', $permissions);
```

You can always search the web and read the documentation of the API in aiding to implement the functionalites you want as per your need.


<b>Using the Google Drive REST API SDK for PHP :
  
The Google Drive api for php client gives you a secure way to interact with google drive, letting you create,delete folders and uploading files to folders.More information and examples: https://developers.google.com/drive/v2/web/quickstart/php  

<b> Step - 1 : Logging into a Developer Account </b>

You need to login with your Google account at https://console.developers.google.com/. Once done you can create a new app over there.Search the web on how to do it, Follow the steps and the app is created as per your need.

<b> Step - 2 : Configuring your App </b>

Once the app is created you will be provided with a client_id and client_secret which are very important and you shouldn't disclose them to anybody but you or a trusted developer.Afterwards, you need to set the Origin URl for your app and a valid redirection url.Once done, save the changes and download the "client_secret.json" file from the Credentials tab. 

This app-id and app-Secret are used to authenticate and authorize your app with facebook when a user tries to access and user your app's services.

<b> Step - 3 : Integrating and Working with your app </b>

Once you have downloaded the Google Drive Rest API SDK to your working project directory, you need to import the autoload.php file in you code.
Create an instance of the file, give the path of the client_secret.json file which you downloaded and you are done. It's a good practise to put the file in the API library folder itself for easy access and use.

```php
require_once 'google-api-php-client/src/Google/Client.php';
require_once "google-api-php-client/src/Google/Service/Oauth2.php";

header('Content-Type: text/html; charset=utf-8');

// Get your app info from JSON downloaded from google dev console
$json = json_decode(file_get_contents("google-api-php-client/client_secret.json"), true);

$CLIENT_ID = $json['web']['client_id'];
$CLIENT_SECRET = $json['web']['client_secret'];
$REDIRECT_URI = $json['web']['redirect_uris'][0];
```
