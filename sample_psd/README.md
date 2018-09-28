# WordPress Theme Challenge

This Assignment is on rtcamp’s challenge-1 : WordPress theme development. As given on the link there are two assignments I choose the Simple PSD to WordPress Theme Assignment.

## Getting Started

Along with this document you will get the copy of the project. You can use it on your local server or deploy it. This project full filled all the requirements given in the rules. Additionally some jQuery effects are used to make it look good.

### Requirements

To use this Theme no additional software or plugins are needed we just need a latest version of WordPress in working condition.

## Description

This Theme is completely based on rtcamp’s assignment No.1 Sample_psd to WordPress Theme. It starts with the header section contains a theme logo and a header-menu. The theme logo can be customize by 'Theme_options' in the admin section. Mainly it contains a Slider in beginnig of body section in Home page. Slider can be customize by 'Slider' post_type in the admin section. body section of Homepage have a division which contains list of titles of child pages of Home page. When pointer enters in any list or any title the sub-pages of that respective page will be displayed. As pointer leaves the list sub-pages will get disappeared. In the footer section of the page contains a Sidebar,a footer-menu, a footer-caption and a footer-Image all of this can be customize by 'Theme_options' page in admin section. Some custom Widgets will also get created at theme activation you can use it by adding it to the Sidebar.    
  
## What it will do ?

Activation of the theme will make some changes to the admin section as following :

### Create Slider Post_type

Theme contains a slider in the body section. Slider will get the data from the custom pot type **Slider**. Posts in Slider post_type will be taken as a slide in slider. If you want to make any changes to the slider go to the admin section inside menu-section a new custom post_type Slider will be created you can make changes from there. 

### Create Menu

On theme activation a menu called **my_primary_menu** will be created which will be present in the header as well in footer 

### Custom Widgets

Few custom widgets will be created on the theme activation.

* LATEST NEWS - List All the posts of 'News' category.
* STAY-IN-TOUCH - Add social media links in yor Website like facebook, twitter, linkdin etc.
* MY Navigation - Display a menu contains a list of links.

Widgets can be used by dragging it to the sidebar called **Footer Widegts**.

### Create Theme options page

**Theme_options** page will be created in menu section as 'Theme_options' for do following changes :

* Change Theme logo
* Change Footer Image
* Edit Footer Text

### Create Pages

On theme activation following pages wil be created :

* Home
  * Environment 
    * Environment_child_1
    * Environment_child_2
    * Environment_child_3
  * Finding	
    * Finding_child_1
    * Finding_child_2
    * Finding_child_3
  * Promotinal Activities	
    * Promotinal_Activities_1
    * Promotinal_Activities_2
    * Promotinal_Activities_3
* News
* Gallery 
* Pages
* Layouts
* Features
* Blog
* Contact

## Frameworks Used

* JS framework : jQuery
* Testing framework : PHPUnit
* CSS framework : Bootstrap

## Tests

For testing PHPUnit testing framework is used. All the tests are rest in test directory.

## Author

* **Viral Solanki** 

## Acknowledgments

* For create Navigation menu widget [github](https://github.com/markjaquith/WordPress/blob/master/wp-includes/widgets/class-wp-nav-menu-widget.php) code is used
* [WordPress.org](https://wordpress.org)
* [WordPress Codex](https://codex.wordpress.org)
* [WordPress StackExchange](https://codex.wordpress.stackexchange.com)
* etc

## Demo Link

* [http://mytheme.gq/](http://mytheme.gq/)
