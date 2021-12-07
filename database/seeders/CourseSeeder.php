<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        $course_setA = new Course();
        $course_setA->course_code           = 'HTML Basic';
        $course_setA->course_name           = 'HTML Basic';
        $course_setA->course_title          = 'Free Basic HTML Course! Learn Web Designing';
        $course_setA->course_summary        = 'In just 3 hours, learn basic HTML, the skeleton of all web pages, and place text on ... Take this course and learn about the inner workings of an HTML form!';
        $course_setA->course_description    = 'HTML for Absolute Beginners
While many guides on the internet attempt to teach HTML using a lot of mind-boggling theory, this tutorial will instead focus on giving you the practical skills to build your first site.

The aim is to show you ‘how’ to create your first web page without spending the entire tutorial focusing too much on the “why.”

By the end of this tutorial, you will have the know-how to create a basic website and we hope that this will inspire you to delve further into the world of HTML using our follow-on guides.

What is HTML?
Okay, so this is the only bit of mandatory theory. In order to begin to write HTML, it helps if you know what you are writing.

HTML is the language in which most websites are written. HTML is used to create pages and make them functional.

The code used to make them visually appealing is known as CSS and we shall focus on this in a later tutorial. For now, we will focus on teaching you how to build rather than design.

The History of HTML
HTML was first created by Tim Berners-Lee, Robert Cailliau, and others starting in 1989. It stands for Hyper Text Markup Language.



Read more: https://html.com/#ixzz7Cc8xBgne';
        $course_setA->course_price          = '0.00';
        $course_setA->course_image          = 'html.jpg';
        $course_setA->course_shown          = '1';
        $course_setA->category_id           = '3';
        $course_setA->tag_id                = '2';
        $course_setA->currency_id           = '1';
        $course_setA->course_status         = '1';
        $course_setA->created_by            = 'Monis';
        $course_setA->save();

        $course_setB = new Course();
        $course_setB->course_code           = 'CSS Basic';
        $course_setB->course_name           = 'CSS Basic';
        $course_setB->course_title          = 'Free Basic CSS Course! Learn Web Designing';
        $course_setB->course_summary        = 'You ll learn CSS fundamentals like the box model, cascade and specificity, flexbox, grid and z-index. And, along with these fundamentals';
        $course_setB->course_description    = 'Welcome to Learn CSS! #
This course breaks down the fundamentals of CSS into digestible, easy to understand pieces. Over the next few modules, you ll learn how the core aspects of CSS work and how to use them effectively in your projects. Use the menu pane by the "Learn CSS" logo to navigate the modules.

You ll learn CSS fundamentals like the box model, cascade and specificity, flexbox, grid and z-index. And, along with these fundamentals, you ll learn about functions, color types, gradients, logical properties and inheritance to make you a well-rounded front-end developer, ready to take on any user interface.

Each module is full of interactive demos and self-assessments for you to test your knowledge. In addition to learning through reading and demos, there is an accompanying podcast episode for each topic as another way to learn and continue expanding your knowledge.

This course is created for beginner and advanced CSS developers alike. You can go through the series from start to finish to get a general understanding of CSS from top to bottom, or you can use it as a reference for specific styling subjects. For those new to web development overall, check out the intro to HTML course from MDN to learn all about how to write markup and link your stylesheets.';
        $course_setB->course_price          = '0.00';
        $course_setB->course_image          = 'css.jpg';
        $course_setB->course_shown          = '1';
        $course_setB->category_id           = '3';
        $course_setB->tag_id                = '3';
        $course_setB->currency_id           = '1';
        $course_setB->course_status         = '1';
        $course_setB->created_by            = 'Monis';
        $course_setB->save();

        $course_setC = new Course();
        $course_setC->course_code           = 'Java Script';
        $course_setC->course_name           = 'Java Script';
        $course_setC->course_title          = 'Master in JavaScript Learn JavaScript In 3 Hours';
        $course_setC->course_summary        = 'Why Learn JavaScript? JavaScript is among the most powerful and flexible programming languages of the web. It powers the dynamic behavior';
        $course_setC->course_description    = 'Why Learn JavaScript?
JavaScript is among the most powerful and flexible programming languages of the web. It powers the dynamic behavior on most websites, including this one.

Take-Away Skills:
You will learn programming fundamentals and basic object-oriented concepts using the latest JavaScript syntax. The concepts covered in these lessons lay the foundation for using JavaScript in any environment.';
        $course_setC->course_price          = '0.00';
        $course_setC->course_image          = 'Java_Script.png';
        $course_setC->course_shown          = '1';
        $course_setC->category_id           = '3';
        $course_setC->tag_id                = '4';
        $course_setC->currency_id           = '1';
        $course_setC->course_status         = '1';
        $course_setC->created_by            = 'Monis';
        $course_setC->save();
    }
}
