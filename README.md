#Flexi Contact
A contact form plugin for [OctoberCms](http://www.octobercms.com) to help easily embed a contact form on any page of your website. It works using ajax, so javascript is required. Also, you must configure your email settings in the admin area with a working smtp or other basic mail settings first. In other words, your server should be able to send emails for this plugin to work.


#Installation or Setup
---

1. Go to system on the main menus in your backend.

2. Click on the settings subsection.

3. Under the **Marketing** area, there should be a plugin setting called "Flexi Contact Settings", click on that.

4. Read the sections and you must fill all of them.

5. Go to [url](http://www.google.com/recaptcha/admin) here to setup valid google captcha credentials as it is required to use the plugin


#Usage
---
After doing the setup steps, you can use the contact form in two ways:

###1. Using the component default markup or html
+ The plugin should display a component on the components tab on the cms main menu.

+ You can include the component like any other component, no customization needed.

+ The component has a default markup as shown below and depends on bootstrap.

```html
<div class="confirm-container">
    <!--This will contain the confirmation when the email is successfully sent-->
</div>
<form class="flexiContactForm" role="form"
      data-request="{{ __SELF__ }}::onMailSent"
      data-request-update="'{{ __SELF__ }}::confirm': '.confirm-container'">

    <div class="form-groups">
        <div class="form-group">
            <input type="text" class="form-control" value=""  name="name" placeholder="Enter name">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" value="" name="email" placeholder="Enter Email">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" value="" name="subject" placeholder="Enter Subject">
        </div>
        <div class="form-group">
            <textarea class="form-control" value="" name="body" placeholder="Enter Message" cols="30" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-lg pull-right">Send</button>
    </div>
</form>
```

+ You can remove the bootstrap specific classes but then you must style the form using your own custom css in your theme.

###2. Using Custom markup or html

If you need to customize the markup for custom styling, donot embed the component as instructed above. Instead, embed the following html anywhere and remove the bootstrap specific classes and add your own. However, you must leave the (data-request, data-request-success and data-request-update) data-attributes intact as they are needed for the ajax to work. Refer to this [doc section](http://octobercms.com/docs/cms/ajax) to know what's happening here in detail.

```html
<div class="confirm-container">
    <!--This will contain the confirmation when the email is successfully sent-->
</div>
<form class="flexiContactForm" role="form"
      data-request="{{ __SELF__ }}::onMailSent"
      data-request-update="'{{ __SELF__ }}::confirm': '.confirm-container'">

    <div class="form-groups">
        <div class="form-group">
            <input type="text" class="form-control" value=""  name="name" placeholder="Enter name">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" value="" name="email" placeholder="Enter Email">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" value="" name="subject" placeholder="Enter Subject">
        </div>
        <div class="form-group">
            <textarea class="form-control" value="" name="body" placeholder="Enter Message" cols="30" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-lg pull-right">Send</button>
    </div>
</form>
```

#Component Options

###1. injectBootstrapAssets
Lets you optionally include or exclude bootstrap asset files(javascript and css) in your page.
This is useful incase you already have bootstrap loaded as part of your theme.

###2. injectMainScript
Lets you optionally include or exclude the main script files in your page.
This is useful if you want to handle the form events yourself and dont need the functionality in there.

#Dependencies
1. Add {% framework %} and {% framework extras %} to your layout or page as the plugin needs it to work

#**Note**
> Please note that the default markup provided by the form component relies on bootstrap and it's classes for styling. If you rely on it, you must make sure that bootstrap is loaded for it to be properly styled. I encourage you to style it using your own custom css to fit the overall style of your website.
