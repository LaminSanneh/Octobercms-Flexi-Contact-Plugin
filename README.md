#Flexi Contact
A contact form plugin for [OctoberCms](http://www.octobercms.com) to help easily embed a contact form on any page of your website.

It works using ajax, so javascript is required.

#Installation or Setup
---

1. Go to system on the main menus in your backend

2. Click on the settings subsection

3. Under the "marketting" area, there should be a plugin setting called "Flexi Contact Settings", click on that

4. Read the sections and you must fill all of them.


#Usage
After doing the setup steps, you can use the contact form in two ways

##Using the component embed
The plugin should display a component on the components tab on the cms main menu.

You can include the component like any other component, no customization needed.

It has a set markup though and depends on bootstrap.


##Custom html

If you need to customize the markup for custom styling, embed the following html anywhere and modify the classes.
However, you must leave the (data-request and data-request-update) data-attributes intact as they are needed for the ajax to work.
Refer to this [doc section](http://octobercms.com/docs/cms/ajax) to know what's happening here in detail.
```html
<form
        data-request="{{ __SELF__ }}::onMailSent"
        data-request-update="'{{ __SELF__ }}::confirm': '#result'"
        data-request-success="$('.panel-body').val('')">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="input-group">
                <input type="text" class="form-control" value="" name="name" placeholder="Enter name">
                <input type="text" class="form-control" value="" name="email" placeholder="Enter Email">
                <input type="text" class="form-control" value="" name="subject" placeholder="Enter Subject">
                <input type="text" class="form-control" value="" name="body" placeholder="Enter Message">
                <br/>
                <span class="input-group-btn">
                    <button type="submit" class="btn btn btn-primary">Send</button>
                </span>
            </div>
        </div>
        <ul class="list-group" id="result">
        </ul>
    </div>
</form>
```

